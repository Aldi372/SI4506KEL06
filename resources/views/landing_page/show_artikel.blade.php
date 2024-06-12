@extends('layouts.app-home')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <img src="{{ asset('storage/' . $artikel->sampul) }}" class="card-img-top" alt="{{ $artikel->judul }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $artikel->judul }}</h5>
                    <p class="card-text">{{ $artikel->isi }}</p>
                    <p class="card-text"><small class="text-muted">Penulis: {{ $artikel->penulis }}</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection