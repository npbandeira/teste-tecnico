<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Product::all();
        return response()->json($produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|numeric|min:0.01',
            'quantidade' => 'required|integer|min:0',
        ]);
        $produto = Product::create($validated);
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $produto)
    {
        return response()->json($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $produto)
    {
        $validated = $request->validate([
            'nome' => 'sometimes|required|string',
            'preco' => 'sometimes|required|numeric|min:0.01',
            'quantidade' => 'sometimes|required|integer|min:0',
        ]);
        $produto->update($validated);
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produto)
    {
        $produto->delete();
        return response()->json(['mensagem' => 'Produto excluído com sucesso.']);
    }
}
