<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Elevation</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800 flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex-shrink-0 flex flex-col h-full overflow-y-auto">
        <div class="h-20 flex items-center px-8 border-b border-slate-800">
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-white tracking-wider">ELEVATION<span class="text-indigo-500">.</span></a>
        </div>
        
        <nav class="flex-1 px-4 py-8 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : '' }}">Dashboard</a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-600 text-white' : '' }}">Categories</a>
            <a href="{{ route('admin.products.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-indigo-600 text-white' : '' }}">Products</a>
            <a href="{{ route('admin.orders.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-indigo-600 text-white' : '' }}">Orders</a>
            <a href="{{ route('admin.users.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600 text-white' : '' }}">Users</a>
        </nav>
        
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('home') }}" class="block w-full text-center px-4 py-2 border border-slate-700 rounded-lg hover:bg-slate-800 hover:text-white transition-colors">Storefront</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button class="w-full text-center px-4 py-2 bg-slate-800 rounded-lg text-red-400 hover:bg-red-500 hover:text-white transition-colors">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8 shadow-sm">
            <h2 class="text-xl font-semibold text-gray-800">
                @yield('header', 'Dashboard')
            </h2>
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium text-gray-500">Admin: {{ Auth::user()->name }}</span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 text-emerald-600 px-4 py-3 rounded-lg border border-emerald-200">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>
