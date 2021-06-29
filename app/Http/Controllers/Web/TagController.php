<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index(Request $req)
    {   
        $key = trim($req->q);
        if($key){
            $tags = Tag::where('tag_name', 'LIKE', "%$key%")->paginate();                        
        }else{
            $tags = Tag::latest()->paginate(10);                    
        }        
        return view('tag.index', compact('tags'));
    }
    public function create()
    {
        return view('tag.create');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'tag_name' => 'required'
        ]);
        
        try{
            Tag::create([
                'tag_name' => $req->tag_name,
                'tag_slug' => Str::slug($req->tag_name)
            ]);            
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Cant create data']);
            dd($e);
        }
        return redirect()->route('tag.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit($id)
    {
        try{
            $tag = Tag::findOrFail($id);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Cant create data']);
            dd($e);
        }
        return view('tag.edit', compact('tag'));
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'tag_name' => 'required'
        ]);

        try
        {
            $tag = Tag::findOrFail($id);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Cant create data']);
            dd($e);
        }
        $tag->update([
            'tag_name' => $req->tag_name,
            'tag_slug' => Str::slug($req->tag_name)
        ]);
        return redirect()->route('tag.edit', $tag->id)->with(['success' => 'Data Berhasil Diedit!']);
    }
    public function destroy($id)
    {        
        try
        {            
            $tag = Tag::findOrFail($id);  
            $tag->delete();
            return redirect()->route('tag.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
        catch(\Exception $e)
        {                     
            return redirect()->route('tag.edit', $tag->id)->with(['error' => $e->errorInfo[2]]);               
        }                  
    }
}
