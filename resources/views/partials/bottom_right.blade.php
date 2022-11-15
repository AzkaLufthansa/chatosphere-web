<div class="recent-updates">
    <h2>Recent Updates</h2>
    <div class="updates">
        @if ($log_activities->count())
            @foreach ($log_activities as $item)
                <div class="update">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->user->image) }}" class="profile-photo">
                    @else
                        <img src="{{ asset('images/default_profile.png') }}" class="profile-photo">
                    @endif
                    <div class="message">
                        <p><b>{{ $item->user->username }}</b> {{ $item->message }}</p>
                        <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach
        @else
            No activity yet!
        @endif
    </div>
</div>
<!-- END OF RECENT UPDATES -->
<div class="sales-analytics">
    <h2>Recent Users</h2>
    @if ($recent_user->count())
        @foreach ($recent_user as $item)
        <a href="/user/{{ $item->id }}">
            <div class="item online">
                <div class="">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="profile-photo">
                    @else
                        <img src="{{ asset('images/default_profile.png') }}" class="profile-photo">
                    @endif
                </div>
                <div class="right">
                    <div class="info">
                        <h3>{{ $item->name }}</h3>
                        <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                    </div>
                    @if ($item->role == 'admin')
                        <h3 class="warning role">{{ $item->role }}</h3>
                    @else
                        <h3 class="success role">{{ $item->role }}</h3>
                    @endif
                </div>
            </div>
        </a>
        @endforeach
    @else
        <div class="item">
            <div class="right">
                <div class="info">
                    <h3 class="empty">Data not found!</h3>
                </div>
            </div>
        </div>
    @endif
    <a href="/user/create">
        <div class="item add-product">
            <div>
                <span class="material-symbols-sharp">add</span>
                <h3>Add User</h3>
            </div>
        </div>
    </a>
</div>