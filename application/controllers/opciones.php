<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opciones extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->model('general_model');
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
			$data['empresas'] = $this->general_model->get_empresas();
			$data['puestos'] = $this->general_model->get_puestos();
			$this->load->view('agregar',$data);
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
				$data_model['nss'] = $this->input->post('seguro');
				$data_model['curp'] = $this->input->post('curp');
				$data_model['nombre'] = $this->input->post('nombre');
				$data_model['apellido_p'] = $this->input->post('paterno');
				$data_model['apellido_m'] = $this->input->post('materno');
				$data_model['fecha'] = $this->input->post('fecha');
				$data_model['cal_ambiental'] = $this->input->post('ambiental');
				$data_model['cal_seguridad'] = $this->input->post('seguridad');
				$data_model['empresa_id'] = $this->input->post('id_empresa');
				$data_model['puesto_id'] = $this->input->post('id_puesto');
				// realizamos la insercion
				$alta_datos = $this->general_model->alta_datos($data_model);
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
				$alta_datos = $this->general_model->update_datos(
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
			$data['contratistas'] = $this->general_model->get_contratistas();
			$this->load->view('accion',$data);
		}else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}
	public function empresas(){
		if($this->session->userdata('nombre')){
			// recuperamos todos los registros y los mandamos a la vista
			$data['empresas'] = $this->general_model->get_empresas();
			$this->load->view('Tempresas',$data);
		}else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}
	public function get_registros(){
		$data = $this->general_model->get();
		echo json_encode($data);
	}
	public function get_empresa(){
		$data = $this->general_model->get_empresas();
		echo json_encode($data);
	}
	public function update(){
		// verificamos que llegue por post
		if($this->input->post()){
			// almacenamos en variable $id
			$id = $this->input->post('id');
			// hacemos la  consulta 
			$registro = $this->general_model->get_usuario($id);
			$data = array(
				'registro'=>$registro
			);
			$this->load->view('update',$data);
		}else{
			redirect('opciones');
		}
	}
	public function update_empresas(){
		// verificamos que llegue por post
		if($this->input->post()){
			// almacenamos en variable $id
			$id = $this->input->post('id');
			// hacemos la  consulta 
			$data['registro'] = $this->general_model->get_empresa($id);
			$this->load->view('update_empresas',$data);
		}else{
			redirect('opciones');
		}
	}
	public function update_empresa(){
		if($this->input->post()){
			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');
			$fecha = $this->input->post('fecha');

			$empresa = $this->general_model->update_empresa($id,$nombre,$fecha);
			redirect('opciones/empresas');
		}else{
			redirect('opciones');
		}
	}
	public function delete_empresa(){
		// verificamos que llegue por post
		if($this->input->post()){
			$this->general_model->delete_empresa($this->input->post('id'));
			redirect('opciones/acciones');
		}else{
			redirect('opciones');
		}
	}
	public function update_contratista(){
		if($this->session->userdata('nombre')){
			$data['contratista'] = $this->general_model->get_contratista($this->input->post('nss'));
			$data['empresas'] = $this->general_model->get_empresas();
			$data['puestos'] = $this->general_model->get_puestos();
			$this->load->view("contratista",$data);
		}else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}
	public function actualiza_contratista(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$data_model['nss'] = $this->input->post('nss');
				$data_model['curp'] = $this->input->post('curp');
				$data_model['nombre'] = $this->input->post('nombre');
				$data_model['apellido_p'] = $this->input->post('apellido_p');
				$data_model['apellido_m'] = $this->input->post('apellido_m');
				$data_model['fecha'] = $this->input->post('fecha');
				$data_model['cal_ambiental'] = $this->input->post('cal_ambiental');
				$data_model['cal_seguridad'] = $this->input->post('cal_seguridad');
				$data_model['empresa_id'] = $this->input->post('empresa_id');
				$data_model['puesto_id'] = $this->input->post('puesto_id');
				$this->general_model->update_contratista($data_model);
				redirect('opciones/acciones');
			}else{
				redirect('opciones/acciones');
			}
		}else{
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}
	public function delete_contratista(){
		if ($this->session->userdata('nombre')) {
			if($this->input->post()){
				$this->general_model->delete_contratista($this->input->post('nss'));
				redirect('opciones/acciones');
			}else{
				redirect('opciones/acciones');
			}
		} else {
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}
	public function agregaEmpresa(){
		if ($this->session->userdata('nombre')) {
			if($this->input->post()){
				$data_model['nombre'] = $this->input->post('nombre');
				$data_model['fecha'] = date('Y-m-d');
				$this->general_model->agregaEmpresa($data_model);
				redirect('opciones/empresas');
			}else{
				redirect('opciones/empresas');
			}
		} else {
			$this->session->sess_destroy();
			redirect('welcome');
		}
	}
	public function puestos(){
		if($this->session->userdata('nombre')){
			// recuperamos todos los registros y los mandamos a la vista
			$data['puestos'] = $this->general_model->get_puestos();
			$this->load->view('puestos',$data);
		}else{
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