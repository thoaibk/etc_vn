<?php

namespace App\Http\Controllers\Backend\Api;

use App\Core\MyStorage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class ImageController extends Controller
{
    public function store(Request $request){
        // valid file
        $file_uploaded = $request->file('image_file_upload');
        $valid_result = MyStorage::defaultValidUploadFile($file_uploaded, 'image');


        if($valid_result['valid'] == false){
            return response()->json(['success' => false, 'message' => $valid_result['message']]);
        }

        //save new image
        $diskName = 'public_image';
        $disk = MyStorage::getDisk($diskName);
        $nameSave = md5(auth()->user()->id . time()) . '.' . $request->file('cou_avatar')->getClientOriginalExtension();
        $path = getPathByDay('cou_avatar','now', $nameSave);


        $uploaded_image = \Image::make($request->file('image_file_upload'));
        // valid min dimension
        if($uploaded_image->height() < config('flysystem.course_avatar_min_size.height')
            || $uploaded_image->width() < config('flysystem.course_avatar_min_size.width')){
            return response()->json([
                'success' => false,
                'message' => trans('validation.image_dimension',[
                    'height' => config('flysystem.course_avatar_min_size.height'),
                    'width' => config('flysystem.course_avatar_min_size.width'),
                ])
            ]);
        }

        $saved = $disk->putStream($path,
            $uploaded_image->resize(2048, 2048, function ($constraint) {
                $constraint->aspectRatio();
            })
                ->encode(null,100)
                ->stream()
                ->detach());
        if($saved){
            $image = \App\Models\Image::create([
                'disk' => $disk,
                'path' => $path
            ]);

            return


            echo "<pre>"; var_dump($saved); echo "</pre>"; die;


//            // remove old image
//            try{
//                $old_disk = MyStorage::getDisk($course->cover_disk);
//                if($old_disk && $course->cover_path != '' &&$old_disk->has($course->cover_path)){
//                    $old_disk->delete($course->cover_path);
//                }
//            }catch (FileNotFoundException $e){
//                // do nothing
//            }
//
////            echo "<pre>"; print_r($name); echo "</pre>"; die;
//
//            $saved = $course->update([
//                'cover_path' => $name,
//                'cover_disk' => 'public'
//            ]);
//
//            if($saved){
//                return response()->json(['success' => true]);
//            }
        }

        return response()->json([
            'id' => 12
        ]);
    }
}
