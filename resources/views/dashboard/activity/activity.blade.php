@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    <div class="header">
        <h1>Log Activity</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <h2>Log Activity Data</h2>

        <div style="display: flex; justify-content: end; align-items: center; margin-bottom: 1rem;">
            <div>
                <form action="/activity">
                    <input type="text" class="search-input" placeholder="Enter keyword..." name="search" value="{{ request('search') }}" style="width: 15rem">
                    <button class="add-button" type="submit">Search</button>
                    <a href="/activity" class="add-button button-danger">Reset Filters</a>
                </form>
            </div>
        </div>

        <table cellspacing="20">
            @if ($activities->count())
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="/activity/{{ $item->id }}" style="display: inline;" method="POST">
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
            {{ $activities->withQueryString()->links() }}
        </div>
        @if ($activities->count())
            <a href="/activity" style="display: block">Show All</a>
        @endif
    </div>

@endsection
