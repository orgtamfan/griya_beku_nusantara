{{-- Expects: $product --}}
<a href="{{ route('catalog.show', $product) }}"
   class="group bg-white rounded-lg border border-ivory-200 overflow-hidden hover:border-brand-700/50 transition-colors flex flex-col">
    <div class="aspect-[4/3] bg-ivory-100 overflow-hidden relative">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
             class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-300">
        @unless ($product->in_stock)
            <span class="absolute inset-0 bg-[#1B1F23]/60 flex items-center justify-center text-white text-xs font-semibold tracking-wide uppercase">
                Stok Habis
            </span>
        @endunless
    </div>
    <div class="p-3.5 sm:p-4 flex-1 flex flex-col justify-between">
        <div>
            <p class="text-[11px] font-medium uppercase tracking-wider text-[#636B73]">
                {{ $product->category->name }}
            </p>
            <h3 class="font-semibold text-[#1B1F23] text-sm sm:text-[15px] leading-snug line-clamp-2 mt-1 group-hover:text-brand-800 transition-colors">
                {{ $product->name }}
            </h3>
        </div>
        <div class="mt-3 pt-2.5 border-t border-ivory-100 flex items-baseline justify-between gap-2">
            <span class="text-terracotta-600 font-bold text-sm sm:text-base tabular-nums">{{ $product->formatted_price }}</span>
            <span class="text-[11px] text-[#636B73] tabular-nums">{{ $product->weight_gram }} g</span>
        </div>
    </div>
</a>
