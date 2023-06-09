<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $post = Post::create($request->all());

        if($request->file('file')){
            $url= Storage::put('posts',$request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        if($request->tags){
           $post->tags()->attach($request->tags);     
        }

        return redirect()->route('admin.posts.edit',$post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $this->authorize('author','post');
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        // $this->authorize('author','post');
        
        $post->update($request->all());

        if($request->file('file')){
            $url = Storage::put('post',$request->file('file'));

            if($post->image){
                Storage::delete($post->image->url);
                
                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
            }

        }

        if($request->tags){
            $post->tags()->sync($request->tags);     
         }

        return redirect()->route('admin.posts.edit',$post)->with('info','El post se actualzó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $this->authorize('author','post');

        $post->delete();
        return redirect()->route('admin.posts.index')->with('info','El post se eliminó con éxito');
    }
}
