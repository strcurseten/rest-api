<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{


    public function getAllProducts()
    {
        $products = Product::all();

        return response()->json([
            'data' => $products,
            'total' => $products->count()
        ]);
    }

    public function product($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json([
                'error' => 'Product not found'
            ]);
        }

        return response()->json([
            'data' => $product
        ]);
    }

    public function search($keyword)
    {
        $product = Product::find($keyword);
        if (is_null($product)) {
            return response()->json([
                'error' => 'Product not found'
            ]);
        }

        return response()->json([
            'data' => $product
        ]);
    }

    public function categories()
    {
        $categories = Product::distinct('category')
            ->select('category')
            ->get();
        
        return response()->json([
            'data' => $categories
        ]);
    }



    public function products (Request $request) {

        try {

            $data = $request->json()->all();
            $product = new Product();
            $product->title = $data['title'];
            $product->description = $data['description'];
            $product->currency = $data['currency'];
            $product->price = $data['price'];
            $product->brand = $data['brand'];
            $product->category = $data['category'];
            $product->image = $data['image'];
            $product->save();

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Unable to save product'
            ]);
        }
        
        return response()->json([
            'data' => $product
        ]);

    }
}
