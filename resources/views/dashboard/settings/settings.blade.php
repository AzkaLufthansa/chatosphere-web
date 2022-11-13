@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    <div class="header">
        <h1>Settings</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            {{-- <div style="margin-bottom: 2rem;">
                <h3>Update Profile</h3>
            </div> --}}
            <div style="margin-bottom: 2rem;">
                <h3 style="margin-bottom: 1rem;">Change Password</h3>
                <form action="/update_password" method="POST">
                    @csrf
                    <div style="margin-bottom: 1rem">
                        <label for="current_password">Current Password</label><br>
                        <input type="password" name="current_password" class="input-form" style="width: 20rem">
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div style="margin-bottom: 1rem">
                        <label for="password">New Password</label><br>
                        <input type="password" name="password" class="input-form" style="width: 20rem">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div style="margin-bottom: 1rem">
                        <label for="Confirmation Password">Confirmation Password</label><br>
                        <input type="password" name="confirmation_password" class="input-form" style="width: 20rem">
                        @error('confirmation_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" onclick="return confirm('Update password?')" class="add-button" style="cursor: pointer">
                        <h3>Update Password</h3>
                    </button>
                </form>
            </div>
            <div style="display: flex; justify-content: end">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure to logout?')" class="add-button button-danger" style="cursor: pointer">
                        <h3>Logout</h3>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection