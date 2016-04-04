<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenedores extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_login','',TRUE);
		$this->load->model('model_usuarios','',TRUE);
		$this->load->model('model_menu','',TRUE);
		$session=$this->session->userdata('logged_in');
		$this->id_user=$session['id'];
		$this->username=$session['username'];
		$this->type=$session['usertype'];
	}

	public function index()
	{
		$datos['tipo']=$this->model_usuarios->get_TipoUsuario();
		
		$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu',$menu);
		$this->load->view('mantenedores/usuarios/index',$datos);
		$this->load->view('plantilla/footer');
		
	}

	public function verificar_usuario()
	{
		$usuario=$_POST['usuario'];
		$existe=$this->model_usuarios->existe_usuario($usuario);
		if($existe)
		{
			echo "ERROR:::Ya existe un usuario con el nombre <strong>".$usuario."</strong>, por favor ingrese otro nombre de usuario";
		}
		else
		{
			echo "OK:::Nombre de Usuario disponible";
		}
	} 

	public function agregar_usuario()
	{
		$usuario=$_POST['usuario'];
		$pass=$_POST['pass'];
		$tipo=$_POST['tipo'];
		$nombre=$_POST['nombre'];

		$this->model_usuarios->agregar_usuario($usuario,$pass,$tipo,$nombre);
		$existe=$this->model_usuarios->existe_usuario($usuario);
		if($existe)
		{
			echo "OK:::Usuario Ingresado Correctamente";
		}
		else
		{
			echo "Error:::Problemas en el ingreso de usuario";
		}

	}

	public function lista_usuarios()
	{
		$datos['usuarios']=$this->model_usuarios->get_usuarios();
		$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu',$menu);
		$this->load->view('mantenedores/usuarios/lista_usuarios',$datos);
		$this->load->view('plantilla/footer');
		
	}

	public function buscar_usuario()
	{
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$existe=$this->model_usuarios->buscar_usuario($id,$nombre);
		if($existe)
		{
			echo json_encode($existe);
		}
		else
		{
			echo "false";
		}
	}

	public function eliminar_usuario()
	{
		$id=$_POST['id'];
		$nombre='';
		$this->model_usuarios->eliminar_usuario($id);
		$existe=$this->model_usuarios->buscar_usuario($id,$nombre);
		if($existe)
		{
			echo "ERROR:::";
		}
		else
		{
			echo "OK:::";
		}

	}

	public function editar_usuario()
	{
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$pass=$_POST['pass'];
		$tipo=$_POST['tipo'];
		$nom=$_POST['nom'];
		$existe=$this->model_usuarios->existe_otro_usuario($id,$nombre);

		if($existe)
		{
			echo 'EXISTENTE:::Existe otra cuenta con el mismo nombre de usuario, por favor ingrese otro nombre de usuario';
		}
		else
		{
			$this->model_usuarios->update_usuario($id,$nombre,$pass,$tipo,$nom);
			$actualizado=$this->model_usuarios->buscar_usuario($id,$nombre);

			foreach ($actualizado as $row)
			{
			  if($row->id==$id && $row->usuario==$nombre && $row->pass==$pass && $row->tipo_usuario==$tipo)
			  {
			  	echo "OK:::Usuario Actualizado Correctamente";
			  }
			  else
			  {
			  	echo "ERROR:::Problemas al actualizar los datos, por favor inténtelo más tarde";
			  }
			}

		}

	}

	public function menu()
	{
		$dato['menus_padres']=$this->model_menu->get_Menus();
		$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu',$menu);
		$this->load->view('mantenedores/menu/menu',$dato);
		$this->load->view('plantilla/footer');
	}

	function verificar_menu()
	{
		$menu=$_POST['nom_menu'];
		$existe=$this->model_menu->verificar_menu($menu);

		if($existe)
		{
			echo "EXISTE:::Dicho menú con el nombre <strong>".$menu."</strong> ya existe, por favor ingrese otro nombre para el nuevo menú";
		}
		else
		{
			echo "OK:::Menú disponible para agregar";
		}
	}

	function verificar_url()
	{
		$url=$_POST['url_add'];
		$existe=$this->model_menu->verificar_url($url);

		if($existe)
		{
			echo "EXISTE:::Dicha <strong>URL</strong> ya existe, por favor ingrese otro nombre para la nueva url";
		}
		else
		{
			echo "OK:::URL disponible para agregar";
		}
	}

	function agregar_menu()
	{
		$menu=$_POST['nom_menu'];
		$url=$_POST['url_add'];
		$asig_menu=$_POST['asig_menu'];
		$this->model_menu->agregar_menu($menu,$url,$asig_menu);
		$existe=$this->model_menu->verificar_menu($menu);
		if($existe)
		{
			echo "OK:::Menú agregado correctamente";
		}
		else
		{
			echo "ERROR:::Problemas al agregar el menú, inténtelo nuevamente";
		}
	}

	function lista_menus()
	{
		$datos['menus']=$this->model_menu->get_MenusAll();
		$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu',$menu);
		$this->load->view('mantenedores/menu/lista_menu',$datos);
		$this->load->view('plantilla/footer');
		
	}

	function buscar_menu()
	{
		$id=$_POST['id'];
		$nom=$_POST['nom'];
		$resp=$this->model_menu->buscar_menu($id,$nom);

		if($resp)
		{
			echo json_encode($resp);
		}
		else
		{
			echo "false";
		}

	}

	function eliminar_menu()
	{
		$id=$_POST['id'];
		$nom=$_POST['nom'];
		$dato=$this->model_menu->dependencia_menu($id,$nom);
		if ($dato>0){
			echo "ERROR:::No se ha podido eliminar el menú, ya que es un menú padre y posee dependencias con otros menús";
		}
		else
		{
			$this->model_menu->eliminar_permisosxmenu($id);
			$this->model_menu->eliminar_menu($id,$nom);
			$resp=$this->model_menu->buscar_menu($id,$nom);
			if($resp)
			{
				echo "ERROR:::No se ha podido eliminar el menú, inténtelo más tarde";
			}
			else
			{
				echo "OK:::Menú eliminado correctamente";
			}	
		}
	}

	function permisos()
	{
		$datos['lista_usuarios']=$this->model_usuarios->get_usuarios();
		$datos['tipo']=$this->model_usuarios->get_TipoUsuario();
		$datos['menus']=$this->model_menu->get_MenusAll();
		$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu',$menu);
		$this->load->view('mantenedores/menu/permisos',$datos);
		$this->load->view('plantilla/footer');
	}

	function buscar_permisos()
	{
		$tipo=$_POST['tipo'];
		$permisos=$this->model_menu->obtener_permisos($tipo);

		if($permisos)
		{
			echo json_encode($permisos);
		}
		else
		{
			echo "false";
		}

	}

	function actualizarPermisos()
	{
		$tipo=$_POST['tipo'];
		$valor=$_POST['valor'];	
		$id=$_POST['id'];
		if($valor=="true")
		{
			$this->model_menu->agregar_permiso($id,$tipo);
			$existe=$this->model_menu->verificar_permiso($id,$tipo);
			if($existe)
			{
				echo "Agregado:::Permiso agregado correctamente";
			}
			else
			{
				echo "ERROR:::Problemas en el ingreso del permiso, por favor inténtelo nuevamente";
			}
		}
		else
		{
			$this->model_menu->eliminar_permiso($id,$tipo);
			$existe=$this->model_menu->verificar_permiso($id,$tipo);

			if($existe)
			{
				echo "ERROR:::Problemas en la eliminación del permiso, por favor inténtelo nuevamente";
			}
			else
			{
				echo "Eliminado:::Permiso eliminado correctamente";
			}
		}
	}

	function editar_permisos_usuario($x)
	{
		$id=$x[0];
		$datos['usuario']=$this->model_usuarios->get_usuario_id($id);
		$datos['menus']=$this->model_menu->get_MenusAll();
		$datos['menus_usuario']=$this->model_menu->get_MenusXusuario($id);
		$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu',$menu);
		$this->load->view('mantenedores/menu/editar_permisos_usuario',$datos);
		$this->load->view('plantilla/footer');

	}

	function actualizarPermisosxUsuario()
	{
		$id=$_POST['id'];
		$id_menu=$_POST['id_menu'];
		$valor=$_POST['valor'];
		
		if($valor=='true')
		{
			$this->model_menu->agregar_permisoXusuario($id,$id_menu);
			$existe=$this->model_menu->verificar_permisoXusuario($id,$id_menu);
			if($existe)
			{
				echo "Agregado:::Permiso agregado correctamente";
			}
			else
			{
				echo "ERROR:::Problemas en el ingreso del permiso, por favor inténtelo nuevamente";
			}
		}
		else
		{
			$this->model_menu->eliminar_permisoXusuario($id,$id_menu);
			$existe=$this->model_menu->verificar_permisoXusuario($id,$id_menu);
			if($existe)
			{
				echo "ERROR:::Problemas en la eliminación del permiso, por favor inténtelo nuevamente";
			}
			else
			{
				echo "Eliminado:::Permiso eliminado correctamente";
			}
		}
	}
}
