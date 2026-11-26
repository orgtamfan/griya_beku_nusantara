@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')

    <section class="border-b border-ivory-200 bg-ivory-100/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
            <p class="text-xs font-semibold uppercase tracking-[0.12em] text-[#636B73]">Daftar Produk</p>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-brand-900 mt-1">Katalog Produk</h1>
            <p class="text-[#525B63] text-sm sm:text-base mt-2 max-w-2xl">
                Pilih olahan beku rumahan dan khas nusantara sesuai kebutuhan dapur Anda.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        {{-- Filter kategori --}}
        <div class="flex gap-2 overflow-x-auto no-scrollbar pb-4 mb-6 border-b border-ivory-200 -mx-4 px-4 sm:mx-0 sm:px-0">
            <a href="{{ route('catalog.index') }}"
               class="flex-shrink-0 px-3.5 py-2 rounded-md text-xs sm:text-sm font-semibold border transition
                      {{ request('category') ? 'bg-white text-[#525B63] border-ivory-200 hover:border-brand-700/50' : 'bg-brand-800 text-white border-brand-800' }}">
                Semua
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('catalog.index', ['category' => $category->slug]) }}"
                   class="flex-shrink-0 px-3.5 py-2 rounded-md text-xs sm:text-sm font-semibold border transition
                          {{ request('category') === $category->slug ? 'bg-brand-800 text-white border-brand-800' : 'bg-white text-[#525B63] border-ivory-200 hover:border-brand-700/50' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        @if ($products->isEmpty())
            <div class="text-center py-16 bg-white border border-ivory-200 rounded-lg">
                <p class="text-[#636B73] text-sm">Tidak ada produk ditemukan untuk kategori ini.</p>
                <a href="{{ route('catalog.index') }}" class="inline-block mt-3 text-sm font-semibold text-brand-800 hover:underline">
                    Lihat semua produk
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($products as $product)
                    @include('partials.product-card', ['product' => $product])
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->links() }}
            </div>
        @endif
    </section>

@endsection
