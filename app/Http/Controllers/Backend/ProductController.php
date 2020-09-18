<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()
            ->orderByDesc('created_at')
            ->paginate(15);
        return  view('backend.product.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::categoryAvailable();

        return  view('backend.product.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        \DB::beginTransaction();
        try{
            $product = Product::create([
                'name' => $request->get('name'),
                'content' => $request->get('content'),
                'price' => $request->get('price'),
                'image_id' => $request->get('image_id'),
                'seo_title' => $request->get('seo_title'),
                'seo_description' => $request->get('seo_description'),
                'seo_keywords' => $request->get('seo_keywords'),
            ]);

            $cates = $request->get('cate', []);
            foreach ($cates as $cateID){
                $product->categories()->attach($cateID);
            }
            \DB::commit();
            return redirect(route('backend.product.index'))->withFlashSuccess('Thêm sản phẩm thành công');
        } catch (\Exception $exception){
            \DB::rollBack();
            return redirect()->back()->withInput($request->all())->withFlashDanger($exception->getMessage());
        }
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
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }

        $productCategegories = $product->categories()->get(['id', 'name'])->keyBy('id')->toArray();
        $categories = ProductCategory::categoryAvailable();

        if($product->image){
            \JavaScript::put([
                'imageThumbUrl' => route('backend.api.image.show', ['id' => $product->image->id, 'template' => 'small'])
            ]);
        }

        return  view('backend.product.edit')
            ->with('product', $product)
            ->with('productCategegories', $productCategegories)
            ->with('categories', $categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }

        \DB::beginTransaction();
        try{
            $product->update([
                'name' => $request->get('name'),
                'content' => $request->get('content'),
                'price' => $request->get('price'),
                'image_id' => $request->get('image_id'),
                'seo_title' => $request->get('seo_title'),
                'seo_description' => $request->get('seo_description'),
                'seo_keywords' => $request->get('seo_keywords'),
            ]);

            $product->categories()->detach();
            $cates = $request->get('cate', []);
            foreach ($cates as $cateID){
                $product->categories()->attach($cateID);
            }
            \DB::commit();

            return redirect(route('backend.product.index'))->withFlashSuccess('Cập nhật sản phẩm thành công');
        } catch (\Exception $exception){
            return redirect()->back()->withInput($request->all())->withFlashDanger($exception->getMessage());
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleStatus($id){
        $model = Product::find($id);
        if(!$model){
            abort(404);
        }

        $toggleStatus = $model->status === Product::STATUS_ACTIVE ? Product::STATUS_INACTIVE : Product::STATUS_ACTIVE;

        $model->status = $toggleStatus;
        $model->update();
        $toggleStatusIcon = $model->statusStateIcon();

        return response()->json([
            'success' => true,
            'message' => 'Thay đổi trạng thái thành công',
            'status_label' => $model->statusLable(),
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
        $model = Product::find($id);
        if(!$model){
            abort(404);
        }

        $model->delete();
        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã bị xóa'
        ]);
    }
}
