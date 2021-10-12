<?php

namespace stdsync\LaravelShop\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use stdsync\LaravelShop\Models\Products;
use View;

/**
 * Class ProductController
 * @package stdsync\LaravelShop\Controllers
 */
class ProductController extends Controller {
    /**
     * @param int $productId
     * @return \Illuminate\Contracts\View\View
     */
    public function index($productId) {
        $shop = App::make('Shop');
        $product = $shop->getProducts()->getOne($productId);
        $cartAmount = $shop->getCart()->getAmount();
        
        return View::make('vendor/stdsync/laravel-shop/product/index', [
            'product' => $product,
            'cart_amount' => $cartAmount
        ]);
    }
}
