<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




use Stripe;
use Stripe\Charge;




class HomeController extends Controller
{

    /**
     * redirect
     */
    public function redirect()
    {
        
        $usertype = Auth::user()->usertype;
        $product = product::all();
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('home.userpage', compact('product'));
        }
    }
    /**
     * index.
     */
    public function index()
    {
        $product = Product::all(); // Paginate with 10 items per page

        return view('home.userpage', compact('product'));
    }


    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
        

    }
    /**
     * product_details.
     */
    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }


    /**
     * add_cart.
     */
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->price = $product->price  * $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    /**
     * show_cart.
     */
    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }
    /**
     * delete_cart.
     */
    public function delete_cart($id)
    {

        
        return redirect()->back();
    }

    /**
     * cash_order.
     */
    public function cash_order()
    {
        
    
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data)
         {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status='cash on delivery';
            $order->delivery_status='proccessing';
            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        } 
        return redirect()->back();
    }
    public function stripe($totalprice){
return view('home.stripe',compact('totalprice'));
    }


    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from tutsmake.com." 
        ]);
  
        Session::flash('success','Payment successful!');
          
        return back();
    }



public function contact(){
    return view('home.contact');
}



}