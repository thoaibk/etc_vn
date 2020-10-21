<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppOption;
use Illuminate\Http\Request;

class ConfigController extends BackendController
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function meta(Request $request){

        if($request->isMethod('post')){
            if($request->exists('title')){
                AppOption::updateOrCreate([
                    'key' => AppOption::APP_TITLE
                ], [
                    'value' => $request->get('title')
                ]);
            }
            if($request->exists('description')){
                AppOption::updateOrCreate([
                    'key' => AppOption::APP_DESC
                ], [
                    'value' => $request->get('description')
                ]);
            }
            if($request->exists('keywords')){
                AppOption::updateOrCreate([
                    'key' => AppOption::APP_KEYWORDS
                ], [
                    'value' => $request->get('keywords')
                ]);
            }

            return redirect(route('backend.config.meta'))->withFlashSuccess('Đã cập nhật');
        }

        $title = AppOption::where('key', AppOption::APP_TITLE)->first(['key', 'value']);
        $desc = AppOption::where('key', AppOption::APP_DESC)->first(['key', 'value']);
        $keywords = AppOption::where('key', AppOption::APP_KEYWORDS)->first(['key', 'value']);

        $data = [
            'title' => ($title) ? $title->value : '',
            'desc' => ($desc) ? $desc->value : '',
            'keywords' => ($keywords) ? $keywords->value : '',
        ];


        return view('backend.options.meta.meta')
            ->with('data', $data);
    }
}
