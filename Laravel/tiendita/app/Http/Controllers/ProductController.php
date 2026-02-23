<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * Obtiene todas las categorías para el menú desplegable
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products.index', compact('categories', 'products'));
    }

    /**
     * Display all products in a table.
     */
    public function show()
    {
        $products = Product::all();
        return view('products.show', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Product::create($request->all());

        return redirect()->route('products.show')->with('success', 'Producto guardado correctamente');
    }
}
