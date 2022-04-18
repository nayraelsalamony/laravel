<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index()
    {
       $post=Post::all();
    return  PostResource::collection($post);
    }
    public function show($id)
    {
        $post = Post::find($id);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        $post = request()->all();
        $postData = Post::create([
            'title' => $post['title'],
            'descreption' => $post['descreption'],
            'creator' => $post['creator'],
        ]);
        return $postData;
    }

}
