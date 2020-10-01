<?php

namespace App\View\Components;

use App\Models\ProductCategory;
use Illuminate\View\Component;

class CategoryNav extends Component
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
        $categorys = ProductCategory::whereStatus(ProductCategory::STATUS_ACTIVE)
            ->limit(3)
            ->get(['id', 'name', 'slug']);

        return view('components.category-nav')
            ->with('categories', $categorys);
    }
}
