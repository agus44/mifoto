<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Menu extends CI_Model {

	function get_Menus()
	{
		$this->db->where('id_padre',null);
		$this->db->where('vigente=1');
		$query=$this->db->get('menu');
		return $query->result();
	}

	function get_MenusAll()
	{
		$this->db->select('m.id_menu,m.nom_menu,m.id_padre,m.url,m2.nom_menu as padre');
		$this->db->from('menu m');
		$this->db->join('menu m2', 'm.id_padre = m2.id_menu', 'left');
		$query=$this->db->get();
		return $query->result();
	}

	function verificar_menu($nom)
	{
		$this->db->where('nom_menu',$nom);
		$query=$this->db->get('menu');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function verificar_url($url)
	{
		$this->db->where('url',$url);
		$query=$this->db->get('menu');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function agregar_menu($nombre,$url,$menu_asig)
	{
		if($nombre!='' && $url=='' && $menu_asig==0)
		{
			$data=array('nom_menu'=>$nombre);
		}
		else
		{
			if($nombre!='' && $url!='' && $menu_asig==0)
			{
				$data=array('nom_menu'=>$nombre,'url'=>$url);
			}
			else
			{
				if($nombre!='' && $url=='' && $menu_asig!='')
				{
					$data=array('nom_menu'=>$nombre,'id_padre'=>$menu_asig);
				}
				else
				{
					if($nombre!='' && $url!='' && $menu_asig!='')
					{
						$data=array('nom_menu'=>$nombre,'url'=>$url,'id_padre'=>$menu_asig);
					}
				}
			}
		}
		$this->db->insert('menu', $data); 
	}

	function buscar_menu($id,$nom)
	{
		if($id!='' && $nom=='')
		{
			$condicion=array('id_menu'=>$id);
		}
		else
		{
			if($nom!='' && $id=='')
			{
				$condicion=array('nom_menu'=>$nom);
			}
			else
			{
				$condicion=array('id_menu'=>$id,'nom_menu'=>$nom);
			}
		}

		$this->db->where($condicion);
		$query=$this->db->get('menu');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function dependencia_menu($id,$nom)
	{
		$condicion=array('id_padre'=>$id);
		$this->db->where($condicion);
		$query=$this->db->get('menu');

		return $query->num_rows();
	}

	function eliminar_menu($id,$nom)
	{
		if($id!='')
		{
			$this->db->delete('menu',array('id_menu' => $id));
		}
		else
		{
			$this->db->delete('menu',array('nom_menu' => $nom));
		}
		
	}

	function obtener_permisos($tipo)
	{
		$condicion=array('id_tipousuario'=>$tipo);
		$this->db->where($condicion);
		$query=$this->db->get('permisos_menu');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function agregar_permiso($id,$tipo)
	{
		$condicion=array('id_menu'=>$id);
		$this->db->where($condicion);
		$query=$this->db->get('menu');
		$dato=$query->row();
		$nom_menu=$dato->nom_menu;
		$id_padre=$dato->id_padre;

		if(empty($id_padre))
		{
			$data=array('id_tipousuario'=>$tipo,'id_menu'=>$id,'nom_menu'=>$nom_menu);
		}
		else
		{
			$data=array('id_tipousuario'=>$tipo,'id_menu'=>$id,'nom_menu'=>$nom_menu,'id_padre'=>$id_padre);
		}
		$this->db->insert('permisos_menu',$data);
	}

	function eliminar_permiso($id,$tipo)
	{
		$this->db->delete('permisos_menu',array('id_menu' => $id,'id_tipousuario'=>$tipo));
	}

	function verificar_permiso($id,$tipo)
	{
		$condicion=array('id_menu'=>$id,'id_tipousuario'=>$tipo);
		$this->db->where($condicion);
		$query=$this->db->get('permisos_menu');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function eliminar_permisosxmenu($id)
	{
		$this->db->delete('permisos_menu',array('id_menu' => $id));
	}

	function agregar_permisoXusuario($id,$id_menu)
	{
		$condicion=array('id_menu'=>$id_menu);
		$this->db->where($condicion);
		$query=$this->db->get('menu');
		$dato=$query->row();
		$nom_menu=$dato->nom_menu;
		$id_padre=$dato->id_padre;

		if(empty($id_padre))
		{
			$data=array('id_usuario'=>$id,'id_menu'=>$id_menu,'nom_menu'=>$nom_menu);
		}
		else
		{
			$data=array('id_usuario'=>$id,'id_menu'=>$id_menu,'nom_menu'=>$nom_menu,'id_padre'=>$id_padre);
		}
		$this->db->insert('permisos_usuarios',$data);
	}

	function eliminar_permisoXusuario($id,$id_menu)
	{
		$this->db->delete('permisos_usuarios',array('id_menu' => $id_menu,'id_usuario'=>$id));
	}

	function verificar_permisoXusuario($id,$id_menu)
	{
		$condicion=array('id_menu'=>$id_menu,'id_usuario'=>$id);
		$this->db->where($condicion);
		$query=$this->db->get('permisos_usuarios');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function get_MenusXusuario($id)
	{
		$condicion=array('id_usuario'=>$id);
		$this->db->where($condicion);
		$query=$this->db->get('permisos_usuarios');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}