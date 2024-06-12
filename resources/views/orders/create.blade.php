@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="container mt-5 card card-body">
            <h2>Create Order</h2>
            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <div class="form-group"><br>
                    <label for="menu_id">Menu:</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><br>
                    <label for="promo_id">Promo:</label>
                    <select name="promo_id" id="promo_id" class="form-control">
                        <option value="">No Promo</option>
                        @foreach($promos as $promo)
                        <option value="{{ $promo->id }}">{{ $promo->nama_promo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><br>
                    <label for="user_id">User:</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div><br>
                @error('menu_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</main>
@endsection