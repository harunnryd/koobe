<?php namespace App\Http\ViewComposers;

class CartComposer
{

    protected $cart;

    public function __construct(\App\Support\CartService $cart)
    {
        $this->cart = $cart;
    }

    public function compose(\Illuminate\Contracts\View\View $view)
    {
        $view->with('cart', $this->cart);
    }
}