<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   public function ajoutercategorie(){
       return view ('admin.AjouterCategorie');
   }

   public function sauvercategorie(Request $request){
       
       $categorie = new Category;
       $this->validate($request, ['categorie_name' => 'required|unique:categories,nom_categorie']);

    $categorie->nom_categorie = $request->input('categorie_name');

    $categorie->save();

    return redirect('/ajoutercategorie')->with('status','la categorie '.$categorie->nom_categorie.'a ete ajoute avec succes');

   }

   public function categories(){
       $categories = Category::get();
       return view('admin.categories')->with('categories',$categories);
   }

   public function modifier_categorie($id){
       $categorie = Category::find($id);
       return view('admin.modifier_categorie')->with('categorie',$categorie);
   }

   public function modifiercategorie(Request $request){
   
    $categorie =Category::find($request->input('id'));
    $this->validate($request, ['categorie_name' => 'required|unique:categories,nom_categorie']);

    $categorie->nom_categorie = $request->input('categorie_name');

    $categorie->update();

    return redirect('/categories')->with('status','la categorie '.$categorie->nom_categorie.'a ete modifier avec succes');  
   }

   public function supprimercategorie($id){
    $categorie =Category::find($id);
    $categorie->delete();
    return redirect('/categories')->with('status','la categorie '.$categorie->nom_categorie.'a ete Supprimer avec succes');  
   }

}
