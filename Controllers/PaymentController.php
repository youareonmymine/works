<?php

namespace stdsync\LaravelShop\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

/**
 * Class PaymentController
 * @package stdsync\LaravelShop\Controllers
 */
class PaymentController extends Controller {
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $shop = App::make('Shop');
        return View::make('vendor/stdsync/laravel-shop/payment/index');
    }
}
