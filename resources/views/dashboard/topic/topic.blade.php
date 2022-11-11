@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    <div class="header">
        <h1>Topic</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <h2>Topic Data</h2>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div>
                <a href="/topic/create" class="add-button">Add Topic</a>
                <div>Records found : {{ $topics->count() }}</div>
            </div>
            <div>
                <form action="/topic">
                    <input type="text" class="search-input" style="width: 20rem" placeholder="Enter keyword..." name="search" value="{{ request('search') }}">
                    <button class="add-button">Search</button>
                </form>
            </div>
        </div>

        <div class="table-wrapper">
            <table cellspacing="20">
                @if ($topics->count())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="400">Title</th>
                            <th>Username</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topics as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td><a href="/user/{{ $item->user->id }}">{{ $item->user->username }}</a></td>
                                <td><a href="/category/{{ $item->category->slug }}">{{ $item->category->name }}</a></td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="/topic/{{ $item->slug }}" class="primary"><span class="material-symbols-sharp">visibility</span></a>
                                    <a href="/topic/{{ $item->slug }}/edit" class="warning"><span class="material-symbols-sharp">edit</span></a>
                                    <form action="/topic/{{ $item->slug }}" style="display: inline;" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="background: transparent" class="danger" style="cursor: pointer">
                                            <span class="material-symbols-sharp" onclick="return confirm('Are you sure?')">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <td class="data-empty">Data not found!</td>
                @endif
            </table>
        </div>
        @if ($topics->count())
            <a href="#" style="display: block">Show All</a>
        @endif
    </div>
@endsection
