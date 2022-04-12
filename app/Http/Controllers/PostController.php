<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{   
   private  $posts = [
        ['id' => 1, 'title' => 'first post', 'posted_by' => 'ahmed', 'created_at' => '2022-04-11'],
        ['id' => 2, 'title' => 'second post', 'posted_by' => 'mohamed', 'created_at' => '2022-04-11'],
    ];
    public function index()
    {
        
        return view('posts.index',[
            'allPosts' => $this->posts ,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
       $post=[
           "id"=>count($this->posts )+1 ,
           "title"=>request()["title"],
           "posted_by"=>request()["posted_by"],
           "created_at"=>request()["created_at"]

       ];
       array_push($this->posts,$post);
       return view('posts.index',[
        'allPosts' => $this->posts ,
    ]);
    }

    public function show($id)
    {
        $id = (int)$id;
        $filteredPost = array_filter($this->posts, function ($post) use ($id) {
            return $post["id"] === $id;
        });
        //  dd($filteredPost);
        return view('posts.show', [
            "filteredPost" => $filteredPost
        ]);
        
    }
    public function edit($id)
    {
        $id = (int)$id;
        $filteredPost = array_filter($this->posts, function ($post) use ($id) {
            return $post["id"] === $id;
        });

        return view('posts.update', [
            "filteredPost" => $filteredPost
        ]);
    }
    public function update($id)
    {
        return "updated";
    }
    public function delete($id)
    {
        return view('delete');
    }
}
