<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends Controller
{
    public function ajouterslider(){
        return view('admin.ajouterslider');
    }

    public function sauverslider(Request $request){
        $this->validate($request, [
        'description1' =>'required',
        'description2' =>'required',      
        'slider_image' =>'image|nullable|max:1999']);
            if($request->hasFile('slider_image')){
                //1: prendre le nom du file avec son extension
                $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
                //2: prendre le nom du file
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //3: prendre juste l'extension
                $extension = $request->file('slider_image')->getClientOriginalExtension();
                //4: le nom a sauvegarder dans la  base de donnees 
                $fileNameStore = $fileName.'_'.time().'.'.$extension;
                //5: teelechager l'image reel dans un dossier 
                $path = $request->file('slider_image')->storeAS('public/slider_images', $fileNameStore);

            }
            else{
                 $fileNameStore = 'monimage.jpg';
            }

            $slider = new Slider();
            $slider->description1 = $request->input('description1');
            $slider->description2 = $request->input('description2');
            $slider->slider_image = $fileNameStore;
            $slider->status = 1;
            $slider->save();
            return redirect('/ajouterslider')->with('status','le Slider a ete Inserer avec succes');  

    }

    public  function sliders()
    {
        $slider = Slider::get(); 
        return view('admin.sliders')->with('slider',$slider);
      
    }
    
    public function modifier_slider($id){
        
        $slider = Slider::find($id);
     return view('admin.modifier_slider')->with('slider',$slider);
    }

    public function modifierslider(Request $request){
      
        $this->validate($request, ['description1' =>'required',
        'description2' =>'required',
        'slider_image' =>'image|nullable|max:1999']);

        $slider = Slider::find($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');

    if($request->hasFile('slider_image')){
    //1: prendre le nom du file avec son extension
    $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
    //2: prendre le nom du file
    $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
    //3: prendre juste l'extension
    $extension = $request->file('slider_image')->getClientOriginalExtension();
    //4: le nom a sauvegarder dans la  base de donnees 
    $fileNameStore = $fileName.'_'.time().'.'.$extension;
    //5: telechager l'image reel dans un dossier 
    $path = $request->file('slider_image')->storeAS('public/slider_images', $fileNameStore);

        if ($slider->produit_image != 'monimage.jpg')
            {
              Storage::delete('public/slider_images/'.$slider->slider_image);
            }

      $slider->slider_image = $fileNameStore;

    }
 
   $slider->update();

return redirect('/sliders')->with('status','le slider a ete Modifier avec succes');
        
    }

    public function supprimerslider($id){
        $slider = Slider::find($id);
             // print($product->produit_image);

            if ($slider->slider_image != 'monimage.jpg')
            {
               Storage::delete('public/slider_images/'.$slider->slider_image);
            }
            
             $slider->delete();

            return redirect('/sliders')->with('status','le slider a ete supprimer avec succes');
    }

    public function activer_slider($id){
        $slider = Slider::find($id);

          $slider->status = 1;

          $slider->update();
          return redirect('/sliders')->with('status','le slider a ete activer avec succes');
        
    }

    public function desactiver_slider($id)
    {
        $slider = Slider::find($id);

        $slider->status = 0;

        $slider->update();
        return redirect('/sliders')->with('status','le slider a ete activer avec succes');
        
    }
    
}
