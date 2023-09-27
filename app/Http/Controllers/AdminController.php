<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    /**
     * view_category.
     */
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category',compact("data"));
    }

    /**
     * add_category
     */
    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category added successfully');
    }

    /**
     * view_product.
     */ 
    public function view_product()
    {
       $category = Category::all();
        return view('admin.product',compact('category'));
    }
   
     /**
     * add product.
     */

    public function add_product(Request $request)
    {
       
               $product = new product;
               $product->title = $request->title;
               $product->description = $request->description;
               $product->price = $request->price;
               $product->quantity = $request->quantity;
               $product->discount_price = $request->discount_price;
               $product->category=$request->category;

               $image = $request->image;
               $imagename = time() . '.' . $image->getClientOriginalExtension();
               $request->image->move('product', $imagename);
               $product->image=$imagename;
               $product->save();
               return redirect()->back();
    }
      /**
     * show product.
     */

     public function show_product()
     {
        $product = product::all();
        return view('admin.show_product',compact('product'));
     }
 /**
     * edit product.
     */
public function edit_product($id)
{
$category = Category::all();
$product = product::find($id);
return view('admin.edit_product',compact('product','category'));
}
     
 /**
     * update product.
     */
    public function update_product(Request $request ,$id)
    {
        $product = product::find($id);
               $product->title = $request->title;
               $product->description = $request->description;
               $product->price = $request->price;
               $product->quantity = $request->quantity;
               $product->discount_price = $request->discount_price;
               $product->category=$request->category;

               $image = $request->image;
               $imagename = time() . '.' . $image->getClientOriginalExtension();
               $request->image->move('product', $imagename);
               $product->image=$imagename;
               $product->save();
               return redirect()->back();
    }
    
    
    /**
     * Delete product.
     */
    public function delete_product($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'product deteted successfully');
    }

    /**
     * Remove the resource from storage.
     */
    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deteted successfully');
    }
}
