<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;
class PostController extends Controller
{   
   private  $posts = [];
    public function index()
    {
        $this->posts =Post::all();
        // dd( $this->posts);
        return view('posts.index',[
            'allPosts' => $this->posts ,
        ]);
    }

    public function create()
    {
        $users=User::all();
        return view('posts.create',[
            'users' => $users ]);
    }

    public function store()
    {
       $post=request()->all();
    //    dd( $post);
       Post::create([
           'title'=>$post['title'],
           'descreption'=>$post['descreption'],
           'user_id'=>$post['creator']
           ,
           'creator'=>$post['creator']
       ]);
       return to_route('posts.index');
    }

    public function show($id)
    {    
        $id = (int)$id;
        // dd($id);
        $filteredPost=Post::find($id);
        //  dd($filteredPost);
        return view('posts.show', [
            "filteredPost" => $filteredPost
        ]);
        
    }
    public function edit($id)
    { $postShow = Post::find($id);
        $creators = User::all();
        return view('posts.update', [
            "postShow" => $postShow,
            "creators" => $creators
        ]);
}

    public function update($id)
    {
        $updatedPost = Post::find($id);
        
        $data = request()->post();
       
        $updatedPost->title = $data['title'];
        $updatedPost->descreption = $data['descreption'];
        $updatedPost-> creator= $data['creator'];
        $updatedPost->save();
        return to_route('posts.index'); 
    }
    public function delete($id)
    {
        
        $user = Post::find($id);
        $user->delete();
        return to_route('posts.index');
    }
}
