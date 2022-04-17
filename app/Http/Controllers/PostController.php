<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;
class PostController extends Controller
{   
   private  $posts = [];
    public function index()
    {
        $posts = Post::paginate(10);
        // $this->posts =Post::all();
        return view('posts.index',[
            'allPosts' => $posts ,
        ]);
    }

    public function create()
    {
        $users=User::all();
        return view('posts.create',[
            'users' => $users ]);
    }

    public function store(StorePostRequest $request)
    {
       $post=request()->all();

        if (request()->hasFile('image')) {
            $destination_path = '/storage/app/public/images';
            $image =request()->file('image');
            $image_name = $image->getClientOriginalName();
            $path =request()->file('image')->storeAs($destination_path, $image_name);
            $post['image'] = $image_name;
        }
       Post::create([
           'title'=>$post['title'],
           'descreption'=>$post['descreption'],
           'creator'=>$post['creator'],
           'image' => $post['image']
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

    public function update(UpdatePostRequest $request,Post $post)
    {
           
        $data = request()->post();
        $post->title = $data['title'];
        $post->descreption = $data['descreption'];
        $post-> creator= $data['creator'];
        $post->save();
        return to_route('posts.index'); 
    }
    public function delete($id)
    {
        
        $user = Post::find($id);
        $user->delete();
        return to_route('posts.index');
    }
}
