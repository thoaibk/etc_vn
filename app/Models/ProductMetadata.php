<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductMetadata
 *
 * @property int $id
 * @property int $product_id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMetadata whereValue($value)
 * @mixin \Eloquent
 */
class ProductMetadata extends Model
{
    protected $table = 'product_metadatas';
    protected $guarded = ['id'];

}
