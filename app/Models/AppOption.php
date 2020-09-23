<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AppOption
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppOption whereValue($value)
 * @mixin \Eloquent
 */
class AppOption extends Model
{
    protected $table = 'app_options';
    protected $guarded = ['id'];

    const APP_MENU = 'app_menu';

}
