<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'category_name' => 'required'
        ]);
        
        try{
            Category::create([
                'category_name' => $req->category_name,
                'category_slug' => Str::slug($req->category_name)
            ]);            
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Cant create data']);
            dd($e);
        }
        return redirect()->route('category.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit($id)
    {
        try{
            $category = Category::findOrFail($id);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Cant create data']);
            dd($e);
        }
        return view('category.edit', compact('category'));
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'category_name' => 'required'
        ]);

        try
        {
            $category = Category::findOrFail($id);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Cant create data']);
            dd($e);
        }
        $category->update([
            'category_name' => $req->category_name,
            'category_slug' => Str::slug($req->category_name)
        ]);
        return redirect()->route('category.edit', $category->id)->with(['success' => 'Data Berhasil Diedit!']);
    }
    public function destroy($id)
    {        
        try
        {            
            $category = Category::findOrFail($id);  
            $category->delete();
            return redirect()->route('category.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
        catch(\Exception $e)
        {                     
            return redirect()->route('category.edit', $category->id)->with(['error' => $e->errorInfo[2]]);               
        }                  
    }
}
