<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Griya Beku Nusantara') &mdash; Frozen Food Nusantara</title>
    <meta name="description" content="PT Griya Beku Nusantara — produsen frozen food rumahan dan nusantara: pempek, dimsum, nugget, rendang kemasan vakum, dan otak-otak ikan.">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ivory: {
                            50: '#FAF8F5',
                            100: '#F3EFE8',
                            200: '#E2DDD4',
                        },
                        brand: {
                            50: '#EDF3F6',
                            100: '#D4E2EA',
                            600: '#1A5270',
                            700: '#144159',
                            800: '#0F3548',
                            900: '#0A2330',
                        },
                        ice: {
                            50: '#E8F6F8',
                            100: '#CBEBF0',
                            200: '#9CD8E2',
                            600: '#187B8C',
                            700: '#136270',
                        },
                        terracotta: {
                            50: '#FDF1EE',
                            100: '#FADCD4',
                            500: '#C24B2D',
                            600: '#A63C21',
                        },
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                        serif: ['Fraunces', 'Georgia', 'serif'],
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <style>
        body { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    @stack('head')
</head>
<body class="bg-ivory-50 text-[#1B1F23] antialiased overflow-x-hidden flex flex-col min-h-screen">

    <header class="bg-white/95 backdrop-blur border-b border-ivory-200 sticky top-0 z-40">
        <div class="h-1 bg-gradient-to-r from-brand-800 via-ice-600 to-terracotta-500"></div>
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-[70px]">
                <a href="{{ route('home') }}" class="flex items-center gap-3 min-w-0">
                    <span class="h-10 w-10 flex-shrink-0 rounded-lg bg-ice-50 border border-ice-200 p-1">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo PT Griya Beku Nusantara" class="h-full w-full object-contain">
                    </span>
                    <span class="leading-tight min-w-0">
                        <span class="block font-bold text-sm sm:text-base tracking-tight text-brand-900 truncate">PT Griya Beku Nusantara</span>
                        <span class="hidden sm:block text-ice-700 text-[11px] font-medium tracking-wide uppercase">Frozen Food Rumahan &amp; Nusantara</span>
                    </span>
                </a>

                <div class="flex items-center gap-1 sm:gap-2 text-sm font-medium">
                    <a href="{{ route('home') }}"
                       class="px-3 py-2 rounded-md transition {{ request()->routeIs('home') ? 'text-brand-900 font-semibold bg-ice-50 border border-ice-200' : 'text-[#525B63] hover:text-brand-800 hover:bg-ivory-100' }}">
                        Beranda
                    </a>
                    <a href="{{ route('catalog.index') }}"
                       class="px-3 py-2 rounded-md transition {{ request()->routeIs('catalog.*') ? 'text-brand-900 font-semibold bg-ice-50 border border-ice-200' : 'text-[#525B63] hover:text-brand-800 hover:bg-ivory-100' }}">
                        Katalog
                    </a>

                    @auth
                        <span class="hidden sm:inline-block h-4 w-px bg-ivory-200 mx-1"></span>
                        <a href="{{ route('admin.products.index') }}"
                           class="hidden sm:inline-block px-3 py-2 rounded-md transition {{ request()->routeIs('admin.products.*') ? 'text-brand-900 font-semibold bg-terracotta-50 border border-terracotta-100' : 'text-[#525B63] hover:text-brand-800 hover:bg-ivory-100' }}">
                            Admin
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 rounded-md text-[#525B63] hover:text-terracotta-600 hover:bg-terracotta-50 transition">
                                Keluar
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-1">
        @if (session('status'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
                <div class="rounded-lg bg-ice-50 border border-ice-200 text-brand-900 px-4 py-3 text-sm font-medium">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-brand-900 text-brand-100 mt-20">
        <div class="h-1 bg-gradient-to-r from-ice-600 via-terracotta-500 to-brand-700"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 sm:grid-cols-12 gap-8">
            <div class="sm:col-span-5">
                <div class="flex items-center gap-3 mb-4">
                    <span class="h-11 w-11 flex-shrink-0 rounded-lg bg-white p-1">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo PT Griya Beku Nusantara" class="h-full w-full object-contain">
                    </span>
                    <div>
                        <span class="block font-bold text-white text-sm">PT Griya Beku Nusantara</span>
                        <span class="block text-xs text-ice-200">Dapur Produksi &amp; Distribusi Frozen Food</span>
                    </div>
                </div>
                <p class="text-sm text-brand-100/80 leading-relaxed max-w-sm">
                    Menyediakan olahan beku rumahan dan khas nusantara tanpa bahan pengawet, dikemas vakum dan dibekukan cepat untuk menjaga mutu.
                </p>
            </div>
            <div class="sm:col-span-3">
                <h3 class="font-semibold text-ice-200 mb-3 text-xs uppercase tracking-wider">Navigasi</h3>
                <ul class="space-y-2 text-sm text-brand-100/80">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('catalog.index') }}" class="hover:text-white transition">Katalog Produk</a></li>
                </ul>
            </div>
            <div class="sm:col-span-4">
                <h3 class="font-semibold text-ice-200 mb-3 text-xs uppercase tracking-wider">Pemesanan &amp; Layanan</h3>
                <ul class="space-y-2 text-sm text-brand-100/80">
                    <li>WhatsApp Admin: <span class="text-white font-medium tabular-nums">+{{ config('services.whatsapp.number') }}</span></li>
                    <li>Pengiriman: Seluruh Indonesia via ekspedisi berpendingin</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-brand-800 py-4 px-4 text-center text-xs text-brand-100/60">
            &copy; {{ date('Y') }} PT Griya Beku Nusantara. Seluruh hak cipta dilindungi.
        </div>
    </footer>

</body>
</html>
