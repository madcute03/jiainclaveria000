<nav x-data="{ open: false }">
    <!-- Navigation styling and menu here -->
    <div class="nav-container">
        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="nav-logo"><x-application-logo /></a>
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        </div>

        <div class="nav-right">
            <span class="nav-user-name">👤 {{ Auth::user()->name }}</span>
            <a href="{{ route('notifications') }}" class="nav-link">🔔 Notifications
                @if($unreadCount = Auth::user()->unreadNotifications->count())
                    <span class="notification-badge">{{ $unreadCount }}</span>
                @endif
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
            </form>
        </div>

        <button @click="open = !open" class="hamburger">☰</button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="mobile-menu">
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        <a href="{{ route('notifications') }}" class="nav-link">🔔 Notifications
            @if($unreadCount)
                <span class="notification-badge">{{ $unreadCount }}</span>
            @endif
        </a>
        <a href="{{ route('profile.edit') }}" class="nav-link">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
        </form>
    </div>
</nav>
