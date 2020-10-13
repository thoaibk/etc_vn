<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ProductRight extends Component
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

        $products = Product::query()
            ->where('id', '<>', $this->excludeId)
            ->take(4)
            ->orderByDesc('created_at')
            ->get();

        return view('components.product-right')
            ->with('products', $products);
    }
}
