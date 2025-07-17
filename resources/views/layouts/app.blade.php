<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: radial-gradient(circle at top left, #0f172a, #000000);
            min-height: 100vh;
            color: #cce4ff;
            box-shadow: inset 0 0 60px rgba(0, 123, 255, 0.1);
        }

        header {
            background: rgba(30, 58, 138, 0.6);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #3b82f6;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.2);
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            font-size: 2rem;
            font-weight: bold;
            color: #cce4ff;
            text-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
            margin-bottom: 2rem;
        }

        input, textarea, select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #3b82f6;
            border-radius: 8px;
            background: #0f172a;
            color: #fff;
            margin-bottom: 1.25rem;
            box-shadow: 0 0 5px rgba(59, 130, 246, 0.3);
            transition: all 0.3s;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.7);
        }

        .btn-primary {
            background: linear-gradient(to right, #0ea5e9, #6366f1);
            padding: 0.75rem 2rem;
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(14, 165, 233, 0.6);
            transition: transform 0.3s;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.8);
        }

        .form-container {
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(0, 123, 255, 0.2);
            border-radius: 15px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>
<body>

    {{-- ✅ Navigation --}}
    @include('layouts.navigation')

    {{-- ✅ Page Header --}}
    @hasSection('header')
        <header class="py-6 px-4 sm:px-6 lg:px-8">
            <div class="page-header">
                @yield('header')
            </div>
        </header>
    @endif

    {{-- ✅ Main Content --}}
    <main>
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    @stack('scripts')

</body>
</html>
