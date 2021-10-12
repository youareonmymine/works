<?php

namespace stdsync\LaravelShop\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderCustomer
 * @package stdsync\LaravelShop\Models
 */
class OrderCustomer extends Model {

    /**
     * @var string
     */
    protected $table = 'order_customer';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details() {
        return $this->hasMany('stdsync\LaravelShop\Models\OrderDetails', 'order_id', 'id');
    }
}
