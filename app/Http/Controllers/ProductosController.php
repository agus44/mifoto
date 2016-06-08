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

class ProductosController extends Controller
{ 
    public function index($menu)
    {
      $data['titulo']='Ficha de Productos';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['menus_padres']="";
      $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
      return view('productos.index',$data);
    }   
}
