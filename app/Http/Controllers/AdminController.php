<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tableau(){
        return view('admin.tableau');
      }

      public function commande(){
        return view('admin.commande');
      }
}
