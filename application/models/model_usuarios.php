<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Usuarios extends CI_Model {

	function get_usuarios()
	{
		$this->db->select('u.id,u.usuario,u.pass,t.nom_tipo');
		$this->db->from('usuarios u');
		$this->db->join('tipo_usuario t', 'u.tipo_usuario = t.id_tipo');
		$query=$this->db->get();
		return $query->result();
	}

	function get_usuario_id($id)
	{
		$this->db->select('u.id,u.usuario,u.pass,t.nom_tipo,u.nombre');
		$this->db->from('usuarios u');
		$this->db->join('tipo_usuario t', 'u.tipo_usuario = t.id_tipo');
		$this->db->where('u.id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	function get_TipoUsuario()
	{
		$query=$this->db->get('tipo_usuario');
		return $query->result();
	}

	function existe_usuario($usuario)
	{
		$this->db->where('usuario',$usuario);
		$query=$this->db->get('usuarios');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function agregar_usuario($usuario,$pass,$tipo,$nombre)
	{
		$data = array(
   		'usuario' => $usuario ,
   		   'pass' => $pass ,
   'tipo_usuario' => $tipo,
   		 'nombre' =>$nombre);

		$this->db->insert('usuarios', $data); 
	}

	function buscar_usuario($id,$nombre)
	{

		if($id!="" && $nombre=="")
		{
			$condicion=array('id'=>$id);
			$this->db->where($condicion);
		}
		else
		{
			if($id=="" && $nombre!="")
			{
				$condicion=array('usuario'=>$nombre);
				$this->db->where($condicion);
			}
			else
			{
				$condicion=array('id'=>$id,'usuario'=>$nombre);
				$this->db->where($condicion);
			}
		}

		$query=$this->db->get('usuarios');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function eliminar_usuario($id)
	{
		$this->db->delete('usuarios', array('id' => $id)); 
	}

	function existe_otro_usuario($id,$nombre)
	{
		
		$this->db->where('usuario',$nombre);
		$this->db->where_not_in('id', $id);
		$this->db->limit(1);
		$query=$this->db->get('usuarios');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function update_usuario($id,$nombre,$pass,$tipo,$nom)
	{
		$data=array('usuario'=>$nombre,
					'pass'=>$pass,
					'tipo_usuario'=>$tipo,
					'nombre'=>$nom);

		$this->db->where('id',$id);
		$this->db->update('usuarios',$data);
	}
}