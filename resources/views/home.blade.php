@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-brand-900 via-brand-700 to-brand-600 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" aria-hidden="true">
            <div class="absolute -top-10 -left-10 w-56 h-56 rounded-full bg-white"></div>
            <div class="absolute top-32 right-10 w-40 h-40 rounded-full bg-white"></div>
            <div class="absolute bottom-0 left-1/3 w-72 h-72 rounded-full bg-white"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center">
            <span class="inline-block bg-accent-500/90 text-brand-900 font-semibold text-xs sm:text-sm px-4 py-1.5 rounded-full mb-5">
                Frozen Food Rumahan &amp; Nusantara
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight max-w-3xl mx-auto">
                Lauk Beku Berkualitas, <span class="text-accent-400">Rasa Rumahan</span> Khas Nusantara
            </h1>
            <p class="mt-5 text-brand-100 text-sm sm:text-lg max-w-2xl mx-auto">
                PT Griya Beku Nusantara menghadirkan pempek, dimsum, nugget, rendang, dan otak-otak beku pilihan — higienis, tanpa bahan pengawet, siap saji kapan saja.
            </p>
            <div class="mt-8">
                <a href="{{ route('catalog.index') }}"
                   class="inline-flex items-center gap-2 bg-accent-500 hover:bg-accent-400 text-brand-900 font-bold px-7 py-3 rounded-xl shadow-lg transition">
                    Lihat Katalog Produk
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Tentang Kami --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-center">
            <div class="lg:col-span-3">
                <h2 class="text-2xl sm:text-3xl font-bold text-brand-900 mb-4">Tentang PT Griya Beku Nusantara</h2>
                <p class="text-slate-600 leading-relaxed mb-4">
                    Berawal dari dapur rumahan yang gemar mengolah makanan beku khas nusantara, <strong>PT Griya Beku Nusantara</strong>
                    kini berkembang menjadi UMKM produksi dan distribusi <em>frozen food</em> yang dipercaya oleh pelanggan rumah tangga
                    maupun pelaku usaha kuliner di berbagai daerah.
                </p>
                <p class="text-slate-600 leading-relaxed mb-6">
                    Setiap produk diolah dari bahan segar pilihan tanpa bahan pengawet, lalu melalui proses pembekuan cepat
                    (<em>blast freezing</em>) untuk menjaga tekstur, rasa, dan kandungan gizi tetap optimal hingga produk sampai di tangan Anda.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-brand-50 rounded-xl p-4 border border-brand-100">
                        <div class="text-brand-700 font-bold text-sm mb-1">✓ Higienis</div>
                        <p class="text-xs text-slate-500">Tanpa bahan pengawet buatan</p>
                    </div>
                    <div class="bg-brand-50 rounded-xl p-4 border border-brand-100">
                        <div class="text-brand-700 font-bold text-sm mb-1">✓ Blast Freezing</div>
                        <p class="text-xs text-slate-500">Pembekuan cepat, rasa terjaga</p>
                    </div>
                    <div class="bg-brand-50 rounded-xl p-4 border border-brand-100">
                        <div class="text-brand-700 font-bold text-sm mb-1">✓ Layanan Luas</div>
                        <p class="text-xs text-slate-500">Pengiriman ke seluruh Indonesia</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 flex justify-center">
                <div class="relative w-56 h-56 sm:w-72 sm:h-72 rounded-full bg-brand-50 border-4 border-brand-100 flex items-center justify-center p-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo rumah PT Griya Beku Nusantara" class="w-full h-full object-contain">
                </div>
            </div>
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <section class="bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex items-end justify-between mb-8 flex-wrap gap-4">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-brand-900">Produk Unggulan Terbaru</h2>
                    <p class="text-slate-500 text-sm mt-1">Cuplikan produk terbaru dari katalog kami</p>
                </div>
                <a href="{{ route('catalog.index') }}" class="text-brand-700 font-semibold text-sm hover:underline whitespace-nowrap">
                    Lihat semua &rarr;
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                @forelse ($featuredProducts as $product)
                    @include('partials.product-card', ['product' => $product])
                @empty
                    <p class="col-span-full text-slate-400 text-sm">Belum ada produk yang tersedia saat ini.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
