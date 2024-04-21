@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Profile') }}</div>

                    <div class="card-body">
                        {{-- Periksa apakah user ada --}}
                        @if ($user)
                            {{-- Periksa apakah user memiliki nama dan email --}}
                            @if ($user->name && $user->email)
                                <div class="profile-info">
                                    <p><strong>Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    <p><strong>Tempat Tanggal Lahir:</strong> {{ $user->ttl }}</p>
                                    <p><strong>alamat:</strong> {{ $user->alamat }}</p>
                                    <a href="/edit_profile" class="btn btn-primary">Edit Profile</a>
                                    <!-- Tambahkan field lainnya di sini jika diperlukan -->
                                </div>
                            @else
                                <p>You haven't filled out your profile yet. Please fill out your profile details below:</p>
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Fill Profile</a>
                            @endif
                        @else
                            <p>Please log in to view your profile.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
