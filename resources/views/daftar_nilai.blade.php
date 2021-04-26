@php
    $no = 1;
    $s1 = ['nama'=>'Mamat Sudrajat', 'nilai'=>77];
    $s2 = ['nama'=>'Neneng Ningsih', 'nilai'=>98];
    $s3 = ['nama'=>'John Doe', 'nilai'=>63];
    $s4 = ['nama'=>'Christ Boi', 'nilai'=>55];
    $judul = ['No','Nama','Nilai', 'Keterangan'];

    $siswa = [$s1, $s2, $s3, $s4];
@endphp

<h3 align="center"> Daftar Nilai Siswa</h3>

<table border="1" align="center" cellpadding="10">
    <thead>
        <tr>
            @foreach ($judul as $jdl)
                <th> {{ $jdl }}</th>                
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $sis)
            {{--logic kelulusan dengan ternery dan warna--}}
            @php
                $ket = ($sis['nilai'] >= 60) ? 'Lulus' : 'Gagal';
                $warna = ($no % 2 == 0) ? 'whitegrey' : 'cyan';
            @endphp
            <tr bgcolor="{{ $warna }}">
                <td> {{$no++}} </td>
                <td> {{$sis['nama']}} </td>
                <td> {{$sis['nilai']}} </td>
                <td> {{$ket}} </td>
            </tr>
        @endforeach
    </tbody>
  </table>