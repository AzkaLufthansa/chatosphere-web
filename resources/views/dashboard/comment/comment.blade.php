@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    <div class="header">
        <h1>Comment</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <h2>Comment Data</h2>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div>
                <div>Records found : {{ $comments->count() }}</div>
            </div>
            <div>
                <form action="/comment">
                    @if (request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif
                    <input type="text" class="search-input" style="width: 15rem" placeholder="Enter keyword..." name="search" value="{{ request('search') }}">
                    <button class="add-button" type="submit">Search</button>
                    <a href="/comment" class="add-button button-danger">Reset Filters</a>
                </form>
            </div>
        </div>

        <div class="table-wrapper">
            <table cellspacing="20">
                @if ($comments->count())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="200">User</th>
                            <th>Topic</th>
                            <th>Comment</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="/user/{{ $item->user->id }}">{{ $item->user->username }}</a></td>
                                <td><a href="/topic/{{ $item->topic->slug }}">{{ $item->topic->title }}</a></td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <form action="/comment/{{ $item->id }}" style="display: inline;" method="POST">
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
            <div style="display: flex; justify-content: end; margin-top: 1rem;">
                {{ $comments->withQueryString()->links() }}
            </div>
        </div>
        @if ($comments->count())
            <a href="/comment" style="display: block">Show All</a>
        @endif
    </div>
@endsection
