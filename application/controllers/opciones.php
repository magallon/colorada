<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opciones extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
	}

	// metodo index
	public function index()
	{
		// si existe la session entra 
		if($this->session->userdata('nombre')){
			$this->load->view('opcion');
		
		}
		// si no existe la sesion lo sacamos
		else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}

	// funcion de agregar
	public function agregar(){
		// si existe la session entra 
		if($this->session->userdata('nombre')){
			$this->load->view('agregar');
		}
		// si no existe la sesion lo sacamos
		else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}

	public function alta_datos(){
		// si existe la session entra 
		if($this->session->userdata('nombre')){
			// verificamos que llegue por post
			if($this->input->post()){
				// almacenamos datos post en variables
				$seguro = $this->input->post('seguro');
				$nombre = $this->input->post('nombre');
				$paterno = $this->input->post('paterno');
				$materno = $this->input->post('materno');
				$empresa = $this->input->post('empresa');
				$puesto = $this->input->post('puesto');
				$fecha = $this->input->post('fecha');
				$ambiental = $this->input->post('ambiental');
				$seguridad = $this->input->post('seguridad');

				// realizamos la insercion
				$alta_datos = $this->usuario_model->alta_datos(
																$seguro,
																$nombre,
																$paterno,
																$materno,
																$puesto,
																$empresa,
																$fecha,
																$ambiental,
																$seguridad	
															);
				redirect('opciones/agregar');

			}else{
				// destruimos la session y mandamos a opciones
				redirect('opciones');
			}
		}
		// si no existe la sesion lo sacamos
		else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}

	// Funcion de destruir la sesion
	public function logout()
	{
		if ($this->session->userdata('nombre')) {
			$this->session->sess_destroy();
			redirect('welcome');
		} else {
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}
}