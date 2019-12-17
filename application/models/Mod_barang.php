<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_barang extends CI_Model {

	var $table = 'barang';

	
	function getBarangAll(){
		$hasil = $this->db->get($this->table)->result();
		return $hasil;
	}

	function getBarangById($id_barang){
		$hasil = $this->db->get_where($this->table, array('id_barang' => $id_barang))->row();
		return $hasil;
	}

	
	function addBarang($data){
		$hasil = $this->db->insert($this->table, $data);
		return $hasil;
	}

	function updateBarang($id_barang, $data){
		$this->db->where('id_barang', $id_barang);
		$hasil = $this->db->update($this->table, $data);
		return $hasil;
	}

	function tambahStok($id_barang, $stok){
		return $this->db->query(
			"update barang set stok=stok+".$stok." where id_barang='".$id_barang."' ;");
	}

	function kurangStok($id_barang, $stok){
		return $this->db->query(
			"update barang set stok=stok-".$stok." where id_barang='".$id_barang."' ;");
	}

	function deleteBarang($id_barang){
		$this->db->where('id_barang', $id_barang);
		$hasil = $this->db->delete($this->table);
		return $hasil;
	}

}

/* End of file Mod_Barang.php */
/* Location: ./application/models/Mod_Barang.php */