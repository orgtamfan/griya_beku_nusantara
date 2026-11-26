@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')

    <section class="bg-brand-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 text-center">
            <h1 class="text-2xl sm:text-4xl font-extrabold">Katalog Produk</h1>
            <p class="text-brand-200 text-sm sm:text-base mt-2 max-w-xl mx-auto">
                Semua produk frozen food kami, dapat disaring berdasarkan kategori.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Filter kategori --}}
        <div class="flex gap-2 overflow-x-auto no-scrollbar pb-4 mb-6 -mx-4 px-4 sm:mx-0 sm:px-0">
            <a href="{{ route('catalog.index') }}"
               class="flex-shrink-0 px-4 py-2 rounded-full text-sm font-semibold border transition
                      {{ request('category') ? 'bg-white text-slate-600 border-slate-300 hover:border-brand-400' : 'bg-brand-700 text-white border-brand-700' }}">
                Semua
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('catalog.index', ['category' => $category->slug]) }}"
                   class="flex-shrink-0 px-4 py-2 rounded-full text-sm font-semibold border transition
                          {{ request('category') === $category->slug ? 'bg-brand-700 text-white border-brand-700' : 'bg-white text-slate-600 border-slate-300 hover:border-brand-400' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        @if ($products->isEmpty())
            <div class="text-center py-20">
                <p class="text-slate-400">Tidak ada produk ditemukan untuk kategori ini.</p>
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
