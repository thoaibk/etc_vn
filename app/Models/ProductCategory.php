<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $parent_id
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereParentId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|ProductCategory[] $childs
 * @property-read int|null $childs_count
 * @property-read ProductCategory|null $parent
 */
class ProductCategory extends Model
{
    use Sluggable;

    protected $table = 'product_categories';

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
    public function parent(){
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs(){
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }

    public static function categoryAvailable(){
        return self::query()
            ->whereNull('parent_id')
            ->where('status', self::STATUS_ACTIVE)
            ->get();
    }

    public function statusLable(){
        return ($this->status === self::STATUS_ACTIVE) ? 'Đang active' : 'Đang tắt';
    }

    public function statusStateIcon(){
        return ($this->status === self::STATUS_ACTIVE) ? 'text-info fa-2x fas fa-toggle-on' : 'text-secondary fa-2x fal fa-toggle-off';
    }

    public static function rootCategories($excludeID = null){

        $query = self::query()
            ->whereNull('parent_id');

        if($excludeID != null){
            $query = $query->where('id', '<>', $excludeID);
        }
        return $query->get()->mapWithKeys(function ($item){
            return [$item->id => $item->name];
        })->toArray();
    }


    public function getCacheProducts(){
        $rememberSecond = 60*60*24;
        $products = \Cache::remember('cate_' . $this->id, $rememberSecond, function (){
            return \DB::table('products')
                ->where('category_id', $this->id)
                ->where('status', Product::STATUS_ACTIVE)
                ->limit(6)
                ->get(['id', 'name', 'slug', 'image_id']);
        });

        return $products;
    }


    /**
     * @return string
     */
    public function editUrl(){
        return route('backend.product_category.edit', ['id' => $this->id]);
    }

    /**
     * @return string
     */
    public function toggleStatusUrl(){
        return route('backend.product_category.toggle_status', ['id' => $this->id]);
    }
    /**
     * @return string
     */
    public function deleteUrl(){
        return route('backend.product_category.destroy', ['id' => $this->id]);
    }

    public function publicUrl(){
        return route('product.category', ['id' => $this->id, 'slug' => $this->slug]);
    }
}
