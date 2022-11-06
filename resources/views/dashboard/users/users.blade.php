@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')

    <div class="header">
        <h1>Users</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <h2>Users Data</h2>

        <a href="/user/create" class="add-button">Add User</a>

        <div class="table-wrapper">
            <table cellspacing="20">
                @if ($users->count())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="250">Name</th>
                            <th width="180" style="word-break: break-all">Username</th>
                            <th width="250">Email</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                @if ($item->role == 'admin')
                                    <td class="warning" style="text-transform: capitalize">{{ $item->role }}</td>
                                @else
                                    <td class="success" style="text-transform: capitalize">{{ $item->role }}</td>
                                @endif
                                <td>
                                    <a href="/user/{{ $item->id }}" class="primary"><span class="material-symbols-sharp">visibility</span></a>
                                    <a href="/user/{{ $item->id }}/edit" class="warning"><span class="material-symbols-sharp">edit</span></a>
                                    <form action="/user/{{ $item->id }}" style="display: inline;" method="POST">
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
                    <td class="data-empty">Data is still empty!</td>
                @endif
            </table>
        </div>
        @if ($users->count())
            <a href="#" style="display: block">Show All</a>
        @endif
    </div>
@endsection