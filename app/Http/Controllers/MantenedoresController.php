<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;
use Input;
use Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cache;
use Validator;

class MantenedoresController extends Controller
{
   public function index($menu)
   {
      $data['titulo']='Mantenedores';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['menus_padres']="";
      $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
      return view('mantenedores.index',$data);
   } 

   public function crear_menu($menu)
   {
      $data['titulo']=" Creación de Menú";
      $data['subtitulo']="Sistema ERP Tomahawk"; 
      $data["menus_padres"]="";  
      $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
      return view('mantenedores.crear_menu',$data);
   }
}
