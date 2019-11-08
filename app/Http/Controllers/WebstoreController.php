<?php
namespace App\Http\Controllers;
use App\Product;
use Cart;
class WebstoreController extends Controller
{
    public function index()
    {
        # We pass all the products from the database into
        # the $products variable, which is an array
        $products = Product::all();
        # We use the home view for the tutorial, but you could
        # use other views too. Home will be our webstore view
        return view('home')->with('products', $products);
    }
    # Our function for adding a certain product to the cart
    public function addToCart(Product $product)
    {   
        Cart::add($product->id, $product->name, 1, $product->price);
       
        return redirect('/home')->withSuccess("Anadido a $product->name a tu carrito");
    }
    # Our function for removing a certain product from the cart
    public function removeProductFromCart($productId)
    {   
         $existe = Cart::content()->search(function ($cartItem, $productId)  {
             return $cartItem->rowId === $productId;
        });
        if($existe) {
            Cart::remove($productId);
            // return redirect('/home');
        } 
        return view('vacio');
        
    }
    # Our function for clearing all items from our cart
    public function destroyCart()
    {
        Cart::destroy();
        return redirect('/home');
    }
}