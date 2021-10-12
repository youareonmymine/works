<?php

namespace stdsync\LaravelShop\Controllers;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use View;

/**
 * Class CartController
 * @package stdsync\LaravelShop\Controllers
 */
class CartController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index() {
        $shop = App::make('Shop');
        $cart = $shop->getCart()->getCartModel();
        $cartAmount = $shop->getCart()->getAmount();
        $products = $shop->getCart()->getProducts();
        $shippingCosts = $shop->getHelper('shipping')->calc($cart->products->count());

        return View::make('vendor/stdsync/laravel-shop/cart/index', [
            'cart_amount' => $cartAmount,
            'products' => $products,
            'cart' => $cart,
            'shipping_costs' => $shippingCosts
        ]);
    }

    /**
     * @return string
     */
    public function add() {
        $response = [];
        $productId = Request::get('product_id', null);
        if(null !== $productId) {
            $shop = App::make('Shop');
            //check if product exists
            if($shop->getCart()->hasProduct($productId)) {
                $shop->getCart()->addAmount($productId, 1);
            }
            else {
                $shop->getCart()->addProduct($productId);
            }
            $response['cart_update'] = true;
            $response['cart_amount'] = $shop->getCart()->getAmount();
            $response['error'] = false;
        }
        else {
            $response['error'] = true;
        }

        return response()->json($response);
    }

    /**
     * @return string
     */
    public function remove() {
        $response = [];
        $productId = Request::get('product_id', null);
        if(null !== $productId) {
            $shop = App::make('Shop');
            $shop->getCart()->removeProduct($productId);
            $response['cart_update'] = true;
            $response['cart_amount'] = $shop->getCart()->getAmount();
            $response['error'] = false;
        }
        else {
            $response['error'] = true;
        }

        return response()->json($response);
    }

    /**
     * @return string
     */
    public function update() {
        $response = [];
        $productId = Request::get('product_id', null);
        $amount = Request::get('amount', 1);
        if(null !== $productId) {
            $shop = App::make('Shop');
            $shop->getCart()->updateAmount($productId, $amount);
            $response['cart_update'] = true;
            $response['cart_amount'] = $shop->getCart()->getAmount();
            $response['error'] = false;
        }
        else {
            $response['error'] = true;
        }

        return response()->json($response);
    }
}
