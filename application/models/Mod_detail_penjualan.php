<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_detail_penjualan extends CI_Model {

	var $table = 'detail_penjualan';

	
	function getDetailPenjualanAll(){
		$hasil = $this->db->get($this->table)->result();
		return $hasil;
	}

	function getDetailPenjualanById($id_penjualan){
		return $this->db->query("SELECT 
			detail_penjualan.id_penjualan as id_penjualan,
		 	detail_penjualan.id_barang as id_barang,
		  	detail_penjualan.jumlah as jumlah,
		   	detail_penjualan.total as total,
		    detail_penjualan.diskon as diskon,
		    barang.nama_barang as nama_barang
		     from detail_penjualan join barang on detail_penjualan.id_barang=barang.id_barang where detail_penjualan.id_penjualan='".$id_penjualan."'")->result();
	}

	
	function addDetailPenjualan($data){
		$hasil = $this->db->insert($this->table, $data);
		return $hasil;
	}

	function updateDetailPenjualan($id_detail_penjualan, $data){
		$this->db->where('id_detail_penjualan', $id_detail_penjualan);
		$hasil = $this->db->update($this->table, $data);
		return $hasil;
	}

	function deleteDetailPenjualan($id_detail_penjualan){
		$this->db->where('id_detail_penjualan', $id_detail_penjualan);
		$hasil = $this->db->delete($this->table);
		return $hasil;
	}

}

/* End of file Mod_DetailPenjualan.php */
/* Location: ./application/models/Mod_DetailPenjualan.php */