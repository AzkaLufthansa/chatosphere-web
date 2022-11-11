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
                @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" class="profile-photo-large" style="margin-bottom: 1rem">
                @else
                    <img src="{{ asset('images/default_profile.png') }}" class="profile-photo-large" style="margin-bottom: 1rem">
                @endif
                <div style="display: flex; gap: 2rem; align-items: center">
                    <a href="/user/{{ $user->id }}/edit" class="primary"><span class="material-symbols-sharp">group</span></a>
                    <a href="/user/{{ $user->id }}/edit" class="warning"><span class="material-symbols-sharp">edit</span></a>
                    <form action="/user/{{ $user->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" style="background: transparent" class="danger" style="cursor: pointer">
                            <span class="material-symbols-sharp" onclick="return confirm('Are you sure?')">delete</span>
                        </button>
                    </form>
                </div>
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
                        <div class="row">
                            <h4><a href="/user/friendof={{ $user->username }}">Friend</a></h4>
                            <div>Coming soon..</div>
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
                            <h4><a href="/topic?user={{ $user->username }}">Topic Posted</a></h4>
                            <div>{{ $user->topics->count() }}</div>
                        </div>
                        <div class="row">
                            <h4><a href="#">Comment Posted</a></h4>
                            <div>Coming soon..</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-group">
                <a href="/user">Back</a>
                <a href="/topic?user={{ $user->username }}">See all {{ $user->name }} topics</a>
            </div>
        </div>
    </div>
@endsection
