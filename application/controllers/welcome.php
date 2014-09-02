<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	// Metodo de login 
	public function login(){
		if ($this->input->post()) {
			// obtenemos variables que llegan por post
			$usuario_txt = $this->input->post('usuario_txt');
			$pass = $this->input->post('pass');

			// Consultamos en la base de datos  
			$valida = $this->usuario_model->valida_usuario($usuario_txt,$pass);

			if(is_object($valida)) {
				// Creamos variables de session
				$this->session->set_userdata("password",$valida->password);
				$this->session->set_userdata("nombre",$valida->nombre);

				// mandamos a otro controlador por cuestion de organizacion
				redirect('opciones');
			}else{
				// destruimos la sesion
				$this->session->sess_destroy();
				redirect('welcome');
			}

		}else{
			redirect('welcome');
		}
	}
}