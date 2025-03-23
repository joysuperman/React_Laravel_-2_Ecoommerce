<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    // Will return Category
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'status' => 200,
            'data' => $categories
        ]);
    }

    // Will return Store Category
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

        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return response()->json([
            'status' => 200,
            'message' => 'category added successfully',
            'data' => $category
        ], 200);
    }

    // Will return Show Category
    public function show($id)
    {
        $category = Category::find($id);

        if ($category == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Category Not Found',
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'data' => $category
        ]);
    }

    // Will return Update Category
    public function update($id,Request $request){

        $category = Category::find($id);

        if ($category == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Category Not Found',
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


        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return response()->json([
            'status' => 200,
            'message' => 'category Updated successfully',
            'data' => $category
        ], 200);
    }

    // Will return remove Category
    public  function  destroy($id){
        $category = Category::find($id);

        if ($category == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Category Not Found',
            ], 404);
        }

        $category->delete();
        return response()->json([
            'status' => 200,
            'message' => 'category Deleted successfully',
        ], 200);
    }
}
