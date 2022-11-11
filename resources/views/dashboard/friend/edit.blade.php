@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    <div class="header">
        <h1>Add Relation</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            <form action="/friend/{{ $friend->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="user_id" class="label-form">User</label><br>
                    <select name="user_id" id="user_id" class="input-form">
                        <option value="">-- Select User --</option>
                        @foreach ($users as $item)
                            @if (old('user_id', $friend->user_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="friend_id" class="label-form">Friend</label><br>
                    <select name="friend_id" id="friend_id" class="input-form">
                        <option value="">-- Select User --</option>
                        @foreach ($users as $item)
                            @if (old('friend_id', $friend->friend_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('friend_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if (session()->has('error'))
                        <div class="invalid-feedback">
                            {{ session('error') }}    
                        </div>    
                    @endif
                </div>
                <div class="button-group">
                    <a href="/friend">Back</a>
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection