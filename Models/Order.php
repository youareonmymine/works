<?php

namespace stdsync\LaravelShop\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package stdsync\LaravelShop\Models
 */
class Order extends Model {

    /**
     * @var string
     */
    protected $table = 'order';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail() {
        return $this->hasOne('stdsync\LaravelShop\Models\OrderDetail', 'id', 'detail_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany('stdsync\LaravelShop\Models\OrderProducts', 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer() {
        return $this->hasOne('stdsync\LaravelShop\Models\OrderCustomer', 'id', 'customer_id');
    }
}
