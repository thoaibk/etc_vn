<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = Post::query()
            ->paginate(10);

        $title = 'Tin tức Evico';
        $desc = '';
        \SEOMeta::setTitle($title);
        \SEOMeta::setDescription($desc);
        \OpenGraph::setTitle($title);
        \OpenGraph::setDescription($desc);
//        \OpenGraph::addImage($post->thumb('social'),['height' => 600, 'width' => 315]);

        return view('frontend.post.index')
            ->with('posts');
    }
    public function detail($id, $slug, Request $request){
        $post = Post::find($id);
        if(!$post)
            abort(404);

        \SEOMeta::setTitle($post->getTitle());
        \SEOMeta::setDescription($post->getDescription());
        \SEOMeta::setKeywords($post->getKeywords());

        \OpenGraph::setTitle($post->getTitle());
        \OpenGraph::setDescription($post->getDescription());
        \OpenGraph::addImage($post->thumb('social'),['height' => 600, 'width' => 315]);


        return view('frontend.post.detail')
            ->with('post', $post);
    }
}
