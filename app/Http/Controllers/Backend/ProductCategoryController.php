<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::query()
            ->orderByDesc('created_at')
            ->paginate(15);


        return view('backend.product-category.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
        ProductCategory::create([
            'name' => $request->get('name')
        ]);

        return redirect(route('backend.product_category.index'))->withFlashSuccess('Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategory::find($id);
        if(!$category){
            abort(404);
        }

        return  view('backend.product-category.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        $category = ProductCategory::find($id);
        if(!$category){
            abort(404);
        }
        $category->name = $request->get('name');
        $category->update();

        return redirect(route('backend.product_category.index'))->withFlashSuccess('Sửa danh mục thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleStatus($id){
        $category = ProductCategory::find($id);
        if(!$category){
            abort(404);
        }

        $toggleStatus = $category->status === ProductCategory::STATUS_ACTIVE ? ProductCategory::STATUS_INACTIVE : ProductCategory::STATUS_ACTIVE;

        $category->status = $toggleStatus;
        $category->update();
        $toggleStatusIcon = $category->statusStateIcon();

        return response()->json([
            'success' => true,
            'message' => 'Thay đổi trạng thái thành công',
            'status_label' => $category->statusLable(),
            'icon' => $toggleStatusIcon
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        if(!$category){
            abort(404);
        }

        $category->delete();
        return response()->json([
            'success' => true,
            'message' => 'Danh mục đã bị xóa'
        ]);
    }
}
