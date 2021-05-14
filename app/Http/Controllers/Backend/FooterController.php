<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppOption;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        if($request->isMethod('POST')){
            $footer_name = $request->get('footer_name');
            $footer_hotline = $request->get('footer_hotline');
            $footer_phone = $request->get('footer_phone');
            $email = $request->get('footer_email');
            $footer_address = $request->get('footer_address');

            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_NAME
            ], [
                'value' => $footer_name
            ]);
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_HOTLINE
            ], [
                'value' => $footer_hotline
            ]);
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_PHONE
            ], [
                'value' => $footer_phone
            ]);
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_EMAIL
            ], [
                'value' => $email
            ]);
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_ADDRESS
            ], [
                'value' => $footer_address
            ]);

            \Cache::forget(AppOption::FOOTER_NAME);
            \Cache::forget(AppOption::FOOTER_HOTLINE);
            \Cache::forget(AppOption::FOOTER_EMAIL);
            \Cache::forget(AppOption::FOOTER_ADDRESS);

            return redirect(route('backend.footer.info'))->withFlashSuccess('Đã lưu thông tin');
        }
        return view('backend.options.footer.info');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function meta_link($meta, Request $request)
    {

        if($request->isMethod('POST')){
            $widgetTitleKey = AppOption::getWidgetTitleKey($meta);
            AppOption::updateOrCreate([
                'key' => $widgetTitleKey
            ], [
                'value' => $request->get('footer_widget_title')
            ]);

            \Cache::forget($widgetTitleKey);
            return redirect(route('backend.footer.meta_link', ['meta' => $meta]))->withFlashSuccess('Đã lưu');
        }

        $widgetLinks = AppOption::footerWidgetLink($meta);
        return view('backend.options.footer.footer_meta')
            ->with('meta', $meta)
            ->with('widgetLinks', $widgetLinks);
    }

    public function create_link($meta){
        return view('backend.options.footer.add_widget_link')
            ->with('meta', $meta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_link($meta, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'Tiêu đề không được trống',
            'link.required' => 'Link không được trống'
        ]);
        if(!$validator->passes()){
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        if($meta == 'left'){
            $footerWidgetLinks = AppOption::footerWidgetLink($meta);
            $footerWidgetLinks[] = [
                'title' => $request->get('title'),
                'link' => $request->get('link'),
            ];

            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_META_LEFT
            ], [
                'value' => json_encode($footerWidgetLinks)
            ]);

            \Cache::forget(AppOption::FOOTER_META_LEFT);
        }
        else if($meta == 'center'){
            $footerWidgetLinks = AppOption::footerWidgetLink($meta);
            $footerWidgetLinks[] = [
                'title' => $request->get('title'),
                'link' => $request->get('link'),
            ];

            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_META_CENTER
            ], [
                'value' => json_encode($footerWidgetLinks)
            ]);
            \Cache::forget(AppOption::FOOTER_META_CENTER);
        }
        else if($meta == 'right'){
            $footerWidgetLinks = AppOption::footerWidgetLink($meta);
            $footerWidgetLinks[] = [
                'title' => $request->get('title'),
                'link' => $request->get('link'),
            ];

            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_META_RIGHT
            ], [
                'value' => json_encode($footerWidgetLinks)
            ]);
            \Cache::forget(AppOption::FOOTER_META_RIGHT);
        } else {
            return redirect()->back()->withFlashDanger('Thao tác không hợp lệ');
        }


        return redirect(route('backend.footer.meta_link', ['meta' => $meta]))->withFlashSuccess('Thêm link thành công');
    }

    /**
     * @param $meta
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit_link($meta, Request $request)
    {
        $id = $request->query('id');
        $widgetLink = AppOption::getWidgetLinkById($meta, $id);
        if(!$widgetLink)
            abort(404);

        return view('backend.options.footer.edit_widget_link')
            ->with('meta', $meta)
            ->with('widgetLink', $widgetLink);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_link($meta, $id, Request $request)
    {
        $widgetLink = AppOption::getWidgetLinkById($meta, $id);
        if(!$widgetLink)
            abort(404);

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
        ], [
            'title.required' => 'Tiêu đề không được trống',
            'link.required' => 'Link không được trống'
        ]);
        if(!$validator->passes()){
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $allWidgetLinks = AppOption::footerWidgetLink($meta);
        $allWidgetLinks[$id]['title'] = $request->get('title');
        $allWidgetLinks[$id]['link'] = $request->get('link');

        $key = AppOption::getWidgetLinkKey($meta);
        AppOption::updateOrCreate([
            'key' => $key
        ], [
            'value' => json_encode($allWidgetLinks)
        ]);

        \Cache::forget($key);

        return redirect(route('backend.footer.meta_link', ['meta' => $meta]))->withFlashSuccess('Cập nhật thành công');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_link($meta, $id)
    {
        $widgetLink = AppOption::getWidgetLinkById($meta, $id);
        if(!$widgetLink)
            abort(404);

        $allWidgetLinks = AppOption::footerWidgetLink($meta);

        unset($allWidgetLinks[$id]);

        $key = AppOption::getWidgetLinkKey($meta);
        AppOption::updateOrCreate([
            'key' => $key
        ], [
            'value' => json_encode($allWidgetLinks)
        ]);

        \Cache::forget($key);

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa link'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function widget_social(Request $request){
        if($request->isMethod('post')){

            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_WIDGET_SOCIAL_YOUTUBE
            ], [
                'value' => $request->get('footer_widget_social_youtube')
            ]);
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_WIDGET_SOCIAL_FACEBOOK
            ], [
                'value' => $request->get('footer_widget_social_facebook')
            ]);
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_WIDGET_SOCIAL_MESSENGER
            ], [
                'value' => $request->get('footer_widget_social_messenger')
            ]);
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_WIDGET_SOCIAL_EMAIL
            ], [
                'value' => $request->get('footer_widget_social_email')
            ]);

            \Cache::forget(AppOption::FOOTER_WIDGET_SOCIAL_YOUTUBE);
            \Cache::forget(AppOption::FOOTER_WIDGET_SOCIAL_FACEBOOK);
            \Cache::forget(AppOption::FOOTER_WIDGET_SOCIAL_MESSENGER);
            \Cache::forget(AppOption::FOOTER_WIDGET_SOCIAL_EMAIL);

            return redirect(route('backend.footer.widget_social'))->withFlashSuccess('Đã lưu');
        }
        return view('backend.options.footer.widget_social');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function copyright(Request $request){
        if($request->isMethod('post')){
            AppOption::updateOrCreate([
                'key' => AppOption::FOOTER_COPYRIGHT
            ], [
                'value' => $request->get('copyright')
            ]);
            \Cache::forget(AppOption::FOOTER_COPYRIGHT);

            return redirect(route('backend.footer.copyright'))->withFlashSuccess('Đã lưu');
        }
        return view('backend.options.footer.copyright');
    }
}
