@extends('layouts.app')

@section('title', 'Admin — Daftar Produk')

@section('content')

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <span class="inline-block bg-slate-800 text-white text-xs font-semibold px-2.5 py-1 rounded mb-2">ADMIN</span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-brand-900">Manajemen Produk</h1>
            </div>
            <a href="{{ route('admin.products.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-brand-700 hover:bg-brand-800 text-white font-bold px-5 py-2.5 rounded-xl shadow transition">
                + Tambah Produk
            </a>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-x-auto">
            <table class="w-full text-sm min-w-[720px]">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
                    <tr>
                        <th class="px-4 py-3 text-left">Foto</th>
                        <th class="px-4 py-3 text-left">Nama Produk</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Harga</th>
                        <th class="px-4 py-3 text-left">Stok</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($products as $product)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                     class="h-12 w-12 object-cover rounded-lg border border-slate-200">
                            </td>
                            <td class="px-4 py-3 font-medium text-slate-700 max-w-[220px] truncate">{{ $product->name }}</td>
                            <td class="px-4 py-3 text-slate-500">{{ $product->category->name }}</td>
                            <td class="px-4 py-3 text-slate-700 font-semibold">{{ $product->formatted_price }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold {{ $product->in_stock ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-500' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="text-xs font-semibold text-brand-700 hover:underline px-2 py-1">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                          onsubmit="return confirm('Hapus produk &quot;{{ $product->name }}&quot;? Tindakan ini tidak dapat dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-semibold text-red-500 hover:underline px-2 py-1">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-10 text-center text-slate-400">
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
