<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $name
 * @property string $slug
 * @property int|null $category_id
 * @property int|null $origin_price
 * @property int|null $price
 * @property string $content
 * @property string|null $picture
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOriginPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImageId($value)
 */
class Product extends Model
{
    use Sluggable;
    protected $table = 'products';
    protected $guarded = ['id'];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metadatas(){
        return $this->hasMany(ProductMetadata::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image(){
        return $this->belongsTo(Image::class, 'image_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function images(){
        return $this->belongsToMany(Image::class, 'product_has_images', 'product_id', 'image_id');
    }

    public function thumb($template = 'small'){
        $defautImage = 'assets/img/no-image.jpg';
        if($this->image){
            return $this->image->getImageSrc($template);
        }
        return $defautImage;
    }

    public function statusStateIcon(){
        return ($this->status === self::STATUS_ACTIVE) ? 'text-info fa-2x fas fa-toggle-on' : 'text-secondary fa-2x fal fa-toggle-off';
    }

    public function statusLable(){
        return ($this->status === self::STATUS_ACTIVE) ? 'Đang active' : 'Đang tắt';
    }


    /**
     * @return string
     */
    public function toggleStatusUrl(){
        return route('backend.product.toggle_status', ['id' => $this->id]);
    }

    /**
     * @return string
     */
    public function deleteUrl(){
        return route('backend.product.destroy', ['id' => $this->id]);
    }

    public function publicUrl(){
        return route('product.detail', ['slug' => $this->slug]);
    }

    public function getTitle(){
        return !empty($this->seo_title) ? $this->seo_title : $this->name;
    }

    public function getDescription(){
        return !empty($this->seo_description) ? $this->seo_description : Str::words(strip_tags($this->content), 65);
    }

    public function getKeywords(){
        return $this->seo_keywords;
    }
}
