@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container mt-5 card card-body">
        <h2>Edit Stock</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="menu_id" class="form-label">Menu:</label>
                <input type="hidden" name="menu_id" value="{{ $stock->menu_id }}">
                <p>{{ $stock->menu->name }}</p>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $stock->quantity }}"
                    required>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </div>
</main>
@endsection