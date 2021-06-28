<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();        
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $req)
    {
        $this->validate($req, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        $image = $req->file('image');
        $image->storeAs('public/posts', $image->hashName());

        $post = Post::create([
            'image' => $image->hashName(),
            'title' => $req->title,
            'content' => $req->content
        ]);

        if($post)
        {
            return redirect()->route('post.index');
        }
        else
        {
            return redirect()->route('post.create');
        }
    }
    public function edit($id)
    {        
        try{
            $post = Post::findOrFail($id);
        }
        catch(\Exception $e)
        {
            return response()->json(['message' => 'Id not found :)']);
            dd($e);            
        }        
        return view('post.edit', compact('post'));
    }
    public function update(Request $req, $id)
    {
        $this->validate($req, [            
            'title'     => 'required',
            'content'   => 'required'
        ]);

        try{
            $post = Post::findOrFail($id);
        }
        catch(\Exception $e)
        {   
            return response()->json(['message' => 'Id not found :)']);
            dd($e);            
        }

        if($req->file('image') == "")
        {
            $post->update([
                'title' => $req->title,
                'content' => $req->content
            ]);
        }
        else
        {
            Storage::disk('local')->delete('public/posts/'.$post->image);
            $image = $req->file('image');
            $image->storeAs('public/posts', $image->hashName());
            
            $post->update([
                'image' => $image->hashName(),
                'title' => $req->title,
                'content' => $req->content 
            ]);                        
        }    
        return redirect()->route('post.edit', $post->id);        
    }
    public function destroy($id)
    {        
        try
        {
            $post = Post::findOrFail($id);                        
        }
        catch(\Exception $e)
        {   
            return response()->json(['message' => 'Id not found :)']);
            dd($e);            
        }    
        Storage::disk('local')->delete('public/posts/'.$post->image);
        $post->delete();             
        return redirect()->route('post.index');
    }
}
