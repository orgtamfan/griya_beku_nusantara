@extends('layouts.app')

@section('title', 'Admin — Ubah Produk')

@section('content')

    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        <p class="text-xs font-semibold uppercase tracking-[0.12em] text-[#636B73]">Panel Admin</p>
        <h1 class="font-serif text-2xl sm:text-3xl font-bold text-brand-900 mt-1 mb-6">Ubah Produk</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-lg border border-ivory-200 p-5 sm:p-8">
            @csrf
            @method('PUT')

            @include('admin.products._form', ['categories' => $categories, 'product' => $product])

            <div class="flex items-center gap-4 mt-8 pt-5 border-t border-ivory-100">
                <button type="submit"
                        class="bg-brand-800 hover:bg-brand-900 text-white font-semibold text-sm px-6 py-2.5 rounded-lg transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-[#525B63] font-semibold text-sm hover:text-brand-800">
                    Batal
                </a>
            </div>
        </form>
    </section>

@endsection
