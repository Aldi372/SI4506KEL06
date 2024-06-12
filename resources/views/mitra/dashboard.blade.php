@extends('layouts.app-mitra')

@section('content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3">
            <h4>Mitra Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 d-flex">
                <h2>Welcome Back, {{ Auth::user()->name }}</h2>
            </div>
        </div>
    </div>
</main>
@endsection