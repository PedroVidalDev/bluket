<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use LDAP\Result;
use Psy\Util\Json;

class BluketController extends Controller
{
        public function index(){
        $products_mouse = Product::where([
            ['title', 'like', '%'."mouse".'%']
        ])->get();
    
        $products_keyboard = Product::where([
            ['title', 'like', '%'."keyboard".'%']
        ])->get();

        $user = auth()->user();

        return view("index", ['products_mouse' => $products_mouse, 'products_keyboard' => $products_keyboard, 'user' => $user]);
    }

    public function products(Request $request){
        $search = $request->search;

        if($search){
            $products = Product::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }

        else{
            $products = Product::all();
        }

        $user = auth()->user();

        return view('products', ['search' => $search, 'products' => $products, 'user' => $user]);
    }

    public function show($id){
        $product = Product::findOrFail($id);

        $user = auth()->user();

        return view('show', ['product' => $product, 'user' => $user]);
    }

    public function create(Request $request){
        $user = auth()->user();
        
        if(($user->id) == 1){
            return view('create', ['user' => $user]);
        }
        else{
            return redirect('/');
        }
    }

    public function insert(Request $request){
        $product = new Product;

        $product->title = $request->title;
        $product->price = $request->price;

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $product->image = $imageName;

        }


        $product->save();

        return redirect('/');
    }

    public function cart($id){
        $user = auth()->user();

        $cart = Cart::findOrFail($user->id);
        $actual_cart = json_decode($cart->items);

        if (in_array($id, $actual_cart)){

        }

        else{
            array_push($actual_cart, $id);
        }

        $cart->items = $actual_cart;
        $cart->save();

        return redirect('/products');
    }

    public function dashboard(){
        $user = auth()->user();

        $cart = Cart::findOrFail($user->id);

        $items = json_decode($cart->items);

        $products = Product::findOrFail($items);

        return view('/dashboard', ['products' => $products, 'user' => $user]);
    }

    public function remove($id){
        $user = auth()->user();

        $cart = Cart::findOrFail($user->id);

        $items = json_decode($cart->items);
        $key = array_search($id, $items);
        unset($items[$key]);

        $cart->items = $items;
        $cart->save();
        
        return redirect('/dashboard');
    }  

    public function delete($id){
        Product::findOrFail($id)->delete();

        return redirect('/products');
    }
}
