<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_login','',TRUE);
	}

	public function index()
	{
		$this->load->view('plantilla/header');
		$this->load->view('welcome_message');
		$this->load->view('plantilla/footer');
	}

	public function index_error()
	{
		$this->load->view('plantilla/header');
		$this->load->view('welcome_error');
		$this->load->view('plantilla/footer');
	}

	public function login()
	{
		
		$user=$this->input->post('inputUsuario');
		$pass=$this->input->post('inputPassword');
		$respuesta;
		$result = $this->model_login->VerificarUsuario($user, $pass);
		 
		   if($result)
		   {
		     $sess_array = array();
		     foreach($result as $row)
		     {
		       $sess_array = array(
		         'id' => $row->id,
		         'username' => $row->usuario,
		         'usertype'=>$row->tipo_usuario
		       );
		       $this->session->set_userdata('logged_in', $sess_array);
		     }
		    
		   }
		   else
		   {
		     $this->form_validation->set_message('check_database', 'Usuario o conraseña inválidos');
		   }

		   if($this->session->userdata('logged_in'))
		   {
		     $session_data = $this->session->userdata('logged_in');
		     $data['username'] = $session_data['username'];
		     
		     //$this->load->view('home_view', $data);
		     redirect(base_url().'dashboard/index', 'refresh');
		   }
		   else
		   {
		     redirect(base_url().'login/index_error', 'refresh');
		   }

	}

	function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect(base_url(), 'refresh');
	 }

	
		
	

}