@extends('layouts.app-home')

@section('content')

<div class="container" id="coffee">
    <h2 class="promo-heading mt-4">Promo</h2>
    <div class="row" style="margin-top: 30px;">
        @foreach($promos as $promo)
        <div class="col-md-3 py-0 py-md-0">
            <div class="card border-0">
                <img src="{{ asset($promo->gambar_promo) }}" alt="{{ $promo->nama_promo }}">
                <div class="card-body">
                    <h3 class="menu-coffee">{{ $promo->nama_promo }}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<footer style="background-color: #265171; color: #ffffff; padding: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>COFFSIDE</h4>
                <p>Our Location</p>
                <p>Kantin Vokasi UI, Kukusam Kecamatan Beji, Kota Depok, Jawa Barat 16245</p>
                <a href="https://www.instagram.com/coffside.id/" target="_blank">
                    <img src="{{ asset('images/logo/instagram-logo.png') }}" alt="Instagram" width="30" height="30">
                </a>
                <a href="https://www.tiktok.com/@coffside.id" target="_blank">
                    <img src="{{ asset('images/logo/tiktok-logo.png') }}" alt="TikTok" width="30" height="30">
                </a>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@endsection