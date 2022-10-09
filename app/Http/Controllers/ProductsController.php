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
        $product = Product::where('title', 'like', '%'.$keyword.'%')->get();
        if (is_null($product)) {
            return response()->json([
                'error' => 'Sorry. No results found for this product.'
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
            'info' => $categories
        ]);
    }

    public function searchByCategory($category)
    {
        $product = Product::where('category', $category)->get();
       

        return response()->json([
            'data' => $product,
            'total' => $product->count()
        ]);
    }

    public function addProduct (Request $request) 
    {

        try {

            $data = $request->json()->all();
            $item = new Product();
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->currency = $data['currency'];
            $item->price = $data['price'];
            $item->brand = $data['brand'];
            $item->category = $data['category'];
            $item->image = $data['image'];
            $item->save();

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Unable to add product'
            ]);
        }
        
        return response()->json([
            'data' => $item
        ]);

    }

    public function updateProduct(Request $request, $id)
    {
        try {
            $data = $request->json()->all();
            $item = Product::find($id);
            if (!is_null($item)) {
                $item->title = $data['title'];
                $item->description = $data['description'];
                $item->currency = $data['currency'];
                $item->price = $data['price'];
                $item->brand = $data['brand'];
                $item->category = $data['category'];
                $item->image = $data['image'];
                $item->save();
            } else {
                throw new Exception('Product not found!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'error' => 'Sorry. Unable to update product details.'
            ]);
        }
        
        return response()->json([
            'data' => $item
        ]);
    }

    public function deleteProduct(Request $request, $id)
    {
        $item = Product::find($id);
        $item->delete();
        return response()->json(['message'=>'Product has been deleted successfully'], 200);

    }

}
