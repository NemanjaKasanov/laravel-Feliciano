<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Ingredient;
use App\Models\Nav;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\Extra;

class AdminController extends FirstController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data['user'] = $request->session()->get('user');
    }

    public function admin(Request $request)
    { // Dashboard - Home page for admin
        $this->data['active_orders'] = DB::select('SELECT COUNT(*) AS active_orders FROM orders WHERE active=1')[0]->active_orders;
        $this->data['inactive_orders'] = DB::select('SELECT COUNT(*) AS inactive_orders FROM orders WHERE active=0')[0]->inactive_orders;
        $this->data['all_orders'] = $this->data['active_orders'] + $this->data['inactive_orders'];
        $this->data['in_carts'] = DB::table('carts')->count();
        $this->data['all_users'] = DB::table('accounts')->count();
        $this->data['newest_users'] = Account::select('name', 'last_name', 'id', 'municipality')->orderBy('id', 'DESC')->limit(7)->get();
        $order_products = OrderProduct::with('order_data', 'price_data')->get();
        $current_orders_value = 0;
        foreach ($order_products as $el)
            // if($el->order_data->active == 1) $current_orders_value += $el->price_data->price;
            $current_orders_value += $el->price_data->price;
        $this->data['current_orders_value'] = $current_orders_value;
        $this->data['categories_popularity'] = Category::with('products')->get();

        return view('pages.admin.admin', $this->data);
    }

    // Show Admin Table Pages
    public function admin_accounts()
    {
        $this->data['table'] = Account::all();
        return view('pages.admin.accounts', $this->data);
    }
    public function admin_categories()
    {
        $this->data['table'] = Category::all();
        return view('pages.admin.categories', $this->data);
    }
    public function admin_extras()
    {
        $this->data['table'] = Extra::all();
        return view('pages.admin.extras', $this->data);
    }
    public function admin_ingredients()
    {
        $this->data['table'] = Ingredient::all();
        return view('pages.admin.ingredients', $this->data);
    }
    public function admin_products()
    {
        $this->data['table'] = Product::all();
        return view('pages.admin.products', $this->data);
    }
    public function admin_comments()
    {
        $this->data['table'] = Comment::all();
        return view('pages.admin.comments', $this->data);
    }
    public function admin_navs()
    {
        $this->data['table'] = Nav::all();
        return view('pages.admin.navs', $this->data);
    }

    // Update Data in Tables
    public function admin_accounts_update(Request $request)
    {
        Account::where('id', $request->get('user_id'))->update(['role' => $request->get('role')]);
        return redirect()->route('admin_accounts');
    }
    public function admin_categories_update(Request $request)
    {
        Category::where('id', $request->get('category_id'))->update(['name' => $request->get('name')]);
        return redirect()->route('admin_categories');
    }
    public function admin_extras_update(Request $request)
    {
        Extra::insert(['name' => $request->get('name')]);
        return redirect()->route('admin_extras');
    }
    public function admin_extras_delete(Request $request)
    {
        Extra::where('id', $request->get('extra_id'))->delete();
        return redirect()->route('admin_extras');
    }
    public function admin_ingredients_update(Request $request)
    {
        Ingredient::insert(['name' => $request->get('name')]);
        return redirect()->route('admin_ingredients');
    }
    public function admin_ingredients_delete(Request $request)
    {
        Ingredient::where('id', $request->get('ing_id'))->delete();
        return redirect()->route('admin_ingredients');
    }
    public function admin_comments_delete(Request $request)
    {
        Comment::where('id', $request->get('comment_id'))->delete();
        return redirect()->route('admin_comments');
    }
    public function admin_navs_update(Request $request)
    {
        Nav::where('id', $request->get('nav_id'))->update(['position' => $request->get('position')]);
        return redirect()->route('admin_navs');
    }
}
