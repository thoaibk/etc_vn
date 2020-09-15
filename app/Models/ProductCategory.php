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

    public function statusLable(){
        return ($this->status === self::STATUS_ACTIVE) ? 'Đang active' : 'Đang tắt';
    }

    public function statusStateIcon(){
        return ($this->status === self::STATUS_ACTIVE) ? 'text-info fa-2x fas fa-toggle-on' : 'text-secondary fa-2x fal fa-toggle-off';
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
}
