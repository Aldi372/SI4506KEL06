@extends('layouts.app-customer')

@section('content')
<div class="container">
    <h1>Detail Review</h1>
    <p>Anda telah memberikan review untuk pesanan:</p>
    <ul>
        <li>Nama: {{ $order->name }}</li>
        <li>Menu: {{ $order->menu->nama_menu }}</li>
        <li>Jumlah: {{ $order->quantity }}</li>
        <li>Total Harga: {{ $order->total_price }}</li>
    </ul>
    <div>
        <p><strong>Rating:</strong> {{ $rating->rating }} / 5</p>
        <p><strong>Komentar:</strong> {{ $rating->comment ?? '-' }}</p>
    </div>
</div>
@endsection