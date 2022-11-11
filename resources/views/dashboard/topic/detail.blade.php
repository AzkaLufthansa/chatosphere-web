@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    <div class="header">
        <h1>Detail Topic</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            <div style="display: flex; justify-content: space-between">
                <h2 class="topic-title" style="margin-bottom: 0.5rem">{{ $topic->title }}</h2>
                <div>
                    <a href="/topic" class="primary" style="margin-right: 1.5rem;"><span class="material-symbols-sharp">keyboard_backspace</span></a>
                    <a href="/topic/{{ $topic->slug }}/edit" class="warning" style="margin-right: 1.5rem;"><span class="material-symbols-sharp">edit</span></a>
                    <form action="/topic/{{ $topic->slug }}" style="display: inline;" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" style="background: transparent" class="danger" style="cursor: pointer">
                            <span class="material-symbols-sharp" onclick="return confirm('Are you sure?')">delete</span>
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-muted author">By <a href="/user/{{ $topic->user->id }}">{{ $topic->user->name }}</a> in <a href="/topic?category={{ $topic->category->name }}">{{ $topic->category->name }}</a></p>
            @if ($topic->image)
                <div style="margin-top: 1.7rem"><img src="{{ asset('storage/' . $topic->image) }}" class="topic-image""></div>
            @endif
            <p class="topic-content" style="margin-top: 1.7rem">{!! $topic->content !!}</p>
        </div>
    </div>
@endsection
