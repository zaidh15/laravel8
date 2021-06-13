@extends('layouts.index')
@section('content')
@php
    $rs1 = App\Models\Pengarang::all();
    $rs2 = App\Models\Penerbit::all();
    $rs3 = App\Models\Kategori::all();
@endphp
    <h3>Form Edit Buku</h3>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($error->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @foreach ($data as $rs)
        
    <form action="{{ route('buku.update', $rs->id) }}" method="POST">
        
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">ISBN</label>
            <input type="text" name="isbn" value="{{ $rs->isbn }}" class="form-control @error('isbn') is-invalid @enderror"/>
            @error('isbn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" value="{{ $rs->judul }}" class="form-control @error('judul') is-invalid @enderror"/>
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Tahun Cetak</label>
            <input type="text" name="tahun_cetak" value="{{ $rs->tahun_cetak }}" class="form-control @error('tahun_cetak') is-invalid @enderror"/>
            @error('tahun_cetak')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Stok</label>
            <input type="text" name="stok" value="{{ $rs->stok }}" class="form-control @error('stok') is-invalid @enderror"/>
            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Pengarang</label>
            <select class="form-control @error('idpengarang') is-invalid @enderror"" name="idpengarang">
              <option value="">--Pilih Pengarang--</option>
              @foreach ($rs1 as $p)
              @php
                  $sel1 = ($p->id == $rs->idpengarang) ? 'selected' : '';
              @endphp
                <option value="{{ $p->id }}" {{$sel1}} >{{ $p->nama }}</option>
              @endforeach
            </select>
            @error('idpengarang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Penerbit</label>
            <select class="form-control @error('idpenerbit') is-invalid @enderror" name="idpenerbit">
              <option value="">--Pilih Penerbit--</option>
              @foreach ($rs2 as $pen)
              @php
                  $sel2 = ($pen->id == $rs->idpenerbit) ? 'selected' : '';
              @endphp
                <option value="{{ $pen->id }}" {{ $sel2 }}>{{ $pen->nama }}</option>
              @endforeach
            </select>
            @error('idpenerbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Kategori</label> <br/>
            @foreach ($rs3 as $k)
            @php
                  $cek = ($k->id == $rs->idkategori) ? 'selected' : '';
              @endphp
                <input type="radio" class="form-control @error('idkategori') is-invalid @enderror" name="idkategori" value="{{ $k->id }}" {{ $cek }}/>{{ $k->nama }} &nbsp;
            @endforeach
            @error('idkategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Cover</label>
            <input type="file" name="stok" value="{{ $rs->cover }}" class="form-control @error('cover') is-invalid @enderror"/>
            @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        </form>
    
    @endforeach
@endsection