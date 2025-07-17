@extends('layouts.app')

@section('header')
    <h2 class="page-header">🌈 Booking Dashboard</h2>
    <p>Manage your platform with style!</p>
@endsection

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

        <a href="{{ route('bookings.create') }}" class="submit-button flex items-center justify-center gap-2">
            ➕ Create Booking
        </a>

        <a href="{{ route('bookings.index') }}" class="submit-button flex items-center justify-center gap-2">
            📖 View Bookings
        </a>

        <a href="{{ route('users.index') }}" class="submit-button flex items-center justify-center gap-2">
            👥 User Management
        </a>

    </div>

    <!-- Dashboard summary cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        <div class="form-container text-center">
            <h3 class="page-header">📊 Total Bookings</h3>
            <p class="mt-4">You currently have {{ $bookingsCount }} booking{{ $bookingsCount !== 1 ? 's' : '' }}.</p>
        </div>

        <div class="form-container text-center">
            <h3 class="page-header">👥 Total Users</h3>
            <p class="mt-4">There are {{ $usersCount }} registered users.</p>
        </div>
    </div>
@endsection
