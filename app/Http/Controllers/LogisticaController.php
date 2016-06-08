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
use App\models\logistica;

class LogisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($menu)
    {
      $data['titulo']='Logística';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['menus_padres']="";
      $data['menus']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data["menus_hijos"]=app('App\Http\Controllers\ConfiguracionController')->menus_hijos($data['menus']);
     // dd($data["menus_hijos"]);
      return view('logistica.index',$data);     
    }

    public function bodegas($menu)
    {
      $data['titulo']='Sistema de Bodegas';
      $data['subtitulo']="Sistema ERP Tomahawk";
      $data['menus_padres']=app('App\Http\Controllers\ConfiguracionController')->menus_generales($menu);
      $data['menus']="";
      $data["menus_hijos"]=""; 
      return view('logistica.bodegas',$data);
    }

    
}
