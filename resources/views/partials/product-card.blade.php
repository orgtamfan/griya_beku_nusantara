{{-- Expects: $product --}}
<a href="{{ route('catalog.show', $product) }}"
   class="group bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
    <div class="aspect-[4/3] bg-slate-100 overflow-hidden relative">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        <span class="absolute top-2 left-2 bg-brand-900/90 text-white text-[10px] sm:text-xs font-semibold px-2 py-1 rounded-full">
            {{ $product->category->name }}
        </span>
        @unless ($product->in_stock)
            <span class="absolute inset-0 bg-black/50 flex items-center justify-center text-white text-xs font-bold">
                Stok Habis
            </span>
        @endunless
    </div>
    <div class="p-3 sm:p-4">
        <h3 class="font-semibold text-slate-800 text-sm sm:text-base leading-snug line-clamp-2">
            {{ $product->name }}
        </h3>
        <p class="text-xs text-slate-400 mt-1">{{ $product->weight_gram }} gram</p>
        <p class="text-brand-700 font-bold mt-2 text-sm sm:text-base">{{ $product->formatted_price }}</p>
    </div>
</a>
