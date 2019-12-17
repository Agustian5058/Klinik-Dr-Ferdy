<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pasien extends CI_Model {

	var $table = 'pasien';

	
	function getPasienAll(){
		$hasil = $this->db->get($this->table)->result();
		return $hasil;
	}

	function getPasienById($id_pasien){
		$hasil = $this->db->get_where($this->table, array('id_pasien' => $id_pasien))->row();
		return $hasil;
	}

	
	function addPasien($data){
		$hasil = $this->db->insert($this->table, $data);
		return $hasil;
	}

	function updatePasien($id_pasien, $data){
		$this->db->where('id_pasien', $id_pasien);
		$hasil = $this->db->update($this->table, $data);
		return $hasil;
	}

	function deletePasien($id_pasien){
		$this->db->where('id_pasien', $id_pasien);
		$hasil = $this->db->delete($this->table);
		return $hasil;
	}

}

/* End of file Mod_Pasien.php */
/* Location: ./application/models/Mod_Pasien.php */