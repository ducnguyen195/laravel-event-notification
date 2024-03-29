<?php

namespace App\Http\Controllers\User;

use App\Events\ViewPostEvent;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts =Post::all();
        return view('user.index',['posts' => $posts]);
    }

    public function detail($id) {
        $post = Post::find($id);
//        echo '<pre>';
//        print_r($post);
//        echo '</pre>';
//        exit;
        if($post){
            ViewPostEvent::dispatch(auth()->user(),$post);
            return view('user.detail',['posts'=>$post]);
        }
        return redirect()->back();
    }

    public function store(Request $request){
        $input  = $request->all();
        $new_post = new Post();
        $new_post ['name'] = $input ['name'];
        $new_post ['content'] = $input ['content'];
        $new_post ['user_id'] = 2;
        $new_post->save();
        sleep(1);
    }


}
