<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Http\Resources\Json\ResourceResponse;

class ProductController extends Controller
{
    public function index(){

    $products = Product::orderBy('name')->get();
    return ProductResource::collection($products);

    }

    public function show(Product $product){
        return new ProductResource($product);
    }

    public function store(Request $request){

        $data = $request->validate([
            'name' => 'required|min:10|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories'
        ]);

        $data = request()->all();
        $product = Product::create($data);
       return new ProductResource($product);
    }

    public function update(Product $product){

        $data = request()->validate([
            'name' => 'required|min:10|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories'
        ]);

        $data = request()->all();
        $product->update($data);

       return new ProductResource($product);
    }

    public function destroy(Product $product){
        $product->delete();

        return response()->noContent();
    }
}
