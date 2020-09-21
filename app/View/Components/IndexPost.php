<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class IndexPost extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        $posts = Post::whereStatus(Post::STATUS_PUBLISH)
            ->orderByDesc('created_at')
            ->limit(9)
            ->get();

        return view('components.frontend.index-post')
            ->with('posts', $posts);
    }
}
