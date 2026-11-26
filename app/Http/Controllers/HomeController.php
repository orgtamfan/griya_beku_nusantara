<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the public home page.
     */
    public function index(): View
    {
        $featuredProducts = Product::with('category')
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('featuredProducts'));
    }
}
