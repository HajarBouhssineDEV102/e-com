<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll-pt-20">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevation | Premium Electronics & Fashion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-heading { font-family: 'Playfair Display', serif; }
        .glassmorphism { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    <!-- Navbar -->
    <nav class="glassmorphism sticky top-0 z-50 border-b border-slate-200 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="font-heading text-3xl font-bold tracking-tighter text-indigo-900">Elevation.</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">Home</a>
                    <a href="{{ request()->routeIs('home') ? '#categories' : route('home') . '#categories' }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">Categories</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">Shop</a>
                    <a href="{{ request()->routeIs('home') ? '#about' : route('home') . '#about' }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">About</a>
                    <a href="{{ request()->routeIs('home') ? '#faq' : route('home') . '#faq' }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">FAQ</a>
                    <a href="{{ request()->routeIs('home') ? '#contact' : route('home') . '#contact' }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">Contact</a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-6">
                    @auth
                        <a href="{{ route('cart.index') }}" class="text-slate-500 hover:text-indigo-600 relative group transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </a>
                        <div class="relative group">
                            <button class="flex items-center space-x-1 text-sm font-medium text-slate-500 hover:text-indigo-600 focus:outline-none">
                                <span>{{ explode(' ', Auth::user()->name)[0] }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="absolute right-0 w-48 mt-2 origin-top-right bg-white border border-slate-100 shadow-xl rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                @if(Auth::user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 rounded-t-xl">Admin Dashboard</a>
                                @endif
                                <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-600">My Orders</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-600">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-xl">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">Log In</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium bg-indigo-600 text-white px-5 py-2.5 rounded-full shadow-md shadow-indigo-200 hover:bg-indigo-700 hover:shadow-lg transition-all transform hover:-translate-y-0.5">Sign Up</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 z-50">
            <div class="bg-indigo-600 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 animate-fade-in-up">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="fixed bottom-4 right-4 z-50">
            <div class="bg-red-500 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 animate-fade-in-up">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Professional Footer -->
    <footer class="bg-slate-950 border-t border-slate-800 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <!-- Newsletter & Brand -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center border-b border-slate-800 pb-16 mb-16">
                <div>
                    <h2 class="font-heading text-4xl font-bold text-white mb-4">Elevation.</h2>
                    <p class="text-slate-400 text-lg leading-relaxed max-w-md">Join our newsletter to receive weekly drops, sustainable living tips, and exclusive VIP offers.</p>
                </div>
                <div class="lg:flex lg:justify-end">
                    <form class="flex w-full lg:max-w-md">
                        <input type="email" placeholder="Enter your email address" class="w-full bg-slate-900 border border-slate-700 text-white px-5 py-4 rounded-l-xl focus:outline-none focus:border-indigo-500 transition-colors placeholder:text-slate-500">
                        <button type="button" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-4 rounded-r-xl font-medium transition-colors whitespace-nowrap">Subscribe</button>
                    </form>
                </div>
            </div>

            <!-- Footer Links -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-12 mb-16">
                <div>
                    <h3 class="text-white font-semibold mb-6 tracking-widest text-sm uppercase">Shop</h3>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="{{ route('products.index') }}" class="hover:text-indigo-400 transition-colors">All Products</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">New Arrivals</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Trending</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Sale & Offers</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-6 tracking-widest text-sm uppercase">Support</h3>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Shipping & Delivery</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Returns & Exchanges</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Order Tracking</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-6 tracking-widest text-sm uppercase">Company</h3>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Sustainability</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Careers</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Press & Media</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-6 tracking-widest text-sm uppercase">Legal</h3>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Cookie Policy</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition-colors">Accessibility</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="flex flex-col md:flex-row justify-between items-center pt-8 border-t border-slate-800">
                <p class="text-sm text-slate-500 mb-6 md:mb-0">
                    &copy; {{ date('Y') }} Elevation Store. Crafted with passion. All rights reserved.
                </p>
                
                <div class="flex items-center space-x-6">
                    <!-- FB -->
                    <a href="#" class="text-slate-500 hover:text-indigo-400 transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <!-- Insta -->
                    <a href="#" class="text-slate-500 hover:text-indigo-400 transition-colors">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.469 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <!-- Twitter -->
                    <a href="#" class="text-slate-500 hover:text-indigo-400 transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.4s ease-out forwards;
        }
    </style>
</body>
</html>
