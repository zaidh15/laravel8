<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_penerbit = DB::table('penerbit')->get();
        return view('penerbit.index',compact('ar_penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input datanya
        //1. tangkap request
        DB::table('penerbit')->insert(
            [
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'website'=>$request->website,
                'telp'=>$request->telp,
                'cp'=>$request->cp,
            ]
        );
        //2. landing page
        return redirect('/penerbit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_penerbit = DB::table('penerbit')
                        ->where('id','=',$id)->get();
        return view('penerbit.show',compact('ar_penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('penerbit')
                ->where('id','=', $id)->get();
        return view('penerbit.form_edit',compact('data'));
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
        DB::table('penerbit')->where('id'.'=',$id)->update(
            [
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'email'=>$request->email,
                'website'=>$request->website,
                'telp'=>$request->telp,
                'cp'=>$request->cp,
            ]
        );
        return redirect('/penerbit'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('penerbit')->where('id',$id)->delete();
        return redirect('/penerbit');
    }
}
