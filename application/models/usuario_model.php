<?php 
class Usuario_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
// -- Validamos que el usuario exista 
	public function valida_usuario($usuario_txt,$pass){
			return $this->db->where('nombre',$usuario_txt)
							->where('password',$pass)
							->get('usuario')
							->row();
	}

	public function alta_datos($seguro,$nombre,$paterno,$materno,$puesto,$empresa,$fecha,$ambiental,$seguridad){
		return $this->db->set('nss',$seguro)
						->set('nombre',$nombre)
						->set('ap_Paterno',$paterno)
						->set('ap_Materno',$materno)
						->set('puesto',$puesto)
						->set('empresa',$empresa)
						->set('fecha',$fecha)
						->set('ambiental',$ambiental)
						->set('seguridad',$seguridad)
						->insert('datos');
	}
}
?>