@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container mt-5 card card-body">
        <h2>Create Stock</h2>
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

        <form action="{{ route('stocks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="menu_id" class="form-label">Select Menu:</label>
                <select class="form-control" id="menu_id" name="menu_id" required>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection