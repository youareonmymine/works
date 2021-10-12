<?php

namespace stdsync\LaravelShop\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProducts
 * @package stdsync\LaravelShop\Models
 */
class OrderProducts extends Model {

    /**
     * @var string
     */
    protected $table = 'order_products';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail() {
        return $this->hasOne('stdsync\LaravelShop\Models\Products', 'id', 'product_id');
    }
}
