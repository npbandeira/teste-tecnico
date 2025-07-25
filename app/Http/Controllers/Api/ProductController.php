<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Product::simplePaginate();
        return ProductResource::collection($produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $produto = Product::create($request->validated());
        return new ProductResource($produto);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $produto)
    {
        return new ProductResource($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $produto)
    {
        $produto->update($request->validated());
        return new ProductResource($produto);
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
