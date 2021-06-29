<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Tag',
            'data'    => $tag
        ]);
        // $tag_paginate = Tag::paginate();
        // return $tag_paginate->currentPage();
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'tag_name' => 'required'
        ]);
        try{
            $tag = Tag::create([
                'tag_name' => $req->tag_name,
                'tag_slug' => Str::slug($req->tag_name)
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
            'message'       => 'Tag Created!',
            'status code'   => 200,
            'data'          => $tag
        ]);
    }
    public function update(Request $req)
    {
        $this->validate($req, [            
            'tag_name' => 'required'
        ]);
        try{
            $tag = Tag::findOrFail($req->id);
            $tag->update([
                'tag_name' => $req->tag_name,
                'tag_slug' => Str::slug($req->tag_name)
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
            'message'       => 'Tag Updated!',
            'status code'   => 200,
            'data'          => $tag
        ]);
    }
    public function destroy($id)
    {
        try{
            $tag = Tag::findOrFail($id);
            $tag->delete();
        }catch(\Exception $e){
            return response()->json([
                'success'       => false,
                'status code'   => 409,
                'message'       => $e->getMessage()
            ], 409);
        }
        return response()->json([
            'success'       => true,
            'message'       => 'Tag Deleted!',
            'status code'   => 200,
            'data'          => $tag
        ]);
    }
}
