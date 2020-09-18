<?php

namespace App\Models;

use App\Core\MyStorage;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $alt
 * @property string $disk
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $entity
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereEntity($value)
 */
class Image extends Model
{
    protected $guarded = ['id'];


    /**
     * @param string $entity
     * @return \Illuminate\Config\Repository|mixed
     * @desc: Lấy folder root lưu ảnh của đối tượng tương ứng
     */
    public static function getEntity($entity = 'default'){
        return  config('imagecache.templates.' . $entity. '.entity', 'default');
    }

    public function getImageSrc($template){
        $imageSrc = MyStorage::get_image_link($this->disk, $this->path, $this->entity, $template);
        return $imageSrc;
    }

    /**
     * @return string
     */
    public function deleteUrl(){
        return route('backend.api.image.delete', ['id' => $this->id]);
    }
}
