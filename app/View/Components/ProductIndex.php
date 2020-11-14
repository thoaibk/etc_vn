<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ProductIndex extends Component
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
        $products = Product::whereStatus(Product::STATUS_ACTIVE)
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();
        return view('components.product-index')
            ->with('products', $products);
    }
}
