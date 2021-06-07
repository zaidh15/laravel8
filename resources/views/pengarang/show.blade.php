@extends('layouts.index')
@section('content')

    <br/>
    <div class="jumbotron">
        @foreach ($ar_pengarang as $p)
            
        
        <h1 class="display-3">{{ $p->nama }}</h1>
        <p class="lead">
            Email : {{ $p->email}}
            <br/>HP : {{ $p->hp }}
        </p>
        @endforeach
    </div>
    
@endsection