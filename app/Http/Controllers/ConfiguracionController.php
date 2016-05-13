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
use App\models\configuracion;

class ConfiguracionController extends Controller
{
   
    public function index()
    {
       if (Session::get('logeado')==true){
            return Redirect::to('/home');
            
        }else{
            //return View::make('login/login');
            return Redirect::to('/inicio');
        }   
    } 

    public function inicio()
    {
        return view('login');
    }

    public function login()
    {
        $userdata = array(
            'nombre_usuario' => Request::get('usuario'),
            'clave'=> Request::get('clave')
           // 'clave'=> md5(Request::get('clave'))
        );

        $login=$this->iniciar_login($userdata);
        if($login==1)
        {
            return Redirect::to('/home');
        }
        else
        {
            return Redirect::to('/');
        }
    }

    public function iniciar_login($data)
    {
        
      $datos=configuracion::verificar_usuario($data['nombre_usuario'],$data['clave']);

      if($datos)
      {
         Session::put('logeado',     true);
         Session::put('idusuario',   $datos[0]->id);
         Session::put('nom_usuario', $datos[0]->usuario);
         Session::put('tipo',         $datos[0]->tipo_usuario);
         Session::put('nombre_completo',         $datos[0]->nombre);
        return 1;
      }
      else
      {
        Session::put('error',"Los datos de acceso no coinciden con nuestras credenciales");
        return 0;
      }
      
    }

    public function home()
    {
        return view('welcome');
    }

    public function logout()
    {
     
        Session::flush();
        return Redirect::to('/');    
    }
}
