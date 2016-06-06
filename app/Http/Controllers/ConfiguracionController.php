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
         Session::put('id_rol',         $datos[0]->id_rol);
         Session::put('id_depto',         $datos[0]->id_depto);
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
        $rol=Session::get('id_rol');
        $data['menus']=configuracion::permisos_rol_padre($rol);
        $data['menus_hijos']="";
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
      //dd($data["menus_hijos"]);
      return view('configuracion.index',$data);
    }

    public function permisos_rol($menu)
    {
      $data['titulo']="Permisos Por Rol ";
      $data['subtitulo']="Sistema ERP TomahawkGT";   
      $data['menus']=$this->menus_generales($menu);
      $data["menus_hijos"]=$this->menus_hijos($data['menus']);
      $data["empresas"]=configuracion::all_empresas();
      return view('configuracion.permisos_rol',$data);
    }

    public function get_departamentos()
    {
      $empresa=$_POST['empresa'];
      try{
        $datos=configuracion::get_departamentos($empresa);
        if($datos)
        {
          return json_encode($datos);
        }
        else
        {
          return 0;
        }
      }
      catch (Exception $e) {
         return 0;
        }
      
    }

    public function get_roles()
    {
      $depto=$_POST['dpto'];
      try{
        $datos=configuracion::get_roles($depto);
        if($datos)
        {
          return json_encode($datos);
        }
        else
        {
          return 0;
        }
      }
      catch (Exception $e) {
         return 0;
        }
    }

    public function get_permisos_rol()
    {
      $rol=$_POST['rol'];
      $arreglo=array();
      try{
        $menus_padres=configuracion::all_menus();
        $permisos=configuracion::permisos_rol($rol);
        array_push($arreglo, $menus_padres);
        if($permisos)
        {
          array_push($arreglo, $permisos);
        }
        return json_encode($arreglo);
      }
      catch (Exception $e)
      {
       return 0; 
      }
    }

    public function get_permisos_rol_hijos()
    {
      try
      {
        $menu=$_POST['menu'];
        $rol=$_POST['rol'];
        $depto=$_POST['depto'];
        $empresa=$_POST['empresa'];
        $array=array();
        $info_menu=configuracion::info_menu($menu);
        array_push($array,$info_menu);
        $menus_hijos=configuracion::menus_hijos($menu);
        if(empty($menus_hijos))
        {
          $menus_hijos="";
          
        }
        $permisos=configuracion::permisos_rol_hijos($menu,$rol,$depto,$empresa);
        array_push($array,$menus_hijos);
        array_push($array,$permisos);
        return json_encode($array);
      }
      catch (Exception $e)
      {
        return 0;
      }
    }


    public function menus_generales($menu)
    {
       $rol=Session::get('id_rol');
       $depto=Session::get('id_depto');
       $empresa=Session::get('id_empresa');
       $menus=configuracion::permisos_rol_hijos($menu,$rol,$depto,$empresa);
       return $menus;
    }

    public function menus_hijos($menus)
    {
      $rol=Session::get('id_rol');
      $depto=Session::get('id_depto');
      $empresa=Session::get('id_empresa');
      $menus_hijos=array();
      for($i=0;$i<count($menus);$i++)
      {
        $mh=configuracion::permisos_rol_hijos($menus[$i]->id,$rol,$depto,$empresa);
        array_push($menus_hijos, $mh);
      }

      return $menus_hijos;
    }

    public function actualizar_modulo_sinhijos()
    {
      $menu=$_POST['menu'];
      $accion=$_POST['accion'];
      $rol=$_POST['rol'];
      $depto=$_POST['depto'];
      $empresa=$_POST['empresa'];

      $existe=configuracion::existe_permiso_rol($menu,$rol,$depto,$empresa);
      if($existe)
      {
        $data=['visible'=>$accion];
        $update=configuracion::update_permiso_rol($existe[0]->id,$data);
        return $update;
      }
      else
      {
        $data=['id_menu'=>$menu,'id_rol'=>$rol,'id_depto'=>$depto,'id_empresa'=>$empresa,'agregar'=>1,'editar'=>1,'eliminar'=>1,'reportes'=>1,'visible'=>$accion];
        $insert=configuracion::insert_permiso_rol($data);
        return $insert;
      }
    }

     public function actualizar_modulo_conhijos()
    {
      $menu=$_POST['menu'];
      $accion=$_POST['accion'];
      $rol=$_POST['rol'];
      $depto=$_POST['depto'];
      $empresa=$_POST['empresa'];
      $existe=configuracion::existe_permiso_rol($menu,$rol,$depto,$empresa);
      if($existe)
      {
        $data=['visible'=>$accion];
        $update=configuracion::update_permiso_rol($existe[0]->id,$data);
        if($update)
        {
          $this->recursivo_permisos_rol($menu,$accion,$rol,$depto,$empresa);
          return $update;
        }
        else
        {
          return 0;
        }
      }
      else
      {
        $data=['id_menu'=>$menu,'id_rol'=>$rol,'id_depto'=>$depto,'id_empresa'=>$empresa,'agregar'=>1,'editar'=>1,'eliminar'=>1,'reportes'=>1,'visible'=>$accion];
        $insert=configuracion::insert_permiso_rol($data);
        if($insert)
        {
           $this->recursivo_permisos_rol($menu,$accion,$rol,$depto,$empresa);
           return $insert;
        }
        else
        {
          return 0;
        }
      }

    }

    public function recursivo_permisos_rol($menu,$accion,$rol,$depto,$empresa)
    {
        $menus_hijos=configuracion::menus_hijos($menu);

        if($menus_hijos)
        {
          for($i=0;$i<count($menus_hijos);$i++)
          { 
            $existe=configuracion::existe_permiso_rol($menus_hijos[$i]->id,$rol,$depto,$empresa);
            if($existe)
            {
              $data=['visible'=>$accion];
              $update=configuracion::update_permiso_rol($existe[0]->id,$data);
              $this->recursivo_permisos_rol($menus_hijos[$i]->id,$accion,$rol,$depto,$empresa);
            }
            else
            {
               $data=['id_menu'=>$menus_hijos[$i]->id,'id_rol'=>$rol,'id_depto'=>$depto,'id_empresa'=>$empresa,'agregar'=>1,'editar'=>1,'eliminar'=>1,'reportes'=>1,'visible'=>$accion];
               $insert=configuracion::insert_permiso_rol($data);
               $this->recursivo_permisos_rol($menus_hijos[$i]->id,$accion,$rol,$depto,$empresa);
            }
          }
        }
    }
}
