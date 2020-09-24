<?php

namespace App\Http\Controllers\Backend\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function menuInput(){
        $parentCategories = ProductCategory::whereNull('parent_id')
            ->get();



        return response()->json([
            'categories' => $parentCategories
        ]);
    }
}
