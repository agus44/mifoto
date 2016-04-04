<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Login extends CI_Model {

	function VerificarUsuario($username, $password)
	{

	   $this -> db -> select('id, usuario,pass,tipo_usuario');
	   $this -> db -> from('usuarios');
	   $this -> db -> where('usuario', $username);
	   $this -> db -> where('pass', $password);
	   $this -> db -> limit(1);

	   $query = $this -> db -> get();

	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	function cargar_menu_padre()
	{
		$session=$this->session->userdata('logged_in');
		$tipo=$session['usertype'];
		$vigente=1;
		$condicion=array('p.id_tipousuario'=>$tipo,'p.id_padre'=>null,'p.vigente'=>$vigente);
		
		$this->db->select('p.id,p.id_menu,m.nom_menu,m.id_padre,m.url');
		$this->db->from('permisos_menu p');
		$this->db->join('menu m', 'p.id_menu = m.id_menu','INNER');
		$this->db->where($condicion);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function cargar_menu_hijo()
	{
		$session=$this->session->userdata('logged_in');
		$tipo=$session['usertype'];
		//$condicion=array('p.id_tipousuario'=>$tipo);
		$vigente=1;
		$where=array('p.id_tipousuario'=>$tipo,'p.vigente'=>$vigente);
		$this->db->select('p.id,p.id_menu,m.nom_menu,m.id_padre,m.url');
		$this->db->from('permisos_menu p');
		$this->db->join('menu m', 'p.id_menu = m.id_menu','INNER');
		$this->db->where($where);
		$this->db->where('m.id_padre IS NOT NULL', null);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function verificar_permisos_usuario()
	{
		$session=$this->session->userdata('logged_in');
		$id_usuario=$session['id'];

		$condicion=array('id_usuario'=>$id_usuario);
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

	function cargar_menuUser_padre()
	{
		$session=$this->session->userdata('logged_in');
		$id=$session['id'];
		$vigente='1';
		$condicion=array('p.id_usuario'=>$id,'p.id_padre'=>null);
		$this->db->select('p.id,p.id_menu,m.nom_menu,m.id_padre,m.url');
		$this->db->from('permisos_usuarios p');
		$this->db->join('menu m', 'p.id_menu = m.id_menu','INNER');
		$this->db->where($condicion);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function cargar_menuUser_hijo()
	{
		$session=$this->session->userdata('logged_in');
		$id=$session['id'];
		//$condicion=array('p.id_tipousuario'=>$tipo);
		$where="p.id_usuario='$id'";
		$this->db->select('p.id,p.id_menu,m.nom_menu,m.id_padre,m.url');
		$this->db->from('permisos_usuarios p');
		$this->db->join('menu m', 'p.id_menu = m.id_menu','INNER');
		$this->db->where($where);
		$this->db->where('m.id_padre IS NOT NULL', null);
		$query=$this->db->get();
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