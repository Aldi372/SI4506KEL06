<!-- resources/views/ratings/index.blade.php -->

@extends('layouts.app-mitra')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ratings</div>

                <div class="card-body">
                    @if($ratings->isEmpty())
                    <p>Tidak ada rating yang ditemukan.</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Nama Toko</th>
                                <th>Nama Pelanggan</th>
                                <th>Rating</th>
                                <th>Komentar</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ratings as $rating)
                            <tr>
                                <td>{{ $rating->order->id }}</td>
                                <td>{{ $rating->order->menu->nama_toko }}</td>
                                <td>{{ $rating->order->user->name }}</td>
                                <td>{{ $rating->rating }}</td>
                                <td>{{ $rating->comment }}</td>
                                <td>{{ $rating->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $ratings->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection