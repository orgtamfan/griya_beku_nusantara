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
                        brand: {
                            50: '#eef6fc',
                            100: '#d7eaf8',
                            200: '#aed4f1',
                            600: '#1e5a8f',
                            700: '#17456e',
                            800: '#0e344f',
                            900: '#0a2439',
                        },
                        accent: {
                            400: '#54d2e6',
                            500: '#28b9d2',
                        },
                    },
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <style>
        body { font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    @stack('head')
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">

    <header class="bg-brand-900 text-white sticky top-0 z-40 shadow-md">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3 min-w-0">
                    <span class="h-10 w-10 sm:h-12 sm:w-12 flex-shrink-0 rounded-xl bg-white p-1 shadow-sm">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo rumah PT Griya Beku Nusantara" class="h-full w-full object-contain">
                    </span>
                    <span class="leading-tight min-w-0">
                        <span class="block font-bold text-sm sm:text-lg tracking-tight truncate">PT Griya Beku Nusantara</span>
                        <span class="hidden sm:block text-brand-200 text-xs font-medium">Frozen Food Rumahan & Nusantara</span>
                    </span>
                </a>

                <div class="flex items-center gap-1 sm:gap-2 text-sm font-medium">
                    <a href="{{ route('home') }}"
                       class="px-3 py-2 rounded-lg hover:bg-brand-800 transition {{ request()->routeIs('home') ? 'bg-brand-800 text-accent-400' : 'text-white' }}">
                        Beranda
                    </a>
                    <a href="{{ route('catalog.index') }}"
                       class="px-3 py-2 rounded-lg hover:bg-brand-800 transition {{ request()->routeIs('catalog.*') ? 'bg-brand-800 text-accent-400' : 'text-white' }}">
                        Katalog
                    </a>

                    @auth
                        <a href="{{ route('admin.products.index') }}"
                           class="hidden sm:inline-block px-3 py-2 rounded-lg hover:bg-brand-800 transition {{ request()->routeIs('admin.products.*') ? 'bg-brand-800 text-accent-400' : 'text-white' }}">
                            Admin
                        </a>
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 rounded-lg hover:bg-brand-800 transition text-white">
                                Keluar
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main>
        @if (session('status'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 text-sm font-medium">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-brand-900 text-brand-100 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <span class="h-12 w-12 flex-shrink-0 rounded-xl bg-white p-1 shadow-sm">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo rumah PT Griya Beku Nusantara" class="h-full w-full object-contain">
                    </span>
                    <span class="font-bold text-white">PT Griya Beku Nusantara</span>
                </div>
                <p class="text-sm text-brand-200 leading-relaxed">
                    Produsen & distributor frozen food rumahan dan nusantara — higienis, tanpa bahan pengawet, dibekukan cepat untuk menjaga kesegaran.
                </p>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-3 text-sm uppercase tracking-wide">Navigasi</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('catalog.index') }}" class="hover:text-white transition">Katalog Produk</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-3 text-sm uppercase tracking-wide">Kontak</h3>
                <ul class="space-y-2 text-sm text-brand-200">
                    <li>WhatsApp Admin: +{{ config('services.whatsapp.number') }}</li>
                    <li>Area Layanan: Seluruh Indonesia (via ekspedisi dengan pendingin)</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-brand-800 py-4 text-center text-xs text-brand-300">
            &copy; {{ date('Y') }} PT Griya Beku Nusantara. Seluruh hak cipta dilindungi.
        </div>
    </footer>

</body>
</html>
