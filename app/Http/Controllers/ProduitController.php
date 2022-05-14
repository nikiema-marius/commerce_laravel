<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProduitController extends Controller
{
    public function ajouterproduit(){
        $categories = Category::All()->pluck('nom_categorie','nom_categorie'); //pour selectionner le nom de toutes les categories
        return view('admin.ajouterproduit')->with('categories',$categories);
    }

    public function sauverproduit(Request $request){
        $this->validate($request, ['Product_categorie' =>'required',
                        'product_name' =>'required',
                        'product_price' =>'required',
                        'product_image' =>'image|nullable|max:1999']);
            if($request->hasFile('product_image')){
                //1: prendre le nom du file avec son extension
                $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
                //2: prendre le nom du file
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //3: prendre juste l'extension
                $extension = $request->file('product_image')->getClientOriginalExtension();
                //4: le nom a sauvegarder dans la  base de donnees 
                $fileNameStore = $fileName.'_'.time().'.'.$extension;
                //5: teelechager l'image reel dans un dossier 
                $path = $request->file('product_image')->storeAS('public/produit_images', $fileNameStore);

            }
            else{
                $fileNameStore = 'monimage.jpg';
            }

            $product = new Product();
            $product->nom_produit = $request->input('product_name');
            $product->prix_produit = $request->input('product_price');
            $product->categorie_produit = $request->input('Product_categorie');
            $product->produit_image = $fileNameStore;
            $product->status = 1;
            $product->save();
            return redirect('/ajouterproduit')->with('status','le produit '.$product->categorie_produit.'a ete modifier avec succes');  
            
    }

    public function produit(){
        $produits = Product::get();
        return view('admin.produit')->with('produits',$produits,);
    }


    public function modifier_produit($id){
        $produits = Product::find($id);
        $categories = Category::All()->pluck('nom_categorie','nom_categorie'); //pour selectionner le nom de toutes les categories
        return view('admin.modifier_produit')->with('produits',$produits)->with('categories',$categories);
    }

    public function modifierproduit(Request $request)
    {
        $this->validate($request, ['Product_categorie' =>'required',
                                    'product_name' =>'required',
                                    'product_price' =>'required',
                                    'product_image' =>'image|nullable|max:1999']);
                        
                            $product = Product::find($request->input('id'));
                            $product->nom_produit = $request->input('product_name');
                            $product->prix_produit = $request->input('product_price');
                            $product->categorie_produit = $request->input('Product_categorie');
                            //$product->produit_image = $fileNameStore;

                          if($request->hasFile('product_image')){
                                //1: prendre le nom du file avec son extension
                                $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
                                //2: prendre le nom du file
                                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                                //3: prendre juste l'extension
                                $extension = $request->file('product_image')->getClientOriginalExtension();
                                //4: le nom a sauvegarder dans la  base de donnees 
                                $fileNameStore = $fileName.'_'.time().'.'.$extension;
                                //5: telechager l'image reel dans un dossier 
                                $path = $request->file('product_image')->storeAS('public/produit_images', $fileNameStore);

                               if ($product->produit_image != 'monimage.jpg')
                                {
                                   Storage::delete('public/produit_images/'.$product->produit_image);
                                }

                               $product->produit_image = $fileNameStore;

                              }
                             
                             $product->update();

                    return redirect('/produit')->with('status','le produit '.$product->nom_produit.'a ete Modifier avec succes');
                }


    public function supprimerproduit($id){
            $product = Product::find($id);
             // print($product->produit_image);

            if ($product->produit_image != 'monimage.jpg')
            {
               Storage::delete('public/produit_images/'.$product->produit_image);
            }
            
             $product->delete();

            return redirect('/produit')->with('status','le produit '.$product->nom_produit.'a ete Supprimer avec succes');
       
      }

      public function activer_produit($id){
          $product = Product::find($id);

          $product->status = 1;

          $product->update();
          return redirect('/produit')->with('status','le produit '.$product->nom_produit.'a ete activer avec succes');

      }

      public function desactiver_produit($id){
        $product = Product::find($id);

        $product->status = 0;

        $product->update();
        return redirect('/produit')->with('status','le produit '.$product->nom_produit.'a ete desactiver avec succes');

    }
}