@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    <div class="header">
        <h1>Edit Topic</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <div class="form-card">
            <form action="/topic/{{ $topic->slug }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title" class="label-form">Title</label><br>
                    <input type="text" name="title" id="title" class="input-form" value="{{ old('title', $topic->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug" class="label-form">Slug</label><br>
                    <input type="text" name="slug" id="slug" class="input-form" value="{{ old('slug', $topic->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id" class="label-form">Category</label><br>
                    <select name="category_id" id="category_id" class="input-form">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $item)
                            @if (old('category_id', $topic->category_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content" class="label-form">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ old('content', $topic->content) }}">
                    <trix-editor class="input-form" input="content"></trix-editor>
                    @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="button-group">
                    <a href="/topic">Back</a>
                    <button type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>

    
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/topic/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection