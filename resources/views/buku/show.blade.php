@extends('layouts.index')
@section('content')

        @foreach ($ar_buku as $b)
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $b->judul }}</h5>
                <p class="card-text">
                    USBN : {{ $b->isbn }}
                    <br/> Tahun Cetak : {{ $b->tahun_cetak}}
                    <br/> Stok : {{ $b->stok}}
                    <br/> Pengarang : {{ $b->nama}}
                    <br/> Penerbit : {{ $b->pen}}
                    <br/> Kategori : {{ $b->kat}}
                    <br/> Kategori : {{ $b->kat}}
                </p>
                <a href="{{url(/'buku')}}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection