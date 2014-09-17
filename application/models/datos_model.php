<?php 
class Datos_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get(){
		return $this->db->get('datos')->result();
	}

	public function get_usuario($id){
		return $this->db->where('nss',$id)
						->get('datos')
						->row();
	}

	public function delete_usuario($id){
		return $this->db->where('nss',$id)
						->delete('datos');
	}
}
?>