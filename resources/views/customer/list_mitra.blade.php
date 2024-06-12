@extends('layouts.app-customer')

@section('content')
<div class="container">
    <h1>List Mitra</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Toko</th>
                <th>Nama Pemilik</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mitras as $mitra)
            <tr>
                <td>{{ $mitra->nama_toko }}</td>
                <td>{{ $mitra->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection