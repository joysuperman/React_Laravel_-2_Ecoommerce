<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class brandControllerler extends Controller
{
    // Will return Brand
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'status' => 200,
            'data' => $brands
        ]);
    }

    // Will return Store Brand
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->save();

        return response()->json([
            'status' => 200,
            'message' => 'Brand added successfully',
            'data' => $brand
        ], 200);
    }

    // Will return Show Brand
    public function show($id)
    {
        $brand = Brand::find($id);

        if ($brand == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Brand Not Found',
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'data' => $brand
        ]);
    }

    // Will return Update Brand
    public function update($id,Request $request){

        $brand = Brand::find($id);

        if ($brand == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Brand Not Found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }


        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->save();

        return response()->json([
            'status' => 200,
            'message' => 'Brand Updated successfully',
            'data' => $brand
        ], 200);
    }

    // Will return remove Brand
    public  function  destroy($id){
        $brand = Brand::find($id);

        if ($brand == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Brand Not Found',
            ], 404);
        }

        $brand->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Brand Deleted successfully',
        ], 200);
    }
}
