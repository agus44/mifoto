<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_login','',TRUE);
		$session=$this->session->userdata('logged_in');
		$this->id_user=$session['id'];
		$this->username=$session['username'];
		$this->type=$session['usertype'];

	}
	public function index()
	{
		

			/*************google maps***********/
			$this->load->library('googlemaps');

			$config['center'] = '-33.560548, -70.821270';
			$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);

			$marker = array();
			$marker['position'] = '-33.557396, -70.815616';
			$marker['infowindow_content'] = 'Camion 1';
			$marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
			$this->googlemaps->add_marker($marker);

			$marker = array();
			$marker['position'] = '-33.560087, -70.818062';
			$marker['draggable'] = TRUE;
			$marker['animation'] = 'DROP';
			$marker['infowindow_content'] = 'Camion2';
			$this->googlemaps->add_marker($marker);

			$marker = array();
			$marker['position'] = '-33.561512, -70.821847';
			$marker['infowindow_content'] = 'Camion3';
			$this->googlemaps->add_marker($marker);
			$data['map'] = $this->googlemaps->create_map();

			
			/***********************************/

			$menu=$this->menu_dinamico->crea_menu($this->id_user,$this->username,$this->type);
			$this->load->view('plantilla/header');
			$this->load->view('plantilla/menu',$menu);
			$this->load->view('tracking/mapageneral',$data);
			$this->load->view('plantilla/footer');
		
	}

}