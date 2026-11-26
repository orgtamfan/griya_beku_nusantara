{{-- Expects: $categories, optional $product (edit mode) --}}
@php $editing = isset($product); @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

    <div class="sm:col-span-2">
        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Nama Produk</label>
        <input type="text" name="name" id="name" maxlength="150"
               value="{{ old('name', $editing ? $product->name : '') }}"
               class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700"
               placeholder="Contoh: Pempek Lenjer & Kapal Selam Beku">
        @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="category_id" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Kategori</label>
        <select name="category_id" id="category_id"
                class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm bg-white focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected((int) old('category_id', $editing ? $product->category_id : '') === $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Harga (Rp)</label>
        <input type="number" name="price" id="price" min="1000" step="1"
               value="{{ old('price', $editing ? (int) $product->price : '') }}"
               class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm tabular-nums focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700"
               placeholder="45000">
        @error('price') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="weight_gram" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Berat Bersih (gram)</label>
        <input type="number" name="weight_gram" id="weight_gram" min="50" step="1"
               value="{{ old('weight_gram', $editing ? $product->weight_gram : '') }}"
               class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm tabular-nums focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700"
               placeholder="500">
        @error('weight_gram') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="stock" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Stok</label>
        <input type="number" name="stock" id="stock" min="0" step="1"
               value="{{ old('stock', $editing ? $product->stock : '') }}"
               class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm tabular-nums focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700"
               placeholder="40">
        @error('stock') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Deskripsi (Komposisi &amp; Saran Penyajian)</label>
        <textarea name="description" id="description" rows="5" maxlength="2000"
                  class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700"
                  placeholder="Komposisi bahan dan saran penyajian...">{{ old('description', $editing ? $product->description : '') }}</textarea>
        @error('description') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">
            Foto Produk @unless($editing) <span class="text-red-600">*</span> @endunless
        </label>

        @if ($editing && $product->image)
            <div class="mb-2.5 flex items-center gap-3">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover rounded border border-ivory-200">
                <span class="text-xs text-[#636B73]">Foto saat ini. Unggah file baru untuk menggantinya.</span>
            </div>
        @endif

        <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png,.webp"
               class="w-full text-sm rounded-md border border-ivory-200 p-1.5 file:mr-4 file:py-1.5 file:px-3.5 file:rounded file:border-0 file:bg-ivory-100 file:text-brand-800 file:font-semibold file:text-xs">
        <p class="text-xs text-[#636B73] mt-1">Format jpg, jpeg, png, atau webp. Maksimal 2MB.</p>
        @error('image') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

</div>
