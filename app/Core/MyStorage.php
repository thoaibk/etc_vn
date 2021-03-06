<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 9/14/15
 * Time: 17:35
 */

namespace App\Core;


use App\Core\ImageTemplate\Medium;
use App\Core\ImageTemplate\Small;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MyStorage
{
    /**
     * Lấy ổ đĩa mặc định của hệ thống
     * @return \League\Flysystem\Filesystem
     */
    public static function getDefaultDisk(){
        return self::getDisk(config('flysystem.default'));
    }

    /**
     * Lấy ổ đĩa tương ứng để thao tác
     * @param $disk
     * @return \League\Flysystem\Filesystem
     */
    public static function getDisk($disk){
        return Flysystem::connection($disk);
    }

    /**
     * @param $disk
     * @param $path
     * @param $entity
     * @param string $template
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function get_image_link($disk, $path, $entity, $template = 'medium'){
//        if(in_array($disk, ['public'])){
//            //return route('imagecache', ['template' => $template, 'filename' => self::pathToLink($path)]);
            return self::getThumbLinkAttribute($disk, $path, $entity ,$template);
//        }else{
//            return self::get_default_image($template);
//        }

    }

    /**
     * @param $disk
     * @param $path
     * @param $entity
     * @param string $template
     * @param bool $flag
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function getThumbLinkAttribute($disk, $path, $entity, $template = 'medium', $flag = true){
//        \Log::info('Path: ' . $path);
        if($template == 'original'){
            $template = 'large';
        }

        try{
            $dir     = dirname($path);
            $file    = basename($path);
            $path_create = public_path('caches/'. $template . '/' . $dir);
            if(!\File::exists($path_create . '/' . $file)){
                if($flag){
                    \File::makeDirectory($path_create, $mode = 0777, true, true);
                }
                $cache   =  $path_create . '/' . $file;

                $defaultTemplateFilter = config('imagecache.templates.default.templates.medium');
                $templateFilter     = config('imagecache.templates.' . $entity . '.templates.' .$template, $defaultTemplateFilter);

                \Image::make(MyStorage::getDisk($disk)->readStream($path))->filter(new $templateFilter)->save($cache);
            }
            return url('/caches/' . $template . '/' . self::pathToLink($path)) . '?v=1.0';
        } catch (\Exception $ex){
//            \Log::error($ex->getMessage());
//            \Log::error($ex->getFile());
//            \Log::error($ex->getLine());
            return false;
        }
    }

    /**
     * Get default image for specific goal
     * @param string $template
     * @param string $image
     * @return string
     */
    public static function get_default_image($image = 'common.jpg'){
        //return route('imagecache', ['template' => $template, 'filename' => 'default/' . $image]);
        $default =   url('/default/'.config('app.id').'/'.$image);
        return $default;
    }


    /**
     * @todo finish it !!!
     * @param $disk
     * @param $path
     * @param $options
     * @return string
     */
    public static function get_document_download_link($disk, $path, $options){
        if(in_array($disk, ['public', 'tmp', 'local'])
            && isset($options['secure']) && $options['secure'] == true
            && isset($options['document_id'])) {
            $id = $options['document_id'];
            return route('api.document.download',
                ['id' => $id, 'token' => TimeLimitAccess::makeRequestToken($id, '10minutes')]);
        }
        return "";
    }

    /**
     * @todo finish it !!!
     * @param $disk
     * @param $path
     * @param $options
     * @return string
     */
       public static function get_image_blog_link($disk, $path, $template = 'original'){
        if(in_array($disk, ['blog'])){
            return route('imagecache', ['template' => $template, 'filename' => self::pathToLink($path)]);
        }
    }

    public static function pathToLink($path){
        return str_replace('\\', '/', $path);
    }

    /**
     * @param $disk
     * @param $path
     * @return bool
     */
    public static function removeFromDisk($disk, $path){
        $disk = self::getDisk($disk);
        if($disk->has($path) && $disk->get($path)->isFile()){
            return $disk->delete($path);
        }
        return true;
    }

    public static function defaultValidUploadFile(UploadedFile $file, $type){
        $return = ['valid' => false, 'message' => 'Error'];
        if(is_string($type) && in_array($type,['video', 'document', 'audio','image'])){
            $allowed_size = [config('flysystem.max_size.' . $type)];
            $allowed_ext = config('flysystem.exts.' . $type);
        }elseif(is_array($type)){
            if(empty($type['allowed_size'])){
                $allowed_size = [config('flysystem.max_upload_size')];
            }elseif(is_array($type['allowed_size'])){
                $allowed_size = $type['allowed_size'];
            }else{
                $allowed_size = [intval($type['allowed_size'])];
            }

            if(empty($type['allowed_ext'])){
                $allowed_ext = [config('flysystem.upload_exts_default')];
            }elseif(is_array($type['allowed_ext'])){
                $allowed_ext = $type['allowed_ext'];
            }else{
                $allowed_ext = explode(',',$type['allowed_ext']);
            }
        }else{
            return $return;
        }

        if(count($allowed_size) == 1){
            $min_size = 0;
            $max_size = $allowed_size[0];
        }else{
            $min_size = $allowed_size[0];
            $max_size = $allowed_size[1];
        }
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        if(!in_array(strtolower($ext), $allowed_ext)){
            $return['message'] = trans('validation.invalid_extension', ['exts' => implode(',', $allowed_ext)]);
            return $return;
        }
        if($size < $min_size || $size > $max_size){
            $return['message'] = trans_choice('validation.invalid_size',
                $min_size,
                ['min_size' => round($min_size/1024,3), 'max_size' => round($max_size/1024,3)]);
            return $return;
        }
        return ['valid' => true, 'message' => 'ok'];
    }

    public static function saveUploadedFile(UploadedFile $file, $disk_name, $file_path){
        $disk = self::getDisk($disk_name);
        return $disk->writeStream($file_path, fopen($file->getRealPath(), 'rb'));
    }


}
