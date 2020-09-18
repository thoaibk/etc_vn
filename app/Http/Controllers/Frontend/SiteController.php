<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        $hotProducts = Product::query()
            ->where('status', Product::STATUS_ACTIVE)
            ->limit(8)
            ->get();

        return view('frontend.site.index')
            ->with('hotProducts', $hotProducts);
    }

}
