@extends('layouts.app-mitra')

@section('content')
<div class="main">
    <main class="content px-3 py-2">
        <div class="container mt-5 card card-body">
            <h2>Edit Order</h2>
            <form action="{{ route('orders.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="menu_id">Menu:</label>
                    <select name="menu_id" id="menu_id" class="form-control" readonly>
                        @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $menu->id === $order->menu_id ? 'selected' : '' }}>
                            {{ $menu->nama_menu }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><br>
                    <label for="promo_id">Promo:</label>
                    <select name="promo_id" id="promo_id" class="form-control" readonly>
                        <option value="" {{ $order->promo_id === null ? 'selected' : '' }}>No Promo</option>
                        @foreach($promos as $promo)
                        <option value="{{ $promo->id }}" {{ $promo->id === $order->promo_id ? 'selected' : '' }}>
                            {{ $promo->nama_promo }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><br>
                    <label for="user_id">User:</label>
                    <select name="user_id" id="user_id" class="form-control" readonly>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id === $order->user_id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ $order->quantity }}" readonly>
                </div><br>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Pesanan Belum Diterima"
                            {{ $order->status === 'Pesanan Belum Diterima' ? 'selected' : '' }}>
                            Pesanan Belum Diterima
                        </option>
                        <option value="Pesanan Sedang Dipersiapkan"
                            {{ $order->status === 'Pesanan Sedang Dipersiapkan' ? 'selected' : '' }}>
                            Pesanan Sedang Dipersiapkan
                        </option>
                        <option value="Pesanan Siap" {{ $order->status === 'Pesanan Siap' ? 'selected' : '' }}>
                            Pesanan Siap
                        </option>
                        <option value="Pesanan Dibatalkan"
                            {{ $order->status === 'Pesanan Dibatalkan' ? 'selected' : '' }}>
                            Pesanan Dibatalkan
                        </option>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </main>
    @endsection