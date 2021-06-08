<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends FirstController
{
    public function __construct(Request $request){
        parent::__construct($request);
        $this->data['user'] = $request->session()->get('user');
    }

    public function admin(Request $request){ // Dashboard - Home page for admin
        $this->data['active_orders'] = DB::select('SELECT COUNT(*) AS active_orders FROM orders WHERE active=1')[0]->active_orders;
        $this->data['inactive_orders'] = DB::select('SELECT COUNT(*) AS inactive_orders FROM orders WHERE active=0')[0]->inactive_orders;
        $this->data['all_orders'] = $this->data['active_orders'] + $this->data['inactive_orders'];
        $this->data['in_carts'] = DB::table('carts')->count();
        $this->data['all_users'] = DB::table('accounts')->count();

//        dd($this->data);
        return view('pages.admin.admin', $this->data);
    }

    public function admin_accounts(Request $request){
        return view('pages.admin.accounts', $this->data);
    }
    public function admin_categories(Request $request){
        return view('pages.admin.categories', $this->data);
    }
    public function admin_extras(Request $request){
        return view('pages.admin.extras', $this->data);
    }
    public function admin_ingredients(Request $request){
        return view('pages.admin.ingredients', $this->data);
    }
    public function admin_products(Request $request){
        return view('pages.admin.products', $this->data);
    }
    public function admin_orders(Request $request){
        return view('pages.admin.orders', $this->data);
    }
    public function admin_comments(Request $request){
        return view('pages.admin.comments', $this->data);
    }
    public function admin_links(Request $request){
        return view('pages.admin.links', $this->data);
    }
    public function admin_navs(Request $request){
        return view('pages.admin.navs', $this->data);
    }
}
