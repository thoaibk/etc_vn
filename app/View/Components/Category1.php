<?php

namespace App\View\Components;

use App\Models\ProductCategory;
use Illuminate\View\Component;

class category1 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $categories = ProductCategory::query()
        ->take(3)
        ->skip(0)
        ->get();
        return view('components.category1')
            ->with('categories', $categories);
    }
}
