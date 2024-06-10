@extends('layouts.app-customer')

@section('content')
<div class="container">
    <h1>Historis Pemesanan</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if ($orders->isEmpty())
    <p>Semua pesanan telah diberi rating.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->menu->nama_menu }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }}</td>
                <td>
                    <a href="{{ route('customer.rating.form', $order) }}" class="btn btn-primary">Beri Rating</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection