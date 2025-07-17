<nav x-data="{ open: false }" class="nav-wrapper">
    <style>
        .nav-wrapper {
            position: relative;
            background: #111;
            border-bottom: 3px solid transparent;
            z-index: 10;
        }

        .nav-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            z-index: -1;
            background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet, red);
            background-size: 400%;
            animation: rainbowGlow 10s linear infinite;
        }

        @keyframes rainbowGlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .nav-left, .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-logo svg {
            height: 40px;
        }

        .nav-link {
            color: white;
            font-weight: 500;
            text-decoration: none;
            position: relative;
            padding: 0.4rem 0.6rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #60a5fa;
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -10px;
            background: #dc2626;
            color: white;
            font-size: 0.7rem;
            padding: 0.1rem 0.4rem;
            border-radius: 9999px;
        }

        .hamburger {
            display: none;
            font-size: 2rem;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-right {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .mobile-menu {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                background: #111;
                padding: 1.5rem;
                animation: fadeIn 0.3s ease-in-out;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    @php $unreadCount = Auth::user()->unreadNotifications->count(); @endphp

    <div class="nav-container">
        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="nav-logo">
                <x-application-logo />
            </a>
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        </div>

        <div class="nav-right">
            <span>👤 {{ Auth::user()->name }}</span>
            <a href="{{ route('notifications') }}" class="nav-link">
                🔔 Notifications
                @if ($unreadCount > 0)
                    <span class="notification-badge">{{ $unreadCount }}</span>
                @endif
            </a>
            <a href="{{ route('profile.edit') }}" class="nav-link">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link" style="background:none;border:none;padding:0;cursor:pointer;">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>

        <button @click="open = !open" class="hamburger">☰</button>
    </div>

    <div x-show="open" x-transition class="mobile-menu">
        <span>👤 {{ Auth::user()->name }}</span>
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        <a href="{{ route('notifications') }}" class="nav-link">
            🔔 Notifications
            @if ($unreadCount > 0)
                <span class="notification-badge">{{ $unreadCount }}</span>
            @endif
        </a>
        <a href="{{ route('profile.edit') }}" class="nav-link">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link" style="background:none;border:none;padding:0;cursor:pointer;">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</nav>
