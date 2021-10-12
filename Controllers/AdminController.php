<?php

namespace stdsync\LaravelShop\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

/**
 * Class AdminController
 * @package stdsync\LaravelShop\Controllers
 */
class AdminController extends Controller {
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $shop = App::make('Shop');
        $orders = $shop->getAdmin()->getOrders();
        return View::make('vendor/stdsync/laravel-shop/admin/index', [
            'orders' => $orders
        ]);
    }

    /**
     * @param $orderId
     * @return \Illuminate\Contracts\View\View
     */
    public function order($orderId) {
        $shop = App::make('Shop');
        $order = $shop->getAdmin()->getOrder($orderId);
        $shippingCosts = $shop->getHelper('shipping')->calc($order->products->count());
        return View::make('vendor/stdsync/laravel-shop/admin/order/index',[
            'order' => $order,
            'shipping_costs' => $shippingCosts
        ]);
    }
}
