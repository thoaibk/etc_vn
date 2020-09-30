<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppOption;
use App\Models\Image;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index(){
        $bannerConfig = [];
        $banner = AppOption::where('key', AppOption::APP_BANNER)->first();
        if($banner && !empty($banner->value)){
            $bannerConfig = json_decode($banner->value);
        }
        return view('backend.banner.index')
            ->with('bannerConfig', $bannerConfig);
    }

    public function create(){
        return view('backend.banner.create');
    }

    public function store(Request $request){

        $validator = \Validator::make($request->all(), [
            'image_id' => 'required',
        ], [
            'image_id.required' => 'Chưa upload ảnh banner'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }

        $bannerImage = Image::find($request->get('image_id'));
        if(!$bannerImage){
            return redirect()->back()->withFlashDanger('Không tìm thấy ảnh banner. Vui lòng thử lại');
        }

        $bannerConfig = [];
        $banner = AppOption::where('key', AppOption::APP_BANNER)->first();
        if($banner && !empty($banner->value)){
            $bannerConfig = json_decode($banner->value, true);
        }

        $bannerConfig[] = [
            'image_id' => $bannerImage->id,
            'banner_image_disk' => $bannerImage->disk,
            'banner_image_path' => $bannerImage->path,
            'thumb' => $bannerImage->getImageSrc('small'),
            'link' => $request->get('link')
        ];

        AppOption::updateOrCreate([
            'key' => AppOption::APP_BANNER,
        ], [
            'value' => json_encode($bannerConfig)
        ]);

        return redirect(route('backend.banner.index'))->withFlashSuccess('Thêm banner thành công');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $banner = AppOption::getBannerByIndex($id);
        if(!$banner){
            abort(404);
        }

        \JavaScript::put([
            'imageThumbUrl' => route('backend.api.image.show', ['id' => $banner['image_id'], 'template' => 'small'])
        ]);
        return view('backend.banner.create')
            ->with('banner_id', $id)
            ->with('banner', $banner);
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request){

        $banner = AppOption::getBannerByIndex($id);
        if(!$banner){
            abort(404);
        }

        $validator = \Validator::make($request->all(), [
            'image_id' => 'required',
        ], [
            'image_id.required' => 'Chưa upload ảnh banner'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }

        $bannerImage = Image::find($request->get('image_id'));
        if(!$bannerImage){
            return redirect()->back()->withFlashDanger('Không tìm thấy ảnh banner. Vui lòng thử lại');
        }

        $appBanner = AppOption::where('key', AppOption::APP_BANNER)->first();
        $bannerConfig = json_decode($appBanner->value, true);

        $banner['image_id']             = $bannerImage->id;
        $banner['banner_image_disk']    = $bannerImage->disk;
        $banner['banner_image_path']    = $bannerImage->path;
        $banner['thumb']                = $bannerImage->getImageSrc('small');
        $banner['link']                 = $request->get('link');

        $bannerConfig[$id] = $banner;

        AppOption::updateOrCreate([
            'key' => AppOption::APP_BANNER,
        ], [
            'value' => json_encode($bannerConfig)
        ]);

        return redirect(route('backend.banner.index'))->withFlashSuccess('Đã lưu cập nhật banner');
    }

    public function delete($id){
        $banners = AppOption::allBanner();
        if(!isset($banners[$id])){
            abort(404);
        }

        unset($banners[$id]);

        AppOption::updateOrCreate([
            'key' => AppOption::APP_BANNER,
        ], [
            'value' => json_encode($banners)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa banner'
        ]);
    }
}
