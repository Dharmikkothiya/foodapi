<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpadatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts =Post::get();
       return response()->json([
         'message'=>'List of posts',
         'posts'=> $posts
       ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post =new Post;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
        return response()->json([
            'message'=>'New Post Created !!',
            'posts'=> $post
          ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {    
        // $post = Post::find($id);
        return response()->json([
            'message'=>'single post',
            'post'=> $post
          ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpadatePostRequest $request, Post $post)
    {
        // $post = Post::find($id);
       

        $post->title=$request->title?? $post->title;
        $post->content=$request->content?? $post->content;
        $post->save();
        return response()->json([
            'message'=>'Post updated!',
            'posts'=> $post
          ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return response()->json([
            'message'=>'Post deleted',
            'posts'=> $post->delete()
          ],200);
    }
}
