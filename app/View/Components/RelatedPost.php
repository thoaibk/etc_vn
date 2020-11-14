<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class RelatedPost extends Component
{

    public $excludeId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($excludeId)
    {
        $this->excludeId = $excludeId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

        $posts = Post::whereStatus(Post::STATUS_PUBLISH)
            ->where('approve_status', Post::APPROVE_STATUS_YES)
            ->where('id', '<>', $this->excludeId)
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        return view('components.related-post')
            ->with('posts', $posts);
    }
}
