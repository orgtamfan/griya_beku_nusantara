@extends('layouts.app')

@section('title', 'Admin — Tambah Produk')

@section('content')

    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <span class="inline-block bg-slate-800 text-white text-xs font-semibold px-2.5 py-1 rounded mb-2">ADMIN</span>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-brand-900 mb-6">Tambah Produk Baru</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 sm:p-8">
            @csrf

            @include('admin.products._form', ['categories' => $categories])

            <div class="flex items-center gap-3 mt-8">
                <button type="submit"
                        class="bg-brand-700 hover:bg-brand-800 text-white font-bold px-6 py-2.5 rounded-xl shadow transition">
                    Simpan Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-slate-500 font-semibold text-sm hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </section>

@endsection
