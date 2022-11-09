@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    
    <div class="header">
        <h1>Detail User</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            <div class="top">
                <h2 style="margin-bottom: 2rem;">{{ $user->name }} Profile</h2>
                <img src="{{ asset('storage/' . $user->image) }}" class="profile-photo-large">
            </div>
            <div class="middle">
                <div class="column">
                    <div>
                        <div class="row">
                            <h4>Name</h4>
                            <div>{{ $user->name }}</div>
                        </div>
                        <div class="row">
                            <h4>Username</h4>
                            <div>{{ $user->username }}</div>
                        </div>
                        <div class="row">
                            <h4>Email</h4>
                            <div>{{ $user->email }}</div>
                        </div>
                        <div class="row">
                            <h4>Phone</h4>
                            <div>{{ $user->phone }}</div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <h4>Birthday</h4>
                            <div>{{ Carbon\Carbon::parse($user->birthday)->format('D, d M Y') }}</div>
                        </div>
                        <div class="row">
                            <h4>Role</h4>
                            <div>{{ $user->role }}</div>
                        </div>
                        <div class="row">
                            <h4>Topic Posted</h4>
                            <div>{{ $user->topics->count() }}</div>
                        </div>
                        <div class="row">
                            <h4>Comment Posted</h4>
                            <div>Coming soon..</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-group">
                <a href="/user">Back</a>
            </div>
        </div>
    </div>
@endsection
