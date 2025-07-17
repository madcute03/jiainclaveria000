<nav x-data="{ open: false }">
    <style>
        nav {
            background: #111;
            border-bottom: 2px solid transparent;
            position: relative;
            z-index: 10;
        }

        nav::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet, red);
            background-size: 400%;
            z-index: -1;
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

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 0.4rem 0.6rem;
            border-radius: 6px;
            transition: all 0.3s;
        }

        .nav-link:hover::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: linear-gradient(90deg, red, orange, yellow, green, blue, indigo, violet);
            animation: rainbowGlow 5s linear infinite;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-left > .nav-link,
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
                padding: 1rem 2rem;
                animation: fadeIn 0.3s ease-in-out;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    @php
        $unreadCount = Auth::user()->unreadNotifications->count();
    @endphp

    <!-- ✅ Main Navbar -->
    <div class="nav-container">
        <!-- Left: Logo + Dashboard -->
        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="nav-logo">
                <x-application-logo class="h-10 w-auto" />
            </a>
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        </div>

        <!-- Right: User Info + Notifications + Logout -->
        <div class="nav-right">
            <span>👤 {{ Auth::user()->name }}</span>

            <a href="{{ route('notifications') }}" class="nav-link relative">
                🔔 Notifications
                @if($unreadCount > 0)
                    <span class="absolute -top-2 -right-3 bg-red-600 text-white text-xs px-2 py-0.5 rounded-full">
                        {{ $unreadCount }}
                    </span>
                @endif
            </a>

            <!-- Profile -->
            <a href="{{ route('profile.edit') }}" class="nav-link">Profile</a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="nav-link bg-red-600 hover:bg-red-700 px-3 py-1 rounded-md">Log Out</button>
            </form>
        </div>

        <!-- Mobile Hamburger -->
        <button @click="open = !open" class="hamburger">☰</button>
    </div>

    <!-- ✅ Mobile Menu -->
    <div x-show="open" x-transition class="mobile-menu" @click.outside="open = false">
        <span>👤 {{ Auth::user()->name }}</span>

        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>

        <a href="{{ route('notifications') }}" class="nav-link relative">
            🔔 Notifications
            @if($unreadCount > 0)
                <span class="absolute -top-2 -right-3 bg-red-600 text-white text-xs px-2 py-0.5 rounded-full">
                    {{ $unreadCount }}
                </span>
            @endif
        </a>

        <a href="{{ route('profile.edit') }}" class="nav-link">Profile</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link bg-red-600 hover:bg-red-700 px-3 py-1 rounded-md">Log Out</button>
        </form>
    </div>
</nav>
