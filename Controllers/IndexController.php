<?php

namespace stdsync\LaravelShop\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

/**
 * Class IndexController
 * @package stdsync\LaravelShop\Controllers
 */
class IndexController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $shop = App::make('Shop');
        $products = $shop->getProducts()->getAll();
        $cartAmount = $shop->getCart()->getAmount();
        
        return View::make('vendor/stdsync/laravel-shop/index', [
            'products' => $products,
            'cart_amount' => $cartAmount
        ]);
    }
}
