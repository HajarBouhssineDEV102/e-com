@extends('layouts.store')

@section('content')
<!-- Hero Section -->
<div class="relative bg-slate-900 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?q=80&w=2670&auto=format&fit=crop" alt="Hero background" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 md:py-48 flex items-center">
        <div class="max-w-2xl">
            <span class="text-indigo-400 font-semibold tracking-wider text-sm uppercase mb-4 block">New Collection 2026</span>
            <h1 class="font-heading text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">Elevate Your <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Everyday Style.</span></h1>
            <p class="text-slate-300 text-lg md:text-xl mb-10 max-w-lg leading-relaxed">
                Discover our curated selection of premium products designed for the contemporary lifestyle. Minimalist aesthetics meet uncompromising durability.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('products.index') }}" class="bg-indigo-600 text-white font-medium px-8 py-3.5 rounded-full shadow-lg shadow-indigo-500/30 hover:bg-indigo-700 hover:shadow-indigo-500/50 transition-all transform hover:-translate-y-1">
                    Shop Collection
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Featured Benefits -->
<div class="bg-white py-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex items-center space-x-4 p-6 rounded-2xl bg-slate-50 transition-colors hover:bg-indigo-50 group">
                <div class="bg-white p-3 rounded-full shadow-sm text-indigo-600 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900">Free Worldwide Shipping</h3>
                    <p class="text-sm text-slate-500 mt-1">On all orders over $150</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-6 rounded-2xl bg-slate-50 transition-colors hover:bg-indigo-50 group">
                <div class="bg-white p-3 rounded-full shadow-sm text-indigo-600 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900">Secure Payments</h3>
                    <p class="text-sm text-slate-500 mt-1">100% protected transactions</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-6 rounded-2xl bg-slate-50 transition-colors hover:bg-indigo-50 group">
                <div class="bg-white p-3 rounded-full shadow-sm text-indigo-600 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900">30-Day Returns</h3>
                    <p class="text-sm text-slate-500 mt-1">Hassle-free return policy</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Shop by Categories Section -->
<div id="categories" class="bg-slate-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="font-heading text-4xl font-bold text-slate-900">Shop by Category</h2>
            <p class="text-slate-500 mt-4 text-lg">Explore our curated collections suited perfectly to your everyday needs.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($categories->take(3) as $category)
                <div class="group relative overflow-hidden rounded-3xl h-80 bg-slate-900 isolation transition-all duration-300 shadow-sm border border-slate-200">
                    <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?q=80&w=1000&auto=format&fit=crop" class="absolute inset-0 z-0 h-full w-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-700 ease-in-out mix-blend-overlay">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent z-10 p-8 flex flex-col justify-end">
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $category->name }}</h3>
                        <p class="text-slate-300 text-sm mb-4 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">{{ $category->description ?? 'Browse our exclusive '.$category->name.' collection.' }}</p>
                        <a href="{{ route('products.index', ['category' => $category->name]) }}" class="inline-flex items-center text-sm font-semibold text-indigo-400 hover:text-indigo-300 w-fit">
                            Explore <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Trending Products -->
<div class="bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 pb-28">
    <div class="flex justify-between items-end mb-12 border-b border-slate-100 pb-6">
        <div>
            <h2 class="font-heading text-4xl font-bold text-slate-900">Trending Now</h2>
            <p class="text-slate-500 mt-2 text-lg">Hand-picked selections from our designers</p>
        </div>
        <a href="{{ route('products.index') }}" class="hidden md:flex items-center text-indigo-600 font-medium hover:text-indigo-800 transition-colors">
            View All <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
        @foreach($products as $product)
            <div class="group">
                <a href="{{ route('products.show', $product) }}" class="block relative rounded-2xl overflow-hidden bg-slate-100 aspect-[4/5] mb-5 shadow-sm border border-slate-50 relative">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                            <span class="font-heading text-xl">Elevation.</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
                </a>
                <div>
                    <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest bg-indigo-50 px-2.5 py-1 rounded-md">{{ $product->category->name ?? 'Uncategorized' }}</span>
                    <h3 class="font-semibold text-slate-900 mt-3 text-lg leading-tight"><a href="{{ route('products.show', $product) }}" class="hover:text-indigo-600 transition-colors">{{ $product->name }}</a></h3>
                    <p class="text-slate-500 mt-2 font-medium">${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- About Us Section -->
<div id="about" class="py-24 bg-slate-900 text-white relative overflow-hidden">
    <!-- Abstract background shape -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-indigo-600/20 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-purple-600/20 blur-3xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="lg:flex lg:items-center lg:gap-16">
            <div class="lg:w-1/2 mb-12 lg:mb-0">
                <div class="w-full h-[500px] rounded-3xl overflow-hidden shadow-2xl relative">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Our Workspace">
                    <div class="absolute inset-0 border-4 border-indigo-500/30 rounded-3xl m-4 pointer-events-none"></div>
                </div>
            </div>
            <div class="lg:w-1/2">
                <span class="text-indigo-400 font-bold uppercase tracking-widest text-sm mb-4 block">Our Story</span>
                <h2 class="font-heading text-4xl md:text-5xl font-bold mb-6">Built on quality, driven by passion.</h2>
                <div class="space-y-6 text-slate-300 text-lg leading-relaxed">
                    <p>
                        Elevation started with a simple idea: to create a curated marketplace that champions exceptional design without compromising on ethical standards.
                    </p>
                    <p>
                        We travel the globe partnering directly with artisans and independent brands who share our commitment to longevity over fast trends. Every product in our catalog embodies our core philosophy—things you buy should last, look beautiful, and do good.
                    </p>
                </div>
                <div class="mt-10 grid grid-cols-2 gap-8 border-t border-slate-700/50 pt-10">
                    <div>
                        <span class="block text-4xl font-bold text-white mb-2">10k+</span>
                        <span class="text-sm text-slate-400 uppercase tracking-wider font-semibold">Customers</span>
                    </div>
                    <div>
                        <span class="block text-4xl font-bold text-white mb-2">100%</span>
                        <span class="text-sm text-slate-400 uppercase tracking-wider font-semibold">Carbon Neutral</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div id="faq" class="py-24 bg-slate-50 border-b border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-heading text-4xl font-bold text-slate-900">Frequently Asked Questions</h2>
            <p class="text-slate-500 mt-4 text-lg">Everything you need to know about our products and services.</p>
        </div>
        
        <div class="space-y-6">
            <!-- FAQ 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold text-slate-900 mb-3 flex items-start gap-4">
                    <span class="text-indigo-500 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    What is your return policy?
                </h3>
                <p class="text-slate-600 leading-relaxed ml-10">
                    We offer a 30-day return policy for all unused items in their original packaging. Simply contact our support team to initiate a return, and we'll provide a prepaid shipping label.
                </p>
            </div>
            
            <!-- FAQ 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold text-slate-900 mb-3 flex items-start gap-4">
                    <span class="text-indigo-500 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    Do you ship internationally?
                </h3>
                <p class="text-slate-600 leading-relaxed ml-10">
                    Yes! We provide secure, tracked international shipping to over 100 countries. Standard shipping is free for all orders over $150 worldwide.
                </p>
            </div>
            
            <!-- FAQ 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <h3 class="text-xl font-semibold text-slate-900 mb-3 flex items-start gap-4">
                    <span class="text-indigo-500 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    How do I track my order?
                </h3>
                <p class="text-slate-600 leading-relaxed ml-10">
                    Once your order is dispatched, you will receive a tracking link via email. You can also view real-time tracking information under the 'My Orders' section of your account.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Contact Us Section -->
<div id="contact" class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-indigo-600 rounded-3xl overflow-hidden shadow-2xl relative">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=1000')] opacity-20 bg-cover bg-center mix-blend-overlay"></div>
            
            <div class="relative z-10 px-8 py-16 md:p-20 lg:p-24 lg:flex lg:items-center lg:justify-between">
                <div class="lg:w-1/2 text-white mb-12 lg:mb-0 lg:pr-16">
                    <h2 class="font-heading text-4xl font-bold mb-6">Get In Touch</h2>
                    <p class="text-indigo-100 text-lg mb-10 leading-relaxed">Have a question about a product, or need help with a return? We're available Monday through Friday to make sure you have the best experience possible.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-md">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-indigo-200 uppercase tracking-widest font-semibold">Email Us</p>
                                <p class="text-lg font-medium">support@elevation.com</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-md">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-indigo-200 uppercase tracking-widest font-semibold">Call Us</p>
                                <p class="text-lg font-medium">+1 (800) 123-4567</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl">
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">First Name</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-shadow bg-slate-50 focus:bg-white text-slate-800" placeholder="John">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Last Name</label>
                                    <input type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-shadow bg-slate-50 focus:bg-white text-slate-800" placeholder="Doe">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                                <input type="email" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-shadow bg-slate-50 focus:bg-white text-slate-800" placeholder="john@example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                                <textarea rows="4" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-shadow bg-slate-50 focus:bg-white text-slate-800" placeholder="How can we help?"></textarea>
                            </div>
                            <button type="button" class="w-full bg-slate-900 text-white font-semibold py-4 rounded-xl hover:bg-slate-800 transition-colors">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
