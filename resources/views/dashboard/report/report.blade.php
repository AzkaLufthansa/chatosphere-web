@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    <div class="header">
        <h1>Reports Data</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <h2>Topic Data</h2>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div>
                <div>Records found : {{ $reports->count() }}</div>
            </div>
            <div>
                <form action="/report">
                    <input type="text" class="search-input" style="width: 15rem" placeholder="Enter keyword..." name="search" value="{{ request('search') }}">
                    <button class="add-button" type="submit">Search</button>
                    <a href="/report" class="add-button button-danger">Reset Filters</a>
                </form>
            </div>
        </div>

        <div class="table-wrapper">
            <table cellspacing="20">
                @if ($reports->count())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Topic Id</th>
                            <th>User</th>
                            <th>Message</th>
                            <th>Reported At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="/topic/{{ $item->topic->slug }}">{{ $item->topic_id }}</a></td>
                                <td><a href="/user/{{ $item->user_id }}">{{ $item->user->username }}</a></td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="/topic/{{ $item->topic->slug }}" class="primary"><span class="material-symbols-sharp">google_plus_reshare</span></a>
                                    <form action="/report/{{ $item->id }}" style="display: inline;" method="POST">
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
        @if ($reports->count())
            <a href="#" style="display: block">Show All</a>
        @endif
    </div>
@endsection
