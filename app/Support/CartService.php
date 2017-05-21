<?php namespace App\Support;

use Illuminate\Http\Request;
use Cookie;

class CartService
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function lists()
    {
        if (\Auth::check()) {
            return \App\Cart::where('user_id', \Auth::user()->id)->pluck('quantity', 'book_id');
        }
        return $this->request->cookie('cart');
    }

    public function sumBooks()
    {
        return count($this->lists());
    }

    public function details()
    {
        $results = [];

        if ($this->sumBooks() > 0)
        {
            foreach ($this->lists() as $id => $quantity)
            {
                $book = \App\Book::find($id);
                array_push($results, [
                    'id' => $book->id,
                    'detail' => $book->toArray(),
                    'quantity' => $quantity,
                    'subtotal' => $quantity * $book->price,
                ]);
            }
        }

        return $results;
    }

    public function totalPrice()
    {
        $result = 0;
        foreach ($this->details() as $order)
        {
            $result += $order['subtotal'];
        }

        return $result;
    }

    public function find($id)
    {
        foreach ($this->details() as $order)
        {
            if ($order['id'] == $id)  return $order;
        }  

        return null; 
    }

    public function merge()
    {
        $cart_cookie = $this->request->cookie('cart', []);

        foreach ($cart_cookie as $book_id => $quantity)
        {
            $cart =\App\Cart::firstOrNew(['book_id' => $book_id, 'user_id' => $this->request->user()->id]);
            $cart->quantity = $cart->quantity > 0 ? $cart->quantity : $quantity;
            $cart->save();
        }

        return Cookie::forget('cart');
    }


}