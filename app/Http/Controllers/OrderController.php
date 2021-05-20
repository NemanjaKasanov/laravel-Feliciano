<?php

namespace App\Http\Controllers;

use App\Models\CartExtra;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderExtra;
use App\Models\Cart;

class OrderController extends FirstController
{
    public $userId;
    public function __construct(Request $request){
        parent::__construct($request);
        $this->userId = $request->session()->get('user')->id;
    }

    public function order(){
        $this->data['cart_products'] = Cart::where('user', $this->userId)->with('productObj', 'priceObj', 'extras')->get();
        $this->data['total'] = 0;
        foreach($this->data['cart_products'] as $el) $this->data['total'] += $el->priceObj->price;
//        dd($this->data['cart_products']);
        return view('pages.order', $this->data);
    }

    public function insertIntoCart(Request $request){
        $product = $request->product;
        $price = $request->price;
        $extras = $request->extras;

        try{
            $cart_id = Cart::insertGetId([
                'user' => $this->userId,
                'product' => $product,
                'price' => $price
            ]);

            if($extras){
                foreach($extras as $extra){
                    CartExtra::insert([
                        'cart' => $cart_id,
                        'extra' => $extra
                    ]);
                }
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

        return response()->json(1);
    }

    public function getItemsInCartNumber(Request $request){
        $number = Cart::where('user', $this->userId)->count();
        return response()->json($number);
    }

    public function deleteSelectedOrder(Request $request){
        Cart::where('id', $request->id)->delete();
        CartExtra::where('cart', $request->id)->delete();
        return redirect()->route('order');
    }
}
