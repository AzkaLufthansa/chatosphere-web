@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('main')
    @include('sweetalert::alert')
    
    <h1>Dashboard</h1>

    <div class="insights">
        <div class="sales">
            <span class="material-symbols-sharp">topic</span>
            <div class="middle">
                <div class="left">
                    <h3>Number of Topics</h3>
                    <h1>{{ $total_topics }}</h1>
                </div>
            </div>
            @if ($recent_topic->count())
                <small class="text-muted">Updated {{ $recent_topic[0]->created_at->diffForHumans() }}</small>
            @endif
        </div>
        <!-- END OF SALES -->
        <div class="expenses">
            <span class="material-symbols-sharp">group</span>
            <div class="middle">
                <div class="left">
                    <h3>Number of Users</h3>
                    <h1>{{ $total_users }}</h1>
                </div>
            </div>
            @if ($recent_user->count())
                <small class="text-muted">Updated {{ $recent_user[0]->created_at->diffForHumans() }}</small>
            @endif
        </div>
        <div class="income">
            <span class="material-symbols-sharp">category</span>
            <div class="middle">
                <div class="left">
                    <h3>Number of Categories</h3>
                    <h1>{{ $total_categories }}</h1>
                </div>
            </div>
            @if ($recent_categories->count())
                <small class="text-muted">Updated {{ $recent_categories[0]->diffForHumans() }}</small>
            @endif
        </div>
    </div>
    <!-- END OF INSIGHTS -->

    <div class="recent-orders">
        <h2>Recent Topic</h2>
        <table >
            @if ($recent_topic->count())
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Username</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recent_topic as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->title, 50, $end='...') }}</td>
                        <td><a href="/user/{{ $item->user->id }}">{{ $item->user->username }}</a></td>
                        <td><a href="/category/{{ $item->category->slug }}">{{ $item->category->name }}</a></td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td><a href="/topic/{{ $item->slug }}" class="primary"><span class="material-symbols-sharp">visibility</span></a></td>
                    </tr>
                @endforeach
            </tbody>
            @else
                <td class="data-empty">Data is still empty!</td>
            @endif
        </table>
        @if ($recent_topic->count())
            <a href="/topic">See All Topics</a>
        @endif
@endsection

{{-- RIGHT --}}
@section('right')
        <div class="right">
            @include('partials.top_user')
            @include('partials.bottom_right')
        </div>
@endsection