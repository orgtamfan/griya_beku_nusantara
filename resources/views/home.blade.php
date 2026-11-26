@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    {{-- Hero: Split Editorial --}}
    <section class="border-b border-ivory-200 bg-ivory-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
                <div class="lg:col-span-7">
                    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-terracotta-500 mb-4">
                        Dapur Nusantara &middot; Beku Cepat &minus;18&deg;C
                    </p>
                    <h1 class="font-serif text-3xl sm:text-5xl font-bold text-brand-900 tracking-tight leading-[1.12]">
                        Lauk Rumahan Nusantara, Siap Saji dari Freezer.
                    </h1>
                    <p class="mt-5 text-[#525B63] text-base sm:text-lg leading-relaxed max-w-xl">
                        Pempek, dimsum, nugget ayam kampung, rendang vakum, hingga otak-otak ikan. Diolah tanpa pengawet dengan bumbu dapur asli dan dibekukan cepat.
                    </p>

                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a href="{{ route('catalog.index') }}"
                           class="inline-flex items-center gap-2 bg-brand-800 hover:bg-brand-900 text-white font-semibold text-sm px-6 py-3 rounded-lg transition">
                            Jelajahi Katalog
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#tentang"
                           class="inline-flex items-center text-sm font-semibold text-brand-800 hover:text-brand-900 px-4 py-3 rounded-lg border border-ivory-200 bg-white hover:bg-ivory-100 transition">
                            Tentang Dapur Kami
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    @if ($featuredProducts->isNotEmpty())
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">
                            @foreach ($featuredProducts->take(2) as $heroProduct)
                                <a href="{{ route('catalog.show', $heroProduct) }}"
                                   class="group bg-white border border-ivory-200 rounded-lg overflow-hidden hover:border-brand-700/50 transition-colors {{ $loop->last ? 'sm:translate-y-4' : '' }}">
                                    <div class="aspect-[4/3] bg-ivory-100 overflow-hidden">
                                        <img src="{{ $heroProduct->image_url }}" alt="{{ $heroProduct->name }}"
                                             class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-300">
                                    </div>
                                    <div class="p-3">
                                        <p class="text-[11px] uppercase tracking-wider text-[#636B73] truncate">{{ $heroProduct->category->name }}</p>
                                        <p class="font-semibold text-xs sm:text-sm text-[#1B1F23] truncate mt-0.5">{{ $heroProduct->name }}</p>
                                        <p class="text-terracotta-600 font-bold text-xs sm:text-sm mt-1 tabular-nums">{{ $heroProduct->formatted_price }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white border border-ivory-200 rounded-lg p-10 flex items-center justify-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo PT Griya Beku Nusantara" class="w-40 h-40 object-contain">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Standar Produksi: Strip Spesifikasi --}}
    <section class="border-b border-ivory-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-ivory-200">
                <div class="py-6 md:pr-8">
                    <span class="text-xs font-mono text-terracotta-500 font-semibold">01</span>
                    <h2 class="font-semibold text-[#1B1F23] mt-1">Tanpa Bahan Pengawet</h2>
                    <p class="text-sm text-[#525B63] mt-1">Menggunakan bahan segar pilihan dengan bumbu dapur alami, aman untuk konsumsi harian keluarga.</p>
                </div>
                <div class="py-6 md:px-8">
                    <span class="text-xs font-mono text-terracotta-500 font-semibold">02</span>
                    <h2 class="font-semibold text-[#1B1F23] mt-1">Pembekuan Cepat (Blast Freezing)</h2>
                    <p class="text-sm text-[#525B63] mt-1">Tekstur, aroma, dan rasa masakan tetap terjaga hingga siap dihangatkan di rumah.</p>
                </div>
                <div class="py-6 md:pl-8">
                    <span class="text-xs font-mono text-terracotta-500 font-semibold">03</span>
                    <h2 class="font-semibold text-[#1B1F23] mt-1">Kemasan Vakum &amp; Ekspedisi Dingin</h2>
                    <p class="text-sm text-[#525B63] mt-1">Dikemas rapat dan dikirim dengan penanganan rantai dingin ke seluruh Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-16">
        <div class="flex items-end justify-between mb-8 pb-4 border-b border-ivory-200 flex-wrap gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.12em] text-[#636B73]">Pilihan Dapur</p>
                <h2 class="font-serif text-2xl sm:text-3xl font-bold text-brand-900 mt-1">Produk Unggulan Terbaru</h2>
            </div>
            <a href="{{ route('catalog.index') }}" class="text-brand-800 font-semibold text-sm hover:text-terracotta-600 transition whitespace-nowrap">
                Lihat semua produk &rarr;
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @forelse ($featuredProducts as $product)
                @include('partials.product-card', ['product' => $product])
            @empty
                <p class="col-span-full text-[#636B73] text-sm">Belum ada produk yang tersedia saat ini.</p>
            @endforelse
        </div>
    </section>

    {{-- Tentang Kami --}}
    <section id="tentang" class="border-t border-ivory-200 bg-ivory-100/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <div class="lg:col-span-4 bg-white border border-ivory-200 rounded-lg p-6 flex flex-col items-start gap-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PT Griya Beku Nusantara" class="h-16 w-16 object-contain">
                    <div class="w-full pt-4 border-t border-ivory-200 space-y-2.5 text-sm">
                        <div class="flex justify-between gap-4">
                            <span class="text-[#636B73]">Perusahaan</span>
                            <span class="font-semibold text-[#1B1F23] text-right">PT Griya Beku Nusantara</span>
                        </div>
                        <div class="flex justify-between gap-4">
                            <span class="text-[#636B73]">Suhu Simpan</span>
                            <span class="font-semibold text-[#1B1F23] tabular-nums">&minus;18&deg;C (Freezer)</span>
                        </div>
                        <div class="flex justify-between gap-4">
                            <span class="text-[#636B73]">Pemesanan</span>
                            <span class="font-semibold text-[#1B1F23]">Eceran &amp; Reseller</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <p class="text-xs font-semibold uppercase tracking-[0.12em] text-[#636B73]">Tentang Kami</p>
                    <h2 class="font-serif text-2xl sm:text-3xl font-bold text-brand-900 mt-1 mb-4">
                        Dari Dapur Rumahan ke Meja Makan Nusantara
                    </h2>
                    <div class="space-y-4 text-[#525B63] leading-relaxed">
                        <p>
                            Berawal dari dapur rumahan yang mengolah makanan beku khas nusantara, <strong class="text-[#1B1F23]">PT Griya Beku Nusantara</strong>
                            tumbuh menjadi produsen dan distributor <em>frozen food</em> yang dipercaya pelanggan rumah tangga maupun pelaku usaha kuliner di berbagai daerah.
                        </p>
                        <p>
                            Setiap batch produksi dikerjakan secara higienis dari bahan baku segar tanpa tambahan pengawet kimia, lalu dikemas kedap udara dan dibekukan cepat agar cita rasa aslinya tetap utuh saat Anda sajikan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
