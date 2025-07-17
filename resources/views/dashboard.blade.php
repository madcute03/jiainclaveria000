<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            🌈 Booking Dashboard
        </h2>
        <p class="text-slate-300 mt-2">Manage your platform with style!</p>
    </x-slot>

    <style>
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #f8fafc;
        }

        .card-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 2rem;
        }

        @media (min-width: 768px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .card {
            background-color: #1f1f2f;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.3);
        }

        .card::before {
            content: "";
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, red, orange, yellow, green, blue, indigo, violet);
            border-radius: inherit;
            z-index: -2;
            animation: rainbow 6s linear infinite;
        }

        .card::after {
            content: "";
            position: absolute;
            inset: 2px;
            background: #1f1f2f;
            border-radius: inherit;
            z-index: -1;
        }

        @keyframes rainbow {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }

        .card h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card p {
            color: #cbd5e1;
            font-size: 1rem;
        }
    </style>

    <div class="card-grid">
        <!-- Total Bookings -->
        <div class="card">
            <h2>📊 Total Bookings</h2>
            <p>You currently have <strong>{{ $totalBookings }}</strong> booking{{ $totalBookings !== 1 ? 's' : '' }}.</p>
        </div>

        <!-- Total Users -->
        <div class="card">
            <h2>👥 Total Users</h2>
            <p>There {{ $totalUsers === 1 ? 'is' : 'are' }} <strong>{{ $totalUsers }}</strong> registered user{{ $totalUsers !== 1 ? 's' : '' }}.</p>
        </div>
    </div>
</x-app-layout>
