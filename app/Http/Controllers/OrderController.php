<?php

namespace App\Http\Controllers;

use App\Models\CartExtra;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderExtra;
use App\Models\Cart;
use App\Models\Extra;

class OrderController extends FirstController
{
    public $userId;
    public function __construct(Request $request){
        parent::__construct($request);
        if($request->session()->has('user'))
            $this->userId = $request->session()->get('user')->id;
    }

    public function order(){
        $this->data['cart_products'] = Cart::where('user', $this->userId)->with('productObj', 'priceObj', 'extras')->get();
        $this->data['total'] = 0;
        foreach($this->data['cart_products'] as $el) $this->data['total'] += $el->priceObj->price;
        return view('pages.order', $this->data);
    }

    public function submitOrderSuccess(){
        return view('pages.order_submitted', $this->data);
    }

    public function orders(){
        $this->data['orders'] = Order::where('active', '1')->orderBy('time', 'DESC')->with('order_user', 'products')->get();
        $this->data['products'] = OrderProduct::with('product_data', 'price_data', 'order', 'extras')->get();
        return view('pages.orders', $this->data);
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

    public function submitOrder(Request $request){
        $user = $request->session()->get('user')->id;
        $orders = Cart::where('user', $this->userId)->with('productObj', 'priceObj', 'extras')->get();

        if(count($orders) < 1) return redirect()->route('order');

        try{
            $order_id = Order::insertGetId(['user' => $user]);
            foreach($orders as $el){
                $product_id = OrderProduct::insertGetId([
                    'order' => $order_id,
                    'product' => $el->product,
                    'price' => $el->price
                ]);
                foreach($el->extras as $extra){
                    OrderExtra::insert([
                        'order' => $product_id,
                        'extra' => $extra->id
                    ]);
                }
            }

            $carts = Cart::where('user', $this->userId)->get();
            foreach($carts as $el){
                foreach($el->extras as $x){
                    CartExtra::where('cart', $el->id)->delete();
                }
                Cart::where('id', $el->id)->delete();
            }

            return redirect()->route('submitOrderSuccess');
        }
        catch (\Exception $e){
            return redirect()->route('error');
        }
    }

    public function shipOrRefuseOrder(Request $request){
        if($request->submit == 1){
            Order::where('id', $request->order)->update(['active' => 0]);
            return redirect()->route('orders');
        }
        else if($request->submit == 2){
            Order::where('id', $request->order)->delete();
            return redirect()->route('orders');
        }
        else{
            return redirect()->route('error');
        }
    }
}
