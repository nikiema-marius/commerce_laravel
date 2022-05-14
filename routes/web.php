<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 /*Route::get('/', function () {
   // return "<h1>Bienvenue dans ce cour de mario niki </h1>";
    return view('welcome');
});*/

/*Route::get('/', function () {
   // return "<h1>Bienvenue dans ce cour de mario niki </h1>";
    return view('welcome');
});*/

//Route::get('/', 'PagesController@home');
//Route::get('/', [PagesController::class,'home']);
//Route::get('/', 'App\Http\Controllers\PagesController@home');
/*Route::get('/service/{noms}/{id} ', function ($noms, $id) {
    return '<h1>mon noms est ' .$noms.'mon id est '.$id. '</h1>';
   // return view('welcome');
});*/
Route::get('/', 'App\Http\Controllers\PagesController@home');

Route::get('/shop', 'App\Http\Controllers\PagesController@shop');

Route::get('/panier', 'App\Http\Controllers\PagesController@panier');

Route::get('/paiement', 'App\Http\Controllers\PagesController@paiement');

Route::get('/client_login','App\Http\Controllers\PagesController@client_login');

Route::get('/register','App\Http\Controllers\PagesController@register');

Route::get('/paiement','App\Http\Controllers\PagesController@paiement');

Route::get('/signup','App\Http\Controllers\PagesController@signup');

Route::get('/select_par_cat/{name}','App\Http\Controllers\PagesController@select_par_cat');

Route::get('/ajouter_panier/{id}','App\Http\Controllers\PagesController@ajouter_panier');






Route::get('/admin','App\Http\Controllers\AdminController@tableau');
Route::get('/commande','App\Http\Controllers\AdminController@commande');


Route::get('/ajoutercategorie','App\Http\Controllers\CategoryController@ajoutercategorie');
Route::post('/sauvercategorie','App\Http\Controllers\CategoryController@sauvercategorie');
Route::get('/categories','App\Http\Controllers\CategoryController@categories');
Route::get('/modifier_categorie/{id} ','App\Http\Controllers\CategoryController@modifier_categorie');
Route::post('/modifiercategorie','App\Http\Controllers\CategoryController@modifiercategorie');
Route::get('/supprimercategorie/{id} ','App\Http\Controllers\CategoryController@supprimercategorie');




Route::get('/ajouterproduit','App\Http\Controllers\ProduitController@ajouterproduit');
Route::post('/sauverproduit','App\Http\Controllers\ProduitController@sauverproduit');
Route::get('/modifier_produit/{id}','App\Http\Controllers\ProduitController@modifier_produit');
Route::get('/produit','App\Http\Controllers\ProduitController@produit');
Route::post('/modifierproduit','App\Http\Controllers\ProduitController@modifierproduit');
Route::get('/supprimerproduit/{id}','App\Http\Controllers\ProduitController@supprimerproduit');
Route::get('/activer_produit/{id}','App\Http\Controllers\ProduitController@activer_produit');
Route::get('/desactiver_produit/{id}','App\Http\Controllers\ProduitController@desactiver_produit');




Route::get('/ajouterslider','App\Http\Controllers\SliderController@ajouterslider');
Route::post('/sauverslider','App\Http\Controllers\SliderController@sauverslider');
Route::get('/sliders','App\Http\Controllers\SliderController@sliders');
Route::get('/modifier_slider/{id}','App\Http\Controllers\SliderController@modifier_slider');
Route::post('/modifierslider','App\Http\Controllers\SliderController@modifierslider');
Route::get('/supprimerslider/{id}','App\Http\Controllers\SliderController@supprimerslider');
Route::get('/activer_slider/{id}','App\Http\Controllers\SliderController@activer_slider');
Route::get('/desactiver_slider/{id}','App\Http\Controllers\SliderController@desactiver_slider');

