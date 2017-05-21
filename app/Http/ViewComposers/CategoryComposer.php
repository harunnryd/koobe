<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Support\CartService;

class CategoryComposer
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function compose(View $view)
    {
        $view->with('cart', $this->cart);
    }
}