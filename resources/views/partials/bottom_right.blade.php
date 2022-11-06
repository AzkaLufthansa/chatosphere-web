<div class="recent-updates">
    <h2>Recent Updates</h2>
    <div class="updates">
        <div class="update">
            <img src="/images/profile-2.jpg" class="profile-photo">
            <div class="message">
                <p><b>Iwan Tyson</b> receive his order of Night lion tech GPS drone.</p>
                <small class="text-muted">2 Minutes Ago</small>
            </div>
        </div>
        <div class="update">
            <img src="/images/profile-3.jpg" class="profile-photo">
            <div class="message">
                <p><b>Gus Samsuri</b> receive his order of Night lion tech GPS drone.</p>
                <small class="text-muted">2 Minutes Ago</small>
            </div>
        </div>
        <div class="update">
            <img src="/images/profile-4.jpg" class="profile-photo">
            <div class="message">
                <p><b>Silpia</b> receive his order of Night lion tech GPS drone.</p>
                <small class="text-muted">2 Minutes Ago</small>
            </div>
        </div>
    </div>
</div>
<!-- END OF RECENT UPDATES -->
<div class="sales-analytics">
    <h2>Recent Users</h2>
    @if ($recent_user->count())
        @foreach ($recent_user as $item)
            <div class="item online">
                <div class="">
                    <img src="{{ asset('storage/' . $item->image) }}" class="profile-photo">
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
        @endforeach
    @else
        <div class="item">
            <div class="right">
                <div class="info">
                    <h3 class="empty">Data is still empty!</h3>
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