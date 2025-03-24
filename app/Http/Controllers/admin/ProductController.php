<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Will return Products
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'status' => 200,
            'data' => $products
        ]);
    }

    // Will return Store Product
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required | numeric',
            'category' => 'required | integer',
            'sku' => 'required | unique:products,sku',
            'featured' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->status = $request->status;
        $product->barcode = $request->barcode;
        $product->is_featured = $request->featured;
        $product->save();

        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully',
            'data' => $product
        ], 200);
    }

    // Will return Show Product
    public function show($id)
    {
        $product = Product::find($id);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found',
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'data' => $product
        ]);
    }

    // Will return Update Product
    public function update($id,Request $request){

        $product = Product::find($id);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required | numeric',
            'category' => 'required | integer',
            'sku' => 'required | unique:products,sku',
            'featured' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }


        $product->title = $request->title;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->status = $request->status;
        $product->barcode = $request->barcode;
        $product->is_featured = $request->featured;
        $product->save();

        return response()->json([
            'status' => 200,
            'message' => 'Product Updated successfully',
            'data' => $product
        ], 200);
    }

    // Will return remove Product
    public  function  destroy($id){
        $product = Product::find($id);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found',
            ], 404);
        }

        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => 'category Deleted successfully',
        ], 200);
    }
}
