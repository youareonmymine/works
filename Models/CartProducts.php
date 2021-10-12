<?php

namespace stdsync\LaravelShop\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CartProducts
 * @package stdsync\LaravelShop\Models
 */
class CartProducts extends Model {
    protected $table = 'cart_products';

    public function data() {
        return $this->hasOne('stdsync\LaravelShop\Models\Products', 'id', 'product_id');
    }
}
