@extends('layouts.app-customer')

@section('content')
<div class="container">
    <h1>Beri Rating</h1>
    <p>Anda akan memberikan rating untuk pesanan:</p>
    <ul>
        <li>Nama: {{ $order->name }}</li>
        <li>Menu: {{ $order->menu->nama_menu }}</li>
        <li>Jumlah: {{ $order->quantity }}</li>
        <li>Total Harga: {{ $order->total_price }}</li>
    </ul>
    <form action="{{ route('customer.rating.submit', $order) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5):</label>
            <select name="rating" id="rating" class="form-select" required>
                <option value="">Pilih Rating</option>
                @for($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Komentar (opsional):</label>
            <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection