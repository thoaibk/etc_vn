<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = Post::whereStatus(Post::STATUS_PUBLISH)
            ->where('approve_status', Post::APPROVE_STATUS_YES)
            ->paginate(10);

        $title = 'Tin tức Evico';
        $desc = '';
        \SEOMeta::setTitle($title);
        \SEOMeta::setDescription($desc);
        \OpenGraph::setTitle($title);
        \OpenGraph::setDescription($desc);
//        \OpenGraph::addImage($post->thumb('social'),['height' => 600, 'width' => 315]);

        return view('frontend.post.index')
            ->with('posts', $posts);
    }
    public function detail($id, $slug, Request $request){

        $post = Post::query();

        if($request->get('ref') === 'preview' && auth()->user()->hasRole('admin')){
            $post = $post->first();
        } else {
            $post = $post->where('status', Post::STATUS_PUBLISH)
                ->where('approve_status', Post::APPROVE_STATUS_YES)
                ->first();
        }


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
