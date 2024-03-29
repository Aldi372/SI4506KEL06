<!-- resources/views/users/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Add User</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
