@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')

    <div class="header">
        <h1>Friend</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <h2>User Friend Relation</h2>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div>
                <a href="/friend/create" class="add-button">Add Relation</a>
                <div>Records found : {{ $relations->count() }}</div>
            </div>
            <div>
                <form action="/friend">
                    <input type="text" class="search-input" placeholder="Enter id..." name="search" value="{{ request('search') }}">
                    <button class="add-button" type="submit">Search</button>
                    <a href="/friend" class="add-button button-danger">Reset Filters</a>
                </form>
            </div>
        </div>

        <div class="table-wrapper">
            <table cellspacing="20">
                @if ($relations->count())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Id</th>
                            <th>Friend Id</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="/user/{{ $item->user_id }}">{{ $item->user_id }}</a></td>
                                <td><a href="/user/{{ $item->friend_id }}">{{ $item->friend_id }}</a></td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="/friend/{{ $item->id }}/edit" class="warning"><span class="material-symbols-sharp">edit</span></a>
                                    <form action="/friend/{{ $item->id }}" style="display: inline;" method="POST">
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
        @if ($relations->count())
            <a href="#" style="display: block">Show All</a>
        @endif
    </div>
@endsection