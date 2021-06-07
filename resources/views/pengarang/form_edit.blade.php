@extends('layouts.index')
@section('content')
    <h3>Form Edit Pengarang Buku</h3>
    @foreach ($data as $rs)
        
    <form action="{{ route('pengarang.update', $rs->id) }}" method="POST">
        
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Nama Pengarang</label>
            <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Email Pengarang</label>
            <input type="text" name="email" value="{{ $rs->email }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">HP Pengarang</label>
            <input type="text" name="hp" value="{{ $rs->hp }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Pengarang</label>
            <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
    
    @endforeach
@endsection