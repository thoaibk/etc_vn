<?php

namespace App\Http\Controllers\Backend;

use App\Core\MyStorage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Image;
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
            Product::create([
                'category_id' => $request->get('cate'),
                'name' => $request->get('name'),
                'short_desc' => $request->get('short_desc'),
                'content' => $request->get('content'),
                'price' => $request->get('price'),
                'image_id' => $request->get('image_id'),
                'seo_title' => $request->get('seo_title'),
                'seo_description' => $request->get('seo_description'),
                'seo_keywords' => $request->get('seo_keywords'),
            ]);

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

        $categories = ProductCategory::categoryAvailable();

        if($product->image){
            \JavaScript::put([
                'imageThumbUrl' => route('backend.api.image.show', ['id' => $product->image->id, 'template' => 'small'])
            ]);
        }

        return  view('backend.product.edit')
            ->with('product', $product)
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
                'category_id' => $request->get('cate'),
                'name' => $request->get('name'),
                'short_desc' => $request->get('short_desc'),
                'content' => $request->get('content'),
                'price' => $request->get('price'),
                'image_id' => $request->get('image_id'),
                'seo_title' => $request->get('seo_title'),
                'seo_description' => $request->get('seo_description'),
                'seo_keywords' => $request->get('seo_keywords'),
            ]);

//            $product->categories()->detach();
//            $cates = $request->get('cate', []);
//            foreach ($cates as $cateID){
//                $product->categories()->attach($cateID);
//            }
            \DB::commit();

            return redirect(route('backend.product.index'))->withFlashSuccess('Cập nhật sản phẩm thành công');
        } catch (\Exception $exception){
            return redirect()->back()->withInput($request->all())->withFlashDanger($exception->getMessage());
        }

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function images($id, Request $request){
        $product = Product::find($id);
        if(!$product)
            abort(404);

        $images = $product->images()->paginate(10);

        return view('backend.product.image')
            ->with('product', $product)
            ->with('images', $images);

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeImage($id, Request $request){
        $product = Product::find($id);
        if(!$product)
            abort(404);

        $imageEntity = 'product_slide';
        try{
            // valid file
            $file_uploaded = $request->file('image_file_upload');
            $valid_result = MyStorage::defaultValidUploadFile($file_uploaded, 'image');

            if($valid_result['valid'] == false){
                return response()->json(['success' => false, 'message' => $valid_result['message']]);
            }

            //save new image
            $diskName = 'public_image';
            $disk = MyStorage::getDisk($diskName);
            $nameSave = md5(auth()->user()->id . time()) . '.' . $request->file('image_file_upload')->getClientOriginalExtension();
            $path = getPathByDay($imageEntity,'now', $nameSave);

            $uploaded_image = \Image::make($request->file('image_file_upload'));


            $width = config('flysystem.product_side.width');
            $height = config('flysystem.product_side.height');

            // valid min dimension
            if($uploaded_image->width() < $width || $uploaded_image->height() < $height){
                return response()->json([
                    'success' => false,
                    'message' => trans('validation.image_dimension',[
                        'width' => $width,
                        'height' => $height
                    ])
                ]);
            }

            $saved = $disk->putStream($path,
                $uploaded_image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })
                    ->encode(null,100)
                    ->stream()
                    ->detach());

            if($saved){
                $image = \App\Models\Image::create([
                    'entity' => $imageEntity,
                    'disk' => $diskName,
                    'path' => $path
                ]);

                $product->images()->attach($image->id);

                $data = [
                    'files' => [
                        [
                            'id'            => $image->id,
                            'title'         => null,
                            'url'           => $image->getImageSrc('medium'),
                            'url_thumb'     => $image->getImageSrc('small'),
                            'delete_url'    => $image->deleteUrl(),
                            'delete_method' => 'DELETE',
                        ]
                    ],
                    'success' => true,
                    'image_id' => $image->id,
                    'msg' => 'success'
                ];

                return response()->json($data);
            }

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi khi lưu ảnh. Vui lòng kiểm tra lại'
            ]);
        } catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function remoteImage($id, $imageID){
        $product = Product::find($id);
        if(!$product)
            abort(404);

        $deleteImage = $product->images()->find($imageID);
        if(!$deleteImage){
            abort(404);
        }

        try{

            $old_disk = MyStorage::getDisk($deleteImage->disk);
            if($old_disk && $deleteImage->path != '' && $old_disk->has($deleteImage->path)){
                $old_disk->delete($deleteImage->path);
            }

            $cacheTemplates = config('imagecache.templates.'. $deleteImage->entity .'.templates', []);

            foreach ($cacheTemplates as $cacheTemplate => $class){
                $tamplatePath = $cacheTemplate . '/' . $deleteImage->path;
                \Log::info('Delete: ' . $tamplatePath);
                if(\Storage::disk('imageCaches')->exists($tamplatePath)){
                    \Storage::disk('imageCaches')->delete($tamplatePath);
                }
            }

            $deleteImage->delete();

            return response()->json([
                'success' => true,
                'message' => 'Đã xóa ảnh sản phẩm'
            ]);
        } catch (\Exception $exception){
            return response($exception->getMessage(), 501);
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
