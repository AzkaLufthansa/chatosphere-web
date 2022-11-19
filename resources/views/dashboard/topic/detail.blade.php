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
            <p class="text-muted author">By <a href="/user/{{ $topic->user->id }}">{{ $topic->user->name }}</a> in <a href="/topic?category={{ $topic->category->slug }}">{{ $topic->category->name }}</a></p>
            @if ($topic->image)
                <div style="margin-top: 1.7rem"><img src="{{ asset('storage/' . $topic->image) }}" class="topic-image""></div>
            @endif
            <p class="topic-content" style="margin-top: 1.7rem">{!! $topic->content !!}</p>

            <hr style="border: 1px solid #e5e5e7; margin: 2rem 0 2rem 0">

            <div>
                <h3 style="margin-bottom: 1rem;">Post Comment</h3>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="parent" value="0">
                    <textarea name="content" id="content" rows="4" class="input-form"></textarea>
                    <div style="display: flex; justify-content: end; margin-top: 1rem;">
                        <button type="submit" class="add-button">Post Comment</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="form-card" style="margin-top: 1rem">
            <h3 style="margin-bottom: 1rem">Comment</h3>
            @foreach ($comments as $item)
                <div class="user-comment">
                    <div>
                        @if ($item->user->image)
                            <img src="{{ asset('storage/' . $item->user->image) }}" class="profile-photo">
                        @else                            
                            <img src="/images/default_profile.png" class="profile-photo">
                        @endif
                    </div>
                    <div>
                        <div><a href="/user/{{ $item->user->id }}" style="font-weight: 700">{{ $item->user->name }}</a> {{ $item->content }}</div>
                        <div class="text-muted">{{ $item->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
