<?php

namespace App\View\Components;

use App\Models\ProductCategory;
use Illuminate\View\Component;

class Category2 extends Component
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
        $categories = ProductCategory::query()
            ->take(2)
            ->skip(3)
            ->get();
        return view('components.category2')
            ->with('categories', $categories);
    }
}
