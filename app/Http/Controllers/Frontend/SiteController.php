<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        \SEOMeta::setTitle(config('seotools.meta.home.title'));
        \SEOMeta::setDescription(config('seotools.meta.home.description'));
        \SEOMeta::setKeywords(config('seotools.meta.home.keywords'));

        \OpenGraph::setTitle(config('seotools.meta.home.title'));
        \OpenGraph::setDescription(config('seotools.meta.home.description'));
        \OpenGraph::addImage(config('app.url') . '/image/graph-evismart.png',['height' => 1200, 'width' => 630]);

        $hotProducts = Product::query()
            ->where('status', Product::STATUS_ACTIVE)
            ->limit(8)
            ->get();

        return view('frontend.site.index')
            ->with('hotProducts', $hotProducts);
    }

}
