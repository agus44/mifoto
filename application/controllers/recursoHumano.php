<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecursoHumano extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_recurso_humano','',TRUE);
		$session=$this->session->userdata('logged_in');
		$this->id_user=$session['id'];
		$this->username=$session['username'];
		$this->type=$session['usertype'];
	}

	public function ing_variables()
	{
		$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu',$menu);
		
		$this->load->view('plantilla/footer');
	}
}