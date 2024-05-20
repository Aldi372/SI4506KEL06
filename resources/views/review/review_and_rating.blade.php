@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Submit Your Review</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="rating">Rating</label>
            <select class="form-control" id="rating" name="rating" required>
                <option value="">Select Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Star(s)</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="review">Review</label>
            <textarea class="form-control" id="review" name="review" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
