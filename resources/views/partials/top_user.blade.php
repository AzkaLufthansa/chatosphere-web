<div class="top">
    <button id="menu-btn">
        <span class="material-symbols-sharp">menu</span>
    </button>
    {{-- <div class="theme-toggler">
        <span class="material-symbols-sharp active">light_mode</span>
        <span class="material-symbols-sharp">dark_mode</span>
    </div> --}}
    <div class="profile">
        <div class="info">
            <p>Hey, <b>{{ auth()->user()->name }}</b></p>
            <small class="text-muted role">{{ auth()->user()->role }}</small>
        </div>
        @if (auth()->user()->image)
            <img src="{{ asset('storage/' . auth()->user()->image) }}" class="profile-photo">
        @else
            <img src="{{ asset('images/default_profile.png') }}" class="profile-photo">
        @endif
    </div>
</div>