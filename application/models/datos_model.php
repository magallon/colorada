<?php 
class Datos_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get(){
		return $this->db->get('datos')->result();
	}
}
?>