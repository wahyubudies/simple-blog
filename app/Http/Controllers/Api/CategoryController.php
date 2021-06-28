<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{public function index()
    {
        $categories =Category::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Category',
            'data'    => $categories
        ]);
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'category_name' => 'required'
        ]);
        try{
            $category =Category::create([
                'category_name' => $req->category_name,
                'category_slug' => Str::slug($req->category_name)
            ]); 
        }catch( \Exception $e){
            return response()->json([
                'success'       => false,
                'status code'   => 409,
                'message'       => $e->getMessage()
            ], 409);
        }
        return response()->json([
            'success'       => true,
            'message'       => 'Category Created!',
            'status code'   => 200,
            'data'          => $category
        ]);
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'category_name' => 'required'
        ]);
        try{
            $category =Category::findOrFail($id);
            $category->update([
                'category_name' => $req->category_name,
                'category_slug' => Str::slug($req->category_name)
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success'       => false,
                'status code'   => 409,
                'message'       => $e->getMessage()
            ], 409);
        }
        return response()->json([
            'success'       => true,
            'message'       => 'Category Updated!',
            'status code'   => 200,
            'data'          => $category
        ]);
    }
    public function destroy($id)
    {
        try{
            $category =Category::findOrFail($id);
            $category->delete();
        }catch(\Exception $e){
            return response()->json([
                'success'       => false,
                'status code'   => 409,
                'message'       => $e->getMessage()
            ], 409);
        }
        return response()->json([
            'success'       => true,
            'message'       => 'CaCategory Deleted!',
            'status code'   => 200,
            'data'          => $category
        ]);
    }//
}
