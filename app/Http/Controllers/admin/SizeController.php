<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    // Will return Size
    public function index()
    {
        $sizes = Size::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'status' => 200,
            'data' => $sizes
        ]);
    }

    // Will return Store Size
//    public function store(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json([
//                'status' => 400,
//                'errors' => $validator->errors()
//            ], 400);
//        }
//
//        $size = new Size();
//        $size->name = $request->name;
//        $size->save();
//
//        return response()->json([
//            'status' => 200,
//            'message' => 'category added successfully',
//            'data' => $size
//        ], 200);
//    }

    // Will return Show Size
//    public function show($id)
//    {
//        $size = Size::find($id);
//
//        if ($size == null) {
//            return response()->json([
//                'status' => 404,
//                'message' => 'Size Not Found',
//            ], 404);
//        }
//        return response()->json([
//            'status' => 200,
//            'data' => $size
//        ]);
//    }

    // Will return Update Size
//    public function update($id,Request $request){
//
//        $size = Size::find($id);
//
//        if ($size == null) {
//            return response()->json([
//                'status' => 404,
//                'message' => 'Size Not Found',
//            ], 404);
//        }
//
//        $validator = Validator::make($request->all(), [
//            'name' => 'required'
//        ]);
//
//        if($validator->fails()) {
//            return response()->json([
//                'status' => 400,
//                'errors' => $validator->errors()
//            ], 400);
//        }
//
//
//        $size->name = $request->name;
//        $size->save();
//
//        return response()->json([
//            'status' => 200,
//            'message' => 'category Updated successfully',
//            'data' => $size
//        ], 200);
//    }

    // Will return remove Size
//    public  function  destroy($id){
//        $size = Size::find($id);
//
//        if ($size == null) {
//            return response()->json([
//                'status' => 404,
//                'message' => 'Size Not Found',
//            ], 404);
//        }
//
//        $size->delete();
//        return response()->json([
//            'status' => 200,
//            'message' => 'category Deleted successfully',
//        ], 200);
//    }
}
