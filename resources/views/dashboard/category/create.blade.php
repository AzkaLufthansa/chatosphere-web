@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    <div class="header">
        <h1>Add Category</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            <form action="/category" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="label-form">Category Name</label><br>
                    <input type="text" name="name" id="name" class="input-form" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="button-group">
                    <a href="/category">Back</a>
                    <button type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection