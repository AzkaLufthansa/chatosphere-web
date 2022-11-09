@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    
    <div class="header">
        <h1>Detail Category</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            <h2>Topic By Category : {{ $category->name }}</h2>
            <p style="margin-top: .7rem">Total topic : {{ $category->topics->count() }}</p>

            <div>
                
            </div>
        </div>
    </div>
@endsection
