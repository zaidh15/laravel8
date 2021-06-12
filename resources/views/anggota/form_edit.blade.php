@extends('layouts.index')
@section('content')
    <h3>Form Edit Anggota</h3>
    @foreach ($data as $rs)
        
    <form action="{{ route('anggota.update', $rs->id) }}" method="POST">
        
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Nama Anggota</label>
            <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Email Anggota</label>
            <input type="text" name="email" value="{{ $rs->email }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">HP Anggota</label>
            <input type="text" name="hp" value="{{ $rs->hp }}"class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Foto Anggota</label>
            <input type="text" name="foto" value="{{ $rs->foto }}" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
    
    @endforeach
@endsection