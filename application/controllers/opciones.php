<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opciones extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('datos_model');
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

	public function update_datos(){
		if($this->session->userdata('nombre')){
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
				
				// realizamos la actualizacion
				$alta_datos = $this->usuario_model->update_datos(
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
				redirect('opciones/acciones');

			}else{
				$this->session->sess_destroy();
				redirect('welcome');
			}
		}else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
		
	}

	public function acciones(){
		if($this->session->userdata('nombre')){
			// recuperamos todos los registros y los mandamos a la vista
			$this->load->view('accion');
		}else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}

	public function get_registros(){
		$data = $this->datos_model->get();
		echo json_encode($data);
	}
	
	public function update(){
		// verificamos que llegue por post
		if($this->input->post()){
			// almacenamos en variable $id
			$id = $this->input->post('id');
			// hacemos la  consulta 
			$registro = $this->datos_model->get_usuario($id);
			$data = array(
				'registro'=>$registro
			);
			$this->load->view('update',$data);
		}else{
			redirect('opciones');
		}
	}

	public function delete(){
		// verificamos que llegue por post
		if($this->input->post()){
			// almacenamos en variable $id
			$id = $this->input->post('id');
			// hacemos la  consulta 
			$this->datos_model->delete_usuario($id);

			redirect('opciones/acciones');
		}else{
			redirect('opciones');
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