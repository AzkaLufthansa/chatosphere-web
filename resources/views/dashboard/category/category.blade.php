@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style2.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    <div class="header">
        <h1>Category</h1>
        <div class="user-profile">
            @include('partials.top_user')
        </div>
    </div>

    <div class="recent-orders">
        <h2>Category Data</h2>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div>
                <a href="/category/create" class="add-button">Add Category</a>
                <div>Records found : {{ $categories->count() }}</div>
            </div>
            <div>
                <form action="/category">
                    <input type="text" class="search-input" placeholder="Enter keyword..." name="search" value="{{ request('search') }}" style="width: 15rem">
                    <button class="add-button" type="submit">Search</button>
                    <a href="/user" class="add-button button-danger">Reset Filters</a>
                </form>
            </div>
        </div>

        <table cellspacing="20">
            @if ($categories->count())
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>{{ $item->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="/topic?category={{ $item->slug }}" class="primary"><span class="material-symbols-sharp">visibility</span></a>
                                <a href="/category/{{ $item->slug }}/edit" class="warning"><span class="material-symbols-sharp">edit</span></a>
                                <form action="/category/{{ $item->slug }}" style="display: inline;" method="POST">
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
            {{ $categories->withQueryString()->links() }}
        </div>
        @if ($categories->count())
            <a href="/category" style="display: block">Show All</a>
        @endif
    </div>

@endsection
