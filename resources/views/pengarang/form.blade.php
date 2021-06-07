@extends('layouts.index')
@section('content')
    <h3>Form Pengarang Buku</h3>
    <form action="{{ route('pengarang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Nama Pengarang</label>
            <input type="text" name="nama" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Email Pengarang</label>
            <input type="text" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">HP Pengarang</label>
            <input type="text" name="hp" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Pengarang</label>
            <input type="text" name="foto" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
@endsection