@extends('layouts.index')
@section('content')
    <h3>Form Anggota</h3>
    <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Anggota</label>
            <input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Email Anggota</label>
            <input type="text" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">HP Anggota</label>
            <input type="text" name="hp" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Anggota</label>
            <input type="file" name="foto" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
@endsection