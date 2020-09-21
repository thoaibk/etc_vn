<?php

namespace App\Http\Controllers\Backend\Api;

use App\Core\MyStorage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use League\Flysystem\FileNotFoundException;

class ImageController extends Controller
{
    public function store(Request $request){

        $entity = $request->get('entity', 'default');

        $imageEntity = \App\Models\Image::getEntity($entity);

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
                    'entity' => $imageEntity,
                    'disk' => $diskName,
                    'path' => $path
                ]);
                $data = [
                    'files' => [
                        [
                            'id'            => $image->id,
                            'title'         => null,
                            'url'           => $image->getImageSrc('small'),
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

    public function show($id, $template = 'small'){
        $image = \App\Models\Image::find($id);
        if(!$image){
            abort(404);
        }

        $data = [
            'files' => [
                [
                    'id'            => $image->id,
                    'title'         => null,
                    'url'           => $image->getImageSrc($template),
                    'url_thumb'     => $image->getImageSrc($template),
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

    public function delete($id){
        $image = \App\Models\Image::find($id);
        if(!$image){
            return response('Ảnh không tồn tại', 404);
        }


        try{
            $old_disk = MyStorage::getDisk($image->disk);
            if($old_disk && $image->path != '' && $old_disk->has($image->path)){
                $old_disk->delete($image->path);
            }

            $cacheTemplates = config('imagecache.templates.'. $image->entity .'.templates', []);

            foreach ($cacheTemplates as $cacheTemplate => $class){
                $tamplatePath = $cacheTemplate . '/' . $image->path;
                \Log::info('Delete: ' . $tamplatePath);
                if(\Storage::disk('imageCaches')->exists($tamplatePath)){
                    \Storage::disk('imageCaches')->delete($tamplatePath);
                }
            }

        }catch (FileNotFoundException $e){
            \Log::info('Lỗi Xóa ảnh: ' . $e->getMessage());
        }

        $image->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa'
        ]);
    }
}
