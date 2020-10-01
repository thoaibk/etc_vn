<?php

namespace App\View\Components;

use App\Models\AppOption;
use Illuminate\View\Component;

class Banner extends Component
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
        $banners = AppOption::allBanner();

        return view('components.banner')
            ->with('banners', $banners);
    }
}
