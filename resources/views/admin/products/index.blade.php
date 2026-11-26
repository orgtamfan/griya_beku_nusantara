@extends('layouts.app')

@section('title', 'Admin — Daftar Produk')

@section('content')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 pb-6 mb-6 border-b border-ivory-200">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.12em] text-terracotta-500">Panel Admin</p>
                <h1 class="font-serif text-2xl sm:text-3xl font-bold text-brand-900 mt-1">Manajemen Produk</h1>
            </div>
            <a href="{{ route('admin.products.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-brand-800 hover:bg-brand-900 text-white font-semibold text-sm px-4 py-2.5 rounded-lg transition">
                + Tambah Produk
            </a>
        </div>

        <div class="bg-white rounded-lg border border-ivory-200 overflow-x-auto">
            <table class="w-full text-sm min-w-[720px]">
                <thead class="bg-ice-50 text-brand-900 text-xs uppercase tracking-wider border-b border-ice-200">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold">Foto</th>
                        <th class="px-4 py-3 text-left font-semibold">Nama Produk</th>
                        <th class="px-4 py-3 text-left font-semibold">Kategori</th>
                        <th class="px-4 py-3 text-left font-semibold">Harga</th>
                        <th class="px-4 py-3 text-left font-semibold">Stok</th>
                        <th class="px-4 py-3 text-right font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-ivory-100">
                    @forelse ($products as $product)
                        <tr class="hover:bg-ivory-50/70">
                            <td class="px-4 py-3">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                     class="h-11 w-11 object-cover rounded border border-ivory-200">
                            </td>
                            <td class="px-4 py-3 font-medium text-brand-900 max-w-[240px] truncate">{{ $product->name }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block bg-ice-50 text-ice-700 border border-ice-200 text-xs font-medium px-2 py-0.5 rounded">
                                    {{ $product->category->name }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-terracotta-600 font-semibold tabular-nums">{{ $product->formatted_price }}</td>
                            <td class="px-4 py-3 tabular-nums">
                                <span class="px-2 py-0.5 rounded text-xs font-semibold {{ $product->in_stock ? 'bg-emerald-50 text-emerald-700' : 'bg-terracotta-50 text-terracotta-600' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="text-xs font-semibold text-ice-700 hover:underline">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                          onsubmit="return confirm('Hapus produk &quot;{{ $product->name }}&quot;? Tindakan ini tidak dapat dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-semibold text-terracotta-600 hover:underline">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-[#636B73]">
                                Belum ada produk. Klik "Tambah Produk" untuk menambahkan data pertama.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </section>

@endsection
