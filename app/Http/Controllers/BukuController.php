<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Buku;
use PDF;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select('buku.*', 'pengarang.nama', 'penerbit.nama as pen',
                'kategori.nama as kat')
            ->get();
        return view('buku.index', compact('ar_buku'));
    }

    public function bukuPDF()
    {
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select('buku.*', 'pengarang.nama', 'penerbit.nama as pen',
                'kategori.nama as kat')
            ->get();
            $pdf = PDF::loadView('buku.daftarBuku', ['ar_buku'=>$ar_buku]);
    
            return $pdf->download('daftarBuku.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validasi = $request->validate(
            [
                'isbn'=>'required|unique:buku|max:100',
                'judul'=>'required',
                'tahun_cetak'=>'required|numeric',
                'stok'=>'required|numeric',
                'idpengarang'=>'required|numeric',
                'idpenerbit'=>'required|numeric',
                'idkategori'=>'required|numeric',
                'cover'=>'image|mimes:jpg,jpeg,png|max:2048',
            ],

            [
                'isbn.required'=>'ISBN Wajib diisi',
                'isbn.unique'=>'ISBN tidak boleh sama',
                'judul.required'=>'Judul buku Wajib di isi',
                'tahun_cetak.required'=>'Tahun Cetak Wajib di isi',
                'tahun_cetak.numeric'=>'Tahun Cetak harus berupa angka',
                'stok.required'=>'Stok Wajib di isi',
                'stok.numeric'=>'Stok harus berupa angka',
                'idpengarang.required'=>'Pengarang Wajib di isi',
                'idpenerbit.required'=>'Penerbit Wajib di isi',
                'idkategori.required'=>'Kategori Wajib di isi',
                'cover.image'=>'Ekstensi file harus berupa jpg, jpeg,png',
                'cover.max'=>'Ukuran file tidak boleh melebih dari 2048kB',
            ]
        );
        //input upload foto
        if (!empty($request->cover)) {
            $request->validate(
                ['cover'=>'image|mimes:jpg,jpeg,png|max:2048']
            );
            $filename = $request->nama.'.'.$request->cover->extension();
            $request->cover->move(public_path('images'),$filename);
        }
        else {
            $filename = '';
        }
        //proses input data
        //1.tangkap request dari form input
        DB::table('buku')->insert(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'tahun_cetak'=>$request->tahun_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
                'idkategori'=>$request->idkategori,
                'cover'=>$filename,
            ]
        );
        //2.landing page
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail pengarang
        $ar_buku = DB::table('buku')
            ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
            ->select('buku.*', 'pengarang.nama', 'penerbit.nama as pen',
                'kategori.nama as kat', 'buku.cover')
                ->where('buku.id', '=', $id)->get();
        return view('buku.show',compact('ar_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengarahkan ke halaman form edit
        $data = DB::table('buku')
                        ->where('.id', '=', $id)->get();
        return view('buku.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //proses edit data lama
        DB::table('buku')->where('id', '=', $id)->update(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'tahun_cetak'=>$request->tahun_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
                'idkategori'=>$request->idkategori,
                'cover'=>$request->cover,
            ]
        );
        //2.landing page
        return redirect('/buku'.'/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data
        DB::table('buku')->where('id', $id)->delete();
        return redirect('/buku');
    }
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to Ext Generate PDF',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('buku.myPDF', $data);
    
        return $pdf->download('tesPDF.pdf');
    }
}
