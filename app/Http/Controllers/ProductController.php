<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display the public product catalog, with an optional category filter.
     */
    public function index(Request $request): View
    {
        $categories = Category::orderBy('name')->get();

        $query = Product::with('category')->latest();

        if ($request->filled('category') && $categories->contains('slug', $request->string('category'))) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->string('category'));
            });
        }

        $products = $query->paginate(9)->withQueryString();

        return view('catalog.index', compact('products', 'categories'));
    }

    /**
     * Display a single product's full detail.
     */
    public function show(Product $product): View
    {
        $product->load('category');

        $whatsappNumber = config('services.whatsapp.number');
        $whatsappMessage = rawurlencode("Halo, saya tertarik untuk memesan {$product->name} dari PT Griya Beku Nusantara.");
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$whatsappMessage}";

        return view('catalog.show', compact('product', 'whatsappUrl'));
    }
}
