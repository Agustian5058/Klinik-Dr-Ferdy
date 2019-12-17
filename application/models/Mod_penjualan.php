<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_penjualan extends CI_Model {

	var $table = 'penjualan';

	
	function getPenjualanAll(){
		$hasil = $this->db->get($this->table)->result();
		return $hasil;
	}

	function getPenjualanById($id_penjualan){
		$hasil = $this->db->get_where($this->table, array('id_penjualan' => $id_penjualan))->row();
		return $hasil;
	}

	function getPenjualanByIdPasien($id_pasien){
		return $this->db->query("SELECT * from penjualan where id_pasien='".$id_pasien."' order by tanggal desc")->result();
	}
	
	function addPenjualan($data){
		$hasil = $this->db->insert($this->table, $data);
		return $hasil;
	}

	function updatePenjualan($id_penjualan, $data){
		$this->db->where('id_penjualan', $id_penjualan);
		$hasil = $this->db->update($this->table, $data);
		return $hasil;
	}

	function deletePenjualan($id_penjualan){
		$this->db->where('id_penjualan', $id_penjualan);
		$hasil = $this->db->delete($this->table);
		return $hasil;
	}

	function getLastID()
	{
		return $this->db->query("SELECT AUTO_INCREMENT from information_schema.TABLES where TABLE_SCHEMA='klinik_dr_fredy' AND TABLE_NAME='penjualan'")->row();
	}

}

/* End of file Mod_Penjualan.php */
/* Location: ./application/models/Mod_Penjualan.php */