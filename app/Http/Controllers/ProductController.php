<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAllProducts();
        $categories = Product::getCategories();
        $currentCategory = null; // Définir comme null pour la page "Tous les produits"
        
        return view('pages.products', compact('products', 'categories', 'currentCategory'));
    }
    
    public function byCategory($category)
    {
        $products = Product::getProductsByCategory($category);
        $categories = Product::getCategories();
        $currentCategory = $categories[$category] ?? null;
        
        return view('pages.products', compact('products', 'categories', 'currentCategory'));
    }
}