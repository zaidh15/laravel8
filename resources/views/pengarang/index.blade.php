@extends('layouts.index')
@section('content')

@php
    $ar_judul = ['No', 'Nama', 'Email', 'HP', 'Foto'];
    $no = 1;
@endphp
<a class="btn btn-primary btn-lg" href="{{ route('pengaran.create') }}" role="button">Tambah</a>
    <h3>Daftar Pengarang</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{$jdl}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_pengarang as $p)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->hp }}</td>
                <td>{{ $p->foto }}</td>
            </tr>                
            @endforeach
        </tbody>
    </table>
@endsection