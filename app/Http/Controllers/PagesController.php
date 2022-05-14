<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\Illuminate\Support\Facades\DB;
use App\Http\Controllers\PagesController;
use Session;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\cart;


class PagesController extends Controller
{
    //
    public function home() {
      // return "<h1>Bienvenue dans la page apropos </h1>";
        $slider = Slider::where('status',1)->get();
        $produit = Product::where('status',1)->get();
        return view('client.home')->with('slider',$slider)->with('produit',$produit);
   }


   public function shop() {
      $slider = Slider::where('status',1)->get();
       $produit = Product::where('status',1)->get();
       $categories = Category::get();
        // return "<h1>Bienvenue dans la page apropos </h1>";
          return view('client.shop')->with('slider',$slider)->with('produit',$produit)->with('categories',$categories);
     }

     public function select_par_cat($name){
        //$slider = Slider::where('status',1)->get();
        $categories = Category::get();
        $produit = Product::where('categorie_produit',$name)->where('status',1)->get();
        $nombre = 1;

        return view('client.shop')->with('produit',$produit)->with('categories',$categories)->with('nombre',$nombre);
     }

     public function ajouter_panier($id){

      $produit = Product::find($id);

      $oldCart = Session::has('cart')? Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->add($produit,$id);
      Session::put('cart', $cart);

      // dd(Session::get('cart'));
     return redirect('/shop');

     }
   
     public function panier() {
      // dd(Session::get('cart'));
       if(!Session::has('cart')){
            
          return view('client.cart');
         }

          $oldCart = Session::has('cart')? Session::get('cart'):null;
          $cart = new Cart($oldCart);
         // dd($cart->$product_id);
         dd($cart->items[15]['product_id']);

         // return view('client.cart',['products' => $cart->items[28]]);
         
      }

   
     public function client_login(){
      return view('client.login');
  }

  
  public function paiement(){
      return view('client.register');
  }
  
  
  public function register(){
      return view('client.checkout');
  }
  public function signup(){
    return view('client.signup');
}
  

  




}
