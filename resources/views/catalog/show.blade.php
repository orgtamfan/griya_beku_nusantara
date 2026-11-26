@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <nav class="text-xs sm:text-sm text-slate-500 mb-6 flex items-center gap-2 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-brand-700">Beranda</a>
            <span>/</span>
            <a href="{{ route('catalog.index') }}" class="hover:text-brand-700">Katalog</a>
            <span>/</span>
            <span class="text-slate-700 font-medium truncate">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

            <div class="bg-slate-100 rounded-2xl overflow-hidden aspect-[4/3] lg:aspect-square">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>

            <div>
                <span class="inline-block bg-brand-50 text-brand-700 text-xs font-semibold px-3 py-1 rounded-full border border-brand-100">
                    {{ $product->category->name }}
                </span>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-brand-900 mt-3 mb-2">{{ $product->name }}</h1>

                <p class="text-2xl sm:text-3xl font-bold text-accent-500 mb-4">{{ $product->formatted_price }}</p>

                <dl class="grid grid-cols-2 gap-4 mb-6 text-sm">
                    <div class="bg-slate-50 rounded-lg p-3 border border-slate-200">
                        <dt class="text-slate-400 text-xs">Berat Bersih</dt>
                        <dd class="font-semibold text-slate-700">{{ $product->weight_gram }} gram</dd>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 border border-slate-200">
                        <dt class="text-slate-400 text-xs">Sisa Stok</dt>
                        <dd class="font-semibold {{ $product->in_stock ? 'text-emerald-600' : 'text-red-500' }}">
                            {{ $product->in_stock ? $product->stock.' tersedia' : 'Stok habis' }}
                        </dd>
                    </div>
                </dl>

                <div class="mb-8">
                    <h2 class="font-semibold text-slate-700 mb-2 text-sm uppercase tracking-wide">Deskripsi & Komposisi</h2>
                    <p class="text-slate-600 leading-relaxed whitespace-pre-line">{{ $product->description }}</p>
                </div>

                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener"
                   class="inline-flex w-full sm:w-auto items-center justify-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-6 py-3 rounded-xl shadow-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-current">
                        <path d="M17.6 6.3A8.9 8.9 0 0 0 12.04 3.5a8.95 8.95 0 0 0-7.75 13.4L3 21l4.26-1.12a8.93 8.93 0 0 0 4.78 1.38h.004a8.95 8.95 0 0 0 8.95-8.95 8.9 8.9 0 0 0-2.6-6.01Zm-5.56 13.76h-.003a7.44 7.44 0 0 1-3.79-1.04l-.27-.16-2.82.74.76-2.75-.18-.28a7.45 7.45 0 0 1 11.63-9.27 7.4 7.4 0 0 1 2.18 5.26 7.45 7.45 0 0 1-7.5 7.5Zm4.1-5.58c-.22-.11-1.32-.65-1.52-.73-.2-.08-.36-.11-.5.11-.15.22-.58.73-.72.88-.13.15-.26.17-.49.06-.22-.11-.95-.35-1.82-1.12-.67-.6-1.13-1.33-1.26-1.56-.13-.22-.01-.34.1-.45.1-.1.22-.26.33-.39.11-.13.15-.22.22-.37.07-.15.04-.28-.02-.39-.07-.11-.5-1.2-.68-1.64-.18-.43-.36-.37-.5-.38h-.43c-.15 0-.39.06-.6.28s-.78.76-.78 1.86.8 2.16.91 2.31c.11.15 1.56 2.39 3.79 3.35.53.23.94.36 1.26.47.53.17 1.01.14 1.39.09.42-.06 1.32-.54 1.51-1.06.18-.52.18-.97.13-1.06-.05-.1-.2-.15-.42-.26Z"/>
                    </svg>
                    Pesan via WhatsApp
                </a>
            </div>
        </div>
    </section>

@endsection
