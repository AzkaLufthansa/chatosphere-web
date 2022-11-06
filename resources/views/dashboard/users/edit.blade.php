@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    <div class="header">
        <h1>Edit User</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name" class="label-form">Name</label><br>
                    <input type="text" name="name" id="name" class="input-form" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username" class="label-form">Username</label><br>
                    <input type="text" name="username" id="username" class="input-form" value="{{ old('username', $user->username) }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="label-form">Email</label>
                    <input type="text" id="email" name="email" class="input-form" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone" class="label-form">Phone</label>
                    <input type="number" id="phone" name="phone" class="input-form" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="birthday" class="label-form">Birthday</label>
                    <input type="date" id="birthday" name="birthday" class="input-form" value="{{ old('birthday', $user->birthday) }}">
                    @error('birthday')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" class="label-form">Image</label>
                    <input type="file" id="image" name="image" class="input-form" value="{{ old('image') }}">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="button-group">
                    <a href="/user">Back</a>
                    <button type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection