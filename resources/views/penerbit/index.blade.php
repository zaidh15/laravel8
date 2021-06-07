@extends('layouts.index')
@section('content')
@php
    $ar_judul = ['No','Nama','Alamat','Email','Website', 'Telp', 'CP'];
    $no = 1;
@endphp
<h3>Daftar Pengarang</h3>
<a class="btn btn-primary btn-md" href="{{ route('pengarang.create') }}" role="button">Tambah</a>
<table class = "table table-striped">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_pengarang as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->website }}</td>
            <td>{{ $p->telp }}</td>
            <td>{{ $p->cp }}</td>
            <td>
            <form method="POST" action="{{ route('penerbit.destroy', $p->id) }}">
                @csrf
                @method('delete')
                <a class="btn btn-info" href="{{ route('penerbit.show', $p->id) }}">Detail</a>
                <a class="btn btn-success" href="{{ route('penerbit.edit', $p->id) }}">Edit</a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Data dihapus?')">Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
