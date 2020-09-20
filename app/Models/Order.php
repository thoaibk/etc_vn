<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string|null $address
 * @property string|null $note
 * @property int $status
 * @property string|null $process_note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProcessNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $order_items
 * @property-read int|null $order_items_count
 * @property string $hash
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereHash($value)
 */
class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = ['id'];

    const STATUS_NEW = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_CANCELLED = -1;
    const STATUS_PROCESSING = 2;



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_items(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function hashUrl(){
        return route('cart.order_success', ['hash' => $this->hash]);
    }


    /**
     * @return float|int
     */
    public function amount(){
        $amount = 0;
        foreach ($this->order_items as $order_item){
            $amount += $order_item->total();
        }

        return $amount;
    }

    public function statusLable(){
        $statuses = [
            self::STATUS_NEW => 'Đơn mới',
            self::STATUS_SUCCESS => 'Thành công',
            self::STATUS_CANCELLED => 'Đã hủy',
            self::STATUS_PROCESSING => 'Đang xử lý'
        ];

        return isset($statuses[$this->status]) ? $statuses[$this->status] : 'Unknow';
    }
}
