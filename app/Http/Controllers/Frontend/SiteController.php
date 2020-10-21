<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppOption;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

        $title = AppOption::where('key', AppOption::APP_TITLE)->first(['key', 'value']);
        $desc = AppOption::where('key', AppOption::APP_DESC)->first(['key', 'value']);
        $keywords = AppOption::where('key', AppOption::APP_KEYWORDS)->first(['key', 'value']);

        $title = ($title) ? $title->value : env('APP_NAME');
        $desc = ($desc) ? $desc->value : '';
        $keywords = ($keywords) ? $keywords->value : '';

        \SEOMeta::setTitle($title);
        \SEOMeta::setDescription($desc);
        \SEOMeta::setKeywords($keywords);

        \OpenGraph::setTitle($title);
        \OpenGraph::setDescription($desc);
        \OpenGraph::addImage(config('app.url') . '/image/graph-evico.jpg',['height' => 1200, 'width' => 630]);

        $hotProducts = Product::query()
            ->where('status', Product::STATUS_ACTIVE)
            ->limit(8)
            ->get();

        return view('frontend.site.index')
            ->with('hotProducts', $hotProducts);
    }

}
