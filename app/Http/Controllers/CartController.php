<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;

    public function __construct(\App\Support\CartService $cart)
    {
        $this->cart = $cart;
    }

    public function show()
    {
        return view('carts.index');
    }

    public function removeBook(Request $request, $id)
    {

        $book = $this->cart->find($id);
        if (!$book) redirect()->route('carts.show');

        if (\Auth::check()) {
            \App\Cart::where('book_id', $id)->delete();

            return redirect()->route('carts.show');

        } else {

            $cart = $request->cookie('cart', []);

            unset($cart[$id]);

            return redirect()->route('carts.show')->withCookie(cookie()->forever('cart', $cart));
        }        
    }

    public function addBook(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if (\Auth::check()) {
            $cart = \App\Cart::firstOrCreate(
                ['book_id' => $request->get('book_id'), 'user_id' => $request->user()->id],
                ['book_id' => $request->get('book_id'), 'user_id' => $request->user()->id, 'quantity' => $request->get('quantity')]);

            $cart->quantity += $request->get('quantity');
            $cart->save();

            return redirect()->route('carts.show');

        } else {

            $book = Book::find($request->get('book_id'));
            $quantity = $request->get('quantity');

            $cart = $request->cookie('cart', []);

            if (array_key_exists($book->id, $cart)) {
                $quantity += $cart[$book->id];
            }

            $cart[$book->id] = $quantity;
            
            return redirect()->back()
                            ->withCookie(cookie()->forever('cart', $cart));
        }
                        
    }

    public function changeQuantity(Request $request, $id)
    {
        $this->validate($request, ['quantity' => 'required|integer|min:1']);
        $quantity = $request->get('quantity');
        $book = $this->cart->find($id);

        if (!$book) return redirect()->route('carts.show');

        if (\Auth::check()) {
            $cart = \App\Cart::where('book_id', $id)->first();
            $cart['quantity'] = $quantity;
            $cart->save();

            return redirect()->back();
        } else {
            $cart = $request->cookie('cart', []);
            $cart[$id] = $quantity;

            return redirect()->route('carts.show')->withCookie(cookie()->forever('cart', $cart));

        }

          
    }
}
