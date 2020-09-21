<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function detail($id, $slug, Request $request){
        $post = Post::find($id);
        if(!$post)
            abort(404);

        return view('frontend.post.detail')
            ->with('post', $post);
    }
}
