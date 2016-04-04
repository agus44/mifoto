<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Contactos extends CI_Model {

	function insertar($data)
	{
		$this->db->insert('contactos',$data);
	}

	function getAll()
	{
		$query=$this->db->get('contactos');
		return $query->result();
	}
}
