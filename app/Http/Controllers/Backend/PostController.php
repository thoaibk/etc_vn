<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends BackendController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $posts = Post::query()
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('backend.post.index')
            ->with('posts', $posts);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('backend.post.create');
    }

    /**
     * @param PostRequest $request
     * @return mixed
     */
    public function store(PostRequest $request){

        try{

            Post::create([
                'user_id' => \Auth::user()->id,
                'title' => $request->get('title'),
                'excerpt' => Str::words(strip_tags($request->get('content')), 80),
                'content' => $request->get('content'),
                'seo_title' => $request->get('seo_title'),
                'seo_description' => $request->get('seo_description'),
                'seo_keywords' => $request->get('seo_keywords'),
                'image_id' => $request->get('image_id')
            ]);

            return redirect(route('backend.post.index'))->withFlashSuccess('Đã thêm 1 bài post');
        } catch (\Exception $exception){
            return redirect()->back()->withFlashDanger($exception->getMessage());

        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $post = Post::find($id);
        if(!$post)
            abort(404);

        if($post->image){
            \JavaScript::put([
                'imageThumbUrl' => route('backend.api.image.show', ['id' => $post->image->id, 'template' => 'small'])
            ]);
        }

        return view('backend.post.edit')
            ->with('post', $post);
    }

    public function update($id, PostRequest $request){
        $post = Post::find($id);
        if(!$post)
            abort(404);

        try{

            $post->update([
                'title' => $request->get('title'),
                'excerpt' => Str::words(strip_tags($request->get('content')), 80),
                'content' => $request->get('content'),
                'seo_title' => $request->get('seo_title'),
                'seo_description' => $request->get('seo_description'),
                'seo_keywords' => $request->get('seo_keywords'),
                'image_id' => $request->get('image_id')
            ]);
            return redirect(route('backend.post.index'))->withFlashSuccess('Đã cập nhật bài post');
        } catch (\Exception $exception){
            return redirect()->back()->withFlashDanger($exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Post::find($id);
        if(!$model){
            abort(404);
        }

        $model->delete();
        return response()->json([
            'success' => true,
            'message' => 'Bài viết đã bị xóa'
        ]);
    }
}
