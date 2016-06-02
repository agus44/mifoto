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
   /****************************************************************************************/
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
         Session::put('id_usuario',   $datos[0]->id);
         Session::put('nom_usuario', $datos[0]->usuario);
         Session::put('id_tipo',         $datos[0]->tipo_usuario);
         Session::put('nombre_completo',         $datos[0]->nombre);
         Session::put('id_empresa',  $datos[0]->id_empresa);
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
        $data['titulo']='Últimas Noticias';
        $data['subtitulo']="Sistema ERP TomahawkGT";
        $data['menus']=configuracion::all_menus();
        return view('home.slider',$data);
    }

    public function logout()
    {
     
        Session::flush();
        return Redirect::to('/');    
    }

    /***********************************************************************************************************************/

    public function configuracion($menu)
    {
      $data['titulo']='Configuración';
      $data['subtitulo']="Sistema ERP TomahawkGT";
      $data['menus']=$this->menus_generales($menu);
      $data["menus_hijos"]=$this->menus_hijos($data['menus']);
     // dd($data["menus_hijos"]);
      return view('configuracion.index',$data);
    }

    public function permisos_rol($menu)
    {
      $data['titulo']="Permisos Por Rol de Usuario";
      $data['subtitulo']="Sistema ERP TomahawkGT";   
      $data['menus']=$this->menus_generales($menu);
      $data["menus_hijos"]=$this->menus_hijos($data['menus']);
      $data["empresas"]=configuracion::all_empresas();
      $data["departamentos"]=configuracion::all_departamentos();
      return view('configuracion.permisos_rol',$data);
    }

    public function menus_generales($menu)
    {
       $menus=configuracion::menus_hijos($menu);
       return $menus;
    }

    public function menus_hijos($menus)
    {
      $menus_hijos=array();
      for($i=0;$i<count($menus);$i++)
      {
        $mh=configuracion::menus_hijos($menus[$i]->id);
        array_push($menus_hijos, $mh);
      }

      return $menus_hijos;
    }
}
