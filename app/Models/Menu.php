<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string|null $refer_model
 * @property int|null $refer_id
 * @property string|null $custom_link
 * @property int|null $parent_id
 * @property int $index
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCustomLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereReferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereReferModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    protected $table = 'menus';


}
