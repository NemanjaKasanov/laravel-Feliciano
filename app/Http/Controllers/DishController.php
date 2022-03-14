<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPriceRequest;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\ChangeProductRequest;
use Illuminate\Support\Facades\File;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Like;
use App\Models\OrderProduct;
use App\Models\Price;
use App\Models\ProductsExtra;
use App\Models\ProductsIngredient;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Ingredient;
use App\Models\Extra;

class DishController extends FirstController
{
    public function index(){
        $this->data['categories'] = Category::getCategories();
        $this->data['breakfast'] = Product::getBreakfastDishes();
        return view('pages.dishes', $this->data);
    }

    public function dish(Product $product){
        $this->data['product'] = Product::where('id', $product->id)->with('category_name', 'ingredients', 'prices', 'extras')->first();
        $this->data['first_price'] = Price::where('product', $product->id)->first();
        return view('pages.dish', $this->data);
    }

    public function changeProductForm(Product $product){
        $this->data['product'] = Product::where('id', $product->id)->with('category_name', 'ingredients', 'prices', 'extras')->first();
        $this->data['categories'] = Category::getCategories();
        $this->data['ingredients'] = Ingredient::all();
        $this->data['extras'] = Extra::all();
        $this->data['ingredients_selected'] = [];
        $this->data['extras_selected'] = [];
        $ingredients = ProductsIngredient::where('product', $product->id)->get();
        $extras = ProductsExtra::where('product', $product->id)->get();
        foreach($ingredients as $el){ array_push($this->data['ingredients_selected'], $el->ingredient); }
        foreach($extras as $el){ array_push($this->data['extras_selected'], $el->extra); }
        return view('pages.change_product', $this->data);
    }

    public function addProductForm(){
        $this->data['categories'] = Category::getCategories();
        $this->data['ingredients'] = Ingredient::all();
        $this->data['extras'] = Extra::all();
        return view('pages.add_product', $this->data);
    }

    public function search(Request $request){
        $category = $request->category;
        $search = $request->search;

        $products = Product::with('category_name', 'ingredients');
        $products = $products->where('category', $category);
        if($search != ''){
            $products = $products->where('name', 'like', '%'.$search.'%');
        }
        $products = $products->get();

        return response()->json($products);
    }

    public function getPrice(Request $request){
        $id = $request->id;
        $price = Price::where('id', $id)->first()->price;
        return response()->json($price);
    }

    public function likeProduct(Request $request){
        $product = $request->product;
        $user = $request->session()->get('user')->id;

        try{
            $check = Like::where('product', $product)->where('user', $user)->first();
            if(!$check) Like::insert(['product' => $product, 'user' => $user]);
            else Like::where('product', $product)->where('user', $user)->delete();
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

        return response()->json([
            'product' => $product,
            'user' => $user,
            'check' => $check
        ]);
    }

    public function getLikesNumber(Request $request){
        $product = $request->product;
        try{
            $number = Like::where('product', $product)->count();
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        return response()->json($number);
    }

    public function commentProduct(Request $request){
        $product = $request->product;
        $comment = $request->comment;
        $user = $request->session()->get('user')->id;
        try{
            if($comment != '') Comment::insert(['product' => $product, 'user' => $user, 'content' => $comment]);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        return response()->json(1);
    }

    public function getProductComments(Request $request){
        $product = $request->product;
        try{
            $comments = Comment::where('product', $product)->orderBy('id', 'DESC')->with('user')->get();
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        return response()->json($comments);
    }

    public function deleteProduct(Request $request){
        try{
            $id = $request->product;
            $image = Product::where('id', $id)->first()->image;

            Comment::where('product', $id)->delete();
            Like::where('product', $id)->delete();
            Price::where('product', $id)->delete();
            ProductsIngredient::where('product', $id)->delete();
            ProductsExtra::where('product', $id)->delete();
            Cart::where('product', $id)->delete();
            OrderProduct::where('product', $id)->delete();
            Product::where('id', $id)->delete();
            File::delete(public_path('assets/img/'.$image));
        }
        catch(\Exception $e){
            return redirect()->route('error');
        }
        return redirect()->route('dishes');
    }

    public function addProduct(AddProductRequest $request){
        $validated = $request->validated();
        try{
            //Insert Product
            $id = Product::insertGetId([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'image' => $request->file('image')->getClientOriginalName(),
                'category' => $validated['category'],
                'time_to_make' => $validated['time_to_make']
            ]);

            // Image Upload
            $image_name = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('img', $image_name, 'upload_image');

            // Insert Product Ingredients
            foreach($validated['ingredients'] as $el) {
                ProductsIngredient::insert([
                    'product' => $id,
                    'ingredient' => $el
                ]);
            }

            // Insert Product Extras
            if(isset($validated['extras'])){
                foreach($validated['extras'] as $el){
                    ProductsExtra::insert([
                        'product' => $id,
                        'extra' => $el
                    ]);
                }
            }

            return redirect()->route('dish', ['product' => $id]);
        }
        catch(\Exception $e){
            return redirect()->route('error');
        }
    }

    public function changeProduct(ChangeProductRequest $request){
        $validated = $request->validated();
        try{
            $id = $validated['id'];
            ProductsIngredient::where('product', $id)->delete();
            ProductsExtra::where('product', $id)->delete();

            Product::where('id', $id)->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'category' => $validated['category'],
                'time_to_make' => $validated['time_to_make']
            ]);

            if($request->image){
                $image = Product::where('id', $id)->first()->image;
                File::delete(public_path('assets/img/'.$image));
                $image_name = $request->file('image')->getClientOriginalName();
                $request->image->storeAs('img', $image_name, 'upload_image');
                Product::where('id', $id)->update([
                    'image' => $request->file('image')->getClientOriginalName(),
                ]);
            }

            foreach($validated['ingredients'] as $el) {
                ProductsIngredient::insert([
                    'product' => $id,
                    'ingredient' => $el
                ]);
            }

            if(isset($validated['extras'])){
                foreach($validated['extras'] as $el){
                    ProductsExtra::insert([
                        'product' => $id,
                        'extra' => $el
                    ]);
                }
            }

            return redirect()->route('dish', ['product' => $id]);
        }
        catch(\Exception $e){
            return redirect()->route('error');
        }

    }

    public function addPrice(AddPriceRequest $request){
        $validated = $request->validated();
        Price::insert([
            'product' => $validated['product'],
            'quantity' => $validated['quantity'],
            'price' => $validated['price']
        ]);
        return redirect()->route('dish', ['product' => $validated['product']]);
    }

    public function deletePrice(Request $request){
        Price::where('id', $request->id)->delete();
        return redirect()->route('dish', ['product' => $request->product]);
    }
}
