@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        <nav class="text-xs sm:text-sm text-[#636B73] mb-6 flex items-center gap-2 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-brand-800">Beranda</a>
            <span>/</span>
            <a href="{{ route('catalog.index') }}" class="hover:text-brand-800">Katalog</a>
            <span>/</span>
            <span class="text-[#1B1F23] font-medium truncate">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

            <div class="lg:col-span-6 bg-white border border-ivory-200 rounded-lg p-2">
                <div class="bg-ivory-100 rounded overflow-hidden aspect-[4/3] lg:aspect-square">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="lg:col-span-6">
                <p class="text-xs font-semibold uppercase tracking-[0.12em] text-[#636B73]">
                    {{ $product->category->name }}
                </p>

                <h1 class="font-serif text-2xl sm:text-3xl font-bold text-brand-900 mt-1.5">{{ $product->name }}</h1>

                <p class="text-2xl sm:text-3xl font-bold text-terracotta-600 mt-3 pb-5 border-b border-ivory-200 tabular-nums">
                    {{ $product->formatted_price }}
                </p>

                <dl class="grid grid-cols-2 divide-x divide-ivory-200 border border-ivory-200 bg-white rounded-lg my-6 text-sm">
                    <div class="p-3.5">
                        <dt class="text-[#636B73] text-xs uppercase tracking-wider">Berat Bersih</dt>
                        <dd class="font-semibold text-[#1B1F23] mt-1 tabular-nums">{{ $product->weight_gram }} gram</dd>
                    </div>
                    <div class="p-3.5">
                        <dt class="text-[#636B73] text-xs uppercase tracking-wider">Ketersediaan</dt>
                        <dd class="font-semibold mt-1 tabular-nums {{ $product->in_stock ? 'text-[#1F6E43]' : 'text-red-600' }}">
                            {{ $product->in_stock ? $product->stock.' pack tersedia' : 'Stok habis' }}
                        </dd>
                    </div>
                </dl>

                <div class="mb-8">
                    <h2 class="font-semibold text-[#1B1F23] mb-2 text-xs uppercase tracking-wider">Deskripsi &amp; Komposisi</h2>
                    <p class="text-[#525B63] leading-relaxed whitespace-pre-line text-sm sm:text-base">{{ $product->description }}</p>
                </div>

                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener"
                   class="inline-flex w-full sm:w-auto items-center justify-center gap-2.5 bg-[#1F6E43] hover:bg-[#185835] text-white font-semibold text-sm px-6 py-3.5 rounded-lg transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-current">
                        <path d="M17.6 6.3A8.9 8.9 0 0 0 12.04 3.5a8.95 8.95 0 0 0-7.75 13.4L3 21l4.26-1.12a8.93 8.93 0 0 0 4.78 1.38h.004a8.95 8.95 0 0 0 8.95-8.95 8.9 8.9 0 0 0-2.6-6.01Zm-5.56 13.76h-.003a7.44 7.44 0 0 1-3.79-1.04l-.27-.16-2.82.74.76-2.75-.18-.28a7.45 7.45 0 0 1 11.63-9.27 7.4 7.4 0 0 1 2.18 5.26 7.45 7.45 0 0 1-7.5 7.5Zm4.1-5.58c-.22-.11-1.32-.65-1.52-.73-.2-.08-.36-.11-.5.11-.15.22-.58.73-.72.88-.13.15-.26.17-.49.06-.22-.11-.95-.35-1.82-1.12-.67-.6-1.13-1.33-1.26-1.56-.13-.22-.01-.34.1-.45.1-.1.22-.26.33-.39.11-.13.15-.22.22-.37.07-.15.04-.28-.02-.39-.07-.11-.5-1.2-.68-1.64-.18-.43-.36-.37-.5-.38h-.43c-.15 0-.39.06-.6.28s-.78.76-.78 1.86.8 2.16.91 2.31c.11.15 1.56 2.39 3.79 3.35.53.23.94.36 1.26.47.53.17 1.01.14 1.39.09.42-.06 1.32-.54 1.51-1.06.18-.52.18-.97.13-1.06-.05-.1-.2-.15-.42-.26Z"/>
                    </svg>
                    Pesan via WhatsApp
                </a>
            </div>
        </div>
    </section>

@endsection
