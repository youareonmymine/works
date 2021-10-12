<?php

namespace stdsync\LaravelShop\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * @package stdsync\LaravelShop\Models
 */
class Cart extends Model {
    protected $table = 'cart';

    public function products() {
        return $this->hasMany('stdsync\LaravelShop\Models\CartProducts', 'cart_id', 'id');
    }
}
