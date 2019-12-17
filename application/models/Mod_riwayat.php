<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_riwayat extends CI_Model {

	var $table = 'riwayat_barang';

	
	function getRiwayatAll(){
		$hasil = $this->db->get($this->table)->result();
		return $hasil;
	}

	function getRiwayatById($id_riwayat){
		$hasil = $this->db->get_where($this->table, array('id_riwayat' => $id_riwayat))->row();
		return $hasil;
	}

	
	function addRiwayat($data){
		$hasil = $this->db->insert($this->table, $data);
		return $hasil;
	}

	function updateRiwayat($id_riwayat, $data){
		$this->db->where('id_riwayat', $id_riwayat);
		$hasil = $this->db->update($this->table, $data);
		return $hasil;
	}

	function deleteRiwayat($id_riwayat){
		$this->db->where('id_riwayat', $id_riwayat);
		$hasil = $this->db->delete($this->table);
		return $hasil;
	}

}

/* End of file Mod_Riwayat.php */
/* Location: ./application/models/Mod_Riwayat.php */