<?php 
class General_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_contratistas(){
		return $this->db->select('contratistas.nss as nss')
						->select('contratistas.curp as curp')
						->select('contratistas.nombre as nombre')
						->select('contratistas.apellido_p as apellido_p')
						->select('contratistas.apellido_m as apellido_m')
						->select('contratistas.fecha as fecha')
						->select('contratistas.cal_ambiental as cal_ambiental')
						->select('contratistas.cal_seguridad as cal_seguridad')
						->select('empresas.nombre as empresa_id')
						->select('puestos.nombre as puesto_id')
						->from('contratistas')
						->join('empresas','contratistas.empresa_id = empresas.id')
						->join('puestos','contratistas.puesto_id = puestos.id')
						->get()
						->result();
	}
	public function get_contratista($nss){
		return $this->db->where('nss',$nss)
						->from('contratistas')
						->get()
						->row();
	}
	public function get_empresas(){
		return $this->db->get('empresas')->result();
	}
	public function get_empresa($id){
		return $this->db->where('id',$id)
						->from('empresas')
						->get()
						->row();
	}
	public function get_usuario($id){
		return $this->db->where('nss',$id)
						->get('contratistas')
						->row();
	}
	public function delete_usuario($id){
		return $this->db->where('nss',$id)
						->delete('contratistas');
	}
	public function update_empresa($id,$nombre,$fecha){
		return $this->db->set('nombre',$nombre)
						->set('fecha',$fecha)
						->where('id',$id)
						->update('empresas');
	}
	public function get_puestos(){
		return $this->db->get('puestos')->result();
	}
	public function valida_usuario($usuario_txt,$pass){
			return $this->db->where('nombre',$usuario_txt)
							->where('password',$pass)
							->get('usuarios')
							->row();
	}
	public function alta_datos($data_model){
		return $this->db->set('nss',$data_model['nss'])
						->set('curp',$data_model['curp'])
						->set('nombre',$data_model['nombre'])
						->set('apellido_p',$data_model['apellido_p'])
						->set('apellido_m',$data_model['apellido_m'])
						->set('fecha',$data_model['fecha'])
						->set('cal_ambiental',$data_model['cal_ambiental'])
						->set('cal_seguridad',$data_model['cal_seguridad'])
						->set('empresa_id',$data_model['empresa_id'])
						->set('puesto_id',$data_model['puesto_id'])
						->insert('contratistas');
	}
	public function update_datos($seguro,$nombre,$paterno,$materno,$puesto,$empresa,$fecha,$ambiental,$seguridad){
		return $this->db->where('nss',$seguro)
						->set('nombre',$nombre)
						->set('ap_Paterno',$paterno)
						->set('ap_Materno',$materno)
						->set('puesto',$puesto)
						->set('empresa',$empresa)
						->set('fecha',$fecha)
						->set('ambiental',$ambiental)
						->set('seguridad',$seguridad)
						->update('datos');
	}
	public function update_empresas($idempresas, $nombre, $fecha){
		return $this->db->where('idempresas',$idempresas)
						->set('nombre',$nombre)
						->set('fecha',$fecha);
	}
	public function update_contratista($data_model){
		return $this->db->set('curp',$data_model['curp'])
						->set('apellido_p',$data_model['apellido_p'])
						->set('apellido_m',$data_model['apellido_m'])
						->set('fecha',$data_model['fecha'])
						->set('cal_ambiental',$data_model['cal_ambiental'])
						->set('cal_seguridad',$data_model['cal_seguridad'])
						->set('empresa_id',$data_model['empresa_id'])
						->set('puesto_id',$data_model['puesto_id'])
						->where('nss',$data_model['nss'])
						->update('contratistas');
	}
	public function delete_contratista($nss){
		return $this->db->where('nss',$nss)
						->delete('contratistas');
	}
	public function delete_empresa($id){
		return $this->db->where('id',$id)
						->delete('empresas');
	}
	public function agregaEmpresa($data_model){
		return $this->db->insert('empresas',$data_model);
	}
}
?>