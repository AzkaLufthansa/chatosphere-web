<aside>
    <div class="top">
        <div class="logo">
            <img src="/images/chatosphere_logo.png">
            <h2>Chato<span class="primary">Sphere</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-sharp">close</span>
        </div>
    </div>

    <div class="sidebar">
        <a href="/" class="{{ Request::is('/') ? 'active' : '' }}">
            <span class="material-symbols-sharp">grid_view</span>
            <h3>Dashboard</h3>
        </a>
        <a href="/topic" class="{{ Request::is('topic*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">topic</span>
            <h3>Topic</h3>
        </a>
        <a href="/user" class="{{ Request::is('user*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">group</span>
            <h3>Users</h3>
        </a>
        <a href="/friend" class="{{ Request::is('friend*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">diversity_3</span>
            <h3>Friend</h3>
        </a>
        <a href="/category" class="{{ Request::is('category*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">category</span>
            <h3>Category</h3>
        </a>
        <a href="/comment" class="{{ Request::is('comment*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">comment</span>
            <h3>Comment</h3>
        </a>
        <a href="/report" class="{{ Request::is('report*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">report</span>
            <h3>Reports</h3>
        </a>
        <a href="/activity" class="{{ Request::is('activity*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">work_history</span>
            <h3>Log Activity</h3>
        </a>
        <a href="/settings" class="{{ Request::is('settings*') ? 'active' : '' }}">
            <span class="material-symbols-sharp">settings</span>
            <h3>Settings</h3>
        </a>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" onclick="return confirm('Are you sure to logout?')">
                <span class="material-symbols-sharp">logout</span>
                <h3>Logout</h3>
            </button>
        </form>
    </div>
</aside>