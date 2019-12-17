<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->library('pdf_report');
		$this->load->library('upload');
		$this->load->helper('download');

		$this->load->model('Mod_user');
		$this->load->model('Mod_riwayat');
		$this->load->model('Mod_barang');
		$this->load->model('Mod_pasien');
		$this->load->model('Mod_penjualan');
		$this->load->model('Mod_detail_penjualan');

		if(!$this->session->userdata('is_admin') == TRUE){
			redirect('login','refresh');
		}
	}


	public function index($param='',$param1='')
	{	
		$username = $this->session->userdata('user_name');
		if ($param == '') {
			$pageData['tampilan'] = 'data_table';

			$dataPasien = $this->Mod_pasien->getPasienAll();

            $table ="<thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pasien</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>";
             $Nomor = 0;

            foreach ($dataPasien as $pasien) { 
            	$Nomor++;
            	$table = $table . "<tr><td style='text-align: center;'>".$Nomor."</td>";
            	$table = $table . "<td style='text-align: center;'>".$pasien->nama_pasien."</td>";
            	$table = $table . "<td style='text-align: center;'>".$pasien->jenis_kelamin."</td>";
            	$table = $table . "<td style='text-align: center;'>".$pasien->umur."</td>";
            	$table = $table . "<td style='text-align: center;'>".$pasien->alamat."</td>";
            	$table = $table . "<td style='text-align: center;'>".$pasien->no_hp."</td>";
            	$table = $table . "<td style='text-align: center;'>

            	<a href='".base_url()."main/riwayat/".$pasien->id_pasien."'>
            		<button class='btn btn-sm btn-success'><i><b>Lihat Riwayat</b></i></button>
            	</a></td>";
            	$table = $table . "</tr>";
            }
            $table = $table . "
              </tbody>";

            $pageData['hasil'] = $table;
            $pageData['tampilan'] = 'hasil';
		}
		$pageData['page_title'] = 'Halaman Dashboard';
		$pageData['page_name'] = 'dashboard';
		$this->load->view('main/index', $pageData);
	}

	public function pasien($param='',$param1='')
	{
		if ($param == '') {
			
			$pageData['tampilan'] = 'data_table';

			$data = array();
			$dataPasien = $this->Mod_pasien->getPasienAll();
			$no = 0;
			foreach ($dataPasien as $list) {
				$no++;
				$data[] = (object) array(
					'Nomor'			=> $no,
					'nama_pasien'	=> $list->nama_pasien,
					'jenis_kelamin'	=> $list->jenis_kelamin,
					'umur'			=> $list->umur,
					'alamat'		=> $list->alamat,
					'no_hp'			=> $list->no_hp,
					'Aksi'			=> '
					<a href="'.base_url().'Main/pasien/update/'.$list->id_pasien.'" class="btn btn-warning btn-sm">
					<i class="fa fa-edit"></i>
					</a>
					<a href="javascript:alertDeleteData('.$list->id_pasien.')" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>
					</a>'
				);
			}
			$pageData['data_pasien'] = $data;
		}

		else if ($param == 'add') {

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$nama_pasien = $this->input->post('nama_pasien');
				$jenis_kelamin = $this->input->post('jenis_kelamin');
				$umur = $this->input->post('umur');
				$alamat = $this->input->post('alamat');
				$no_hp = $this->input->post('no_hp');

				$dataInsert = array(
					'nama_pasien'	=> $nama_pasien,
					'jenis_kelamin'	=> $jenis_kelamin,
					'umur'			=> $umur,
					'alamat'		=> $alamat,
					'no_hp'			=> $no_hp,
				);

				$insert = $this->Mod_pasien->addPasien($dataInsert);
				if ($insert) {
					$this->session->set_flashdata('alert_type', 'success');
					$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Pasien berhasil ditambahkan');
					redirect(base_url().'Main/pasien','refresh');
				} else {
					$this->session->set_flashdata('alert_type', 'danger');
					$this->session->set_flashdata('alert_text', '<strong>Gagal .. !</strong>, Data Pasien gagal ditambahkan');
					redirect(base_url().'Main/pasien/add','refresh'); 
				}

			} else {
				$pageData['tampilan'] = 'add';
			}
		}
		else if ($param == 'update'){

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$id_pasien = $this->input->post('id_pasien');
				$nama_pasien = $this->input->post('nama_pasien');
				$jenis_kelamin = $this->input->post('jenis_kelamin');
				$umur = $this->input->post('umur');
				$alamat = $this->input->post('alamat');
				$no_hp = $this->input->post('no_hp');

				$dataEdit = array(
					'nama_pasien'	=> $nama_pasien,
					'jenis_kelamin'	=> $jenis_kelamin,
					'umur'			=> $umur,
					'alamat'		=> $alamat,
					'no_hp'			=> $no_hp,
				);

				$update = $this->Mod_pasien->updatePasien($id_pasien, $dataEdit);
				if ($update) {
					$this->session->set_flashdata('alert_type', 'success');
					$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Pasien berhasil diupdate');
					redirect(base_url().'Main/pasien','refresh');
				} else {
					$this->session->set_flashdata('alert_type', 'danger');
					$this->session->set_flashdata('alert_text', '<strong>Gagal .. !</strong>, Data Pasien gagal diupdate');
					redirect(base_url().'Main/pasien','refresh');
				}
			} else {
				$id_pasien = $param1;
				// ambil data dari db
				$data = $this->Mod_pasien->getPasienById($id_pasien);
				
				$pageData['data_pasien'] = $data;
				$pageData['tampilan'] = 'update';
			}
		}

		else if ($param == 'delete'){

			if ($param1) {

				$id_pasien = $param1;
				
				$delete = $this->Mod_pasien->deletePasien($id_pasien);
				if ($delete) {
					$this->session->set_flashdata('alert_type', 'success');
					$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Pasien berhasil dihapus');
				} else {
					$this->session->set_flashdata('alert_type', 'danger');
					$this->session->set_flashdata('alert_text', '<strong>Gagal .. !</strong>, Data Pasien gagal dihapus');
				}
			} 
			
			redirect(base_url().'Main/pasien','refresh');

		}

		else {
			redirect(base_url().'Main/pasien','refresh');
		}

		if ($param == 'delete'){

			$pageData['tampilan'] = 'delete';

			$id_pasien = $this->input->post('id_pasien');

			$delete = $this->Mod_pasien->deletePasien($id_pasien);
		}
		$pageData['page_title'] = 'Halaman Data Pasien';
		$pageData['page_name'] = 'pasien';
		$this->load->view('Main/index', $pageData);
	}

	public function barang($param='',$param1='')
	{
		if ($param == '') {
			
			$pageData['tampilan'] = 'data_table';

			$data = array();
			$dataBarang = $this->Mod_barang->getBarangAll();
			$no = 0;
			foreach ($dataBarang as $list) {
				$no++;
				$data[] = (object) array(
					'Nomor'				=> $no,
					'nama_barang'		=> $list->nama_barang,
					'harga'				=> $list->harga,
					'stok'				=> $list->stok,
					'keterangan_barang'	=> $list->keterangan_barang,
					'Aksi'			=> '
					<a href="'.base_url().'Main/barang/update/'.$list->id_barang.'" class="btn btn-warning btn-sm">
					<i class="fa fa-edit"></i>
					</a>
					<a href="javascript:alertDeleteData('.$list->id_barang.')" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>
					</a>'
				);
			}
			$pageData['data_barang'] = $data;
		}

		else if ($param == 'add') {

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$nama_barang 	= $this->input->post('nama_barang');
				$harga = $this->input->post('harga');
				$stok = $this->input->post('stok');
				$keterangan_barang = $this->input->post('keterangan_barang');

				$dataInsert = array(
					'nama_barang'		=> $nama_barang,
					'harga'				=> $harga,
					'stok'				=> $stok,
					'keterangan_barang'	=> $keterangan_barang,
				);

				$insert = $this->Mod_barang->addBarang($dataInsert);
				if ($insert) {
					$this->session->set_flashdata('alert_type', 'success');
					$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Barang berhasil ditambahkan');
					redirect(base_url().'Main/barang','refresh');
				} else {
					$this->session->set_flashdata('alert_type', 'danger');
					$this->session->set_flashdata('alert_text', '<strong>Gagal .. !</strong>, Data Barang gagal ditambahkan');
					redirect(base_url().'Main/barang/add','refresh'); 
				}

			} else {
				$pageData['tampilan'] = 'add';
			}
		}
		else if ($param == 'update'){

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$id_barang = $this->input->post('id_barang');
				$nama_barang = $this->input->post('nama_barang');
				$harga = $this->input->post('harga');
				$stok = $this->input->post('stok');
				$keterangan_barang = $this->input->post('keterangan_barang');

				$dataEdit = array(
					'nama_barang'		=> $nama_barang,
					'harga'				=> $harga,
					'stok'				=> $stok,
					'keterangan_barang'	=> $keterangan_barang,
				);

				$update = $this->Mod_barang->updateBarang($id_barang, $dataEdit);
				if ($update) {
					$this->session->set_flashdata('alert_type', 'success');
					$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Barang berhasil diupdate');
					redirect(base_url().'Main/barang','refresh');
				} else {
					$this->session->set_flashdata('alert_type', 'danger');
					$this->session->set_flashdata('alert_text', '<strong>Gagal .. !</strong>, Data Barang gagal diupdate');
					redirect(base_url().'Main/barang','refresh');
				}
			} else {
				$id_barang = $param1;
				// ambil data dari db
				$data = $this->Mod_barang->getBarangById($id_barang);
				
				$pageData['data_barang'] = $data;
				$pageData['tampilan'] = 'update';
			}
		}

		else if ($param == 'delete'){

			if ($param1) {

				$id_barang = $param1;
				
				$delete = $this->Mod_barang->deleteBarang($id_barang);
				if ($delete) {
					$this->session->set_flashdata('alert_type', 'success');
					$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Barang berhasil dihapus');
				} else {
					$this->session->set_flashdata('alert_type', 'danger');
					$this->session->set_flashdata('alert_text', '<strong>Gagal .. !</strong>, Data Barang gagal dihapus');
				}
			} 
			
			redirect(base_url().'Main/barang','refresh');

		}

		else {
			redirect(base_url().'Main/barang','refresh');
		}

		if ($param == 'delete'){

			$pageData['tampilan'] = 'delete';

			$id_barang = $this->input->post('id_barang');

			$delete = $this->Mod_barang->deleteBarang($id_barang);
		}
		$pageData['page_title'] = 'Halaman Data Barang';
		$pageData['page_name'] = 'barang';
		$this->load->view('Main/index', $pageData);
	}

	public function stok($param='',$param1='')
	{
		if ($param == '') {
			
			$pageData['tampilan'] = 'data_table';

			$data = array();
			$dataBarang = $this->Mod_barang->getBarangAll();
			$no = 0;
			foreach ($dataBarang as $list) {
				$no++;
				$data[] = (object) array(
					'Nomor'				=> $no,
					'nama_barang'		=> $list->nama_barang,
					'harga'				=> $list->harga,
					'stok'				=> $list->stok,
					'keterangan_barang'	=> $list->keterangan_barang,
				);
			}
			$pageData['data_stok'] = $data;
		}
		else if ($param == 'add'){
			$pageData['barang'] 	= $this->Mod_barang->getBarangAll();
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$id_barang = $this->input->post('id_barang');
				$tanggal = date('Y-m-d');
				$user = $this->input->post('user');
				$stok = $this->input->post('stok');
				$nama_barang = $this->Mod_barang->getBarangById($id_barang);

				if($stok >= 0){
					$dataRiwayat = array(
					'tanggal_riwayat'		=> $tanggal,
					'keterangan_riwayat'	=> $user . " Telah Menambahkan ".$nama_barang->nama_barang." sebanyak ". $stok ." pada tanggal ".$tanggal,
					'id_barang'				=> $id_barang,
					'stok'					=> $stok,
				);
				}else{
					$dataRiwayat = array(
					'tanggal_riwayat'		=> $tanggal,
					'keterangan_riwayat'	=> $user . " Telah Mengurangkan ".$nama_barang->nama_barang." sebanyak ". $stok ." pada tanggal ".$tanggal,
					'id_barang'				=> $id_barang,
					'stok'					=> $stok,
				);
				}
				
				$dataEdit = array(
					'stok'				=> $stok + $nama_barang->stok,
				);
				$insert = $this->Mod_riwayat->addRiwayat($dataRiwayat);
				$update = $this->Mod_barang->updateBarang($id_barang, $dataEdit);
				if ($update) {
					$this->session->set_flashdata('alert_type', 'success');
					$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Stok Barang berhasil dirubah');
					redirect(base_url().'Main/stok','refresh');
				} else {
					$this->session->set_flashdata('alert_type', 'danger');
					$this->session->set_flashdata('alert_text', '<strong>Gagal .. !</strong>, Data 
						Stok Barang gagal dirubah');
					redirect(base_url().'Main/stok','refresh');
				}
			} else {
				$id_barang = $param1;
				// ambil data dari db
				$data = $this->Mod_barang->getBarangById($id_barang);
				
				$pageData['data_barang'] = $data;
				$pageData['tampilan'] = 'add';
			}
		}

		else {
			redirect(base_url().'Main/stok','refresh');
		}
		$pageData['page_title'] = 'Halaman Data Barang';
		$pageData['page_name'] = 'stok';
		$this->load->view('Main/index', $pageData);
	}

	public function penjualan($param='',$param1='',$param2='',$param3='')
	{
		if ($param == '') {
			
			$pageData['tampilan'] = 'data_table';

			$data = array();
			$dataPasien = $this->Mod_pasien->getPasienAll();
			$no = 0;
			foreach ($dataPasien as $list) {
				$no++;
				$data[] = (object) array(
					'Nomor'			=> $no,
					'nama_pasien'	=> $list->nama_pasien,
					'jenis_kelamin'	=> $list->jenis_kelamin,
					'umur'			=> $list->umur,
					'alamat'		=> $list->alamat,
					'no_hp'			=> $list->no_hp,
					'Aksi'			=> '
					<a href="'.base_url().'Main/penjualan/riwayat/'.$list->id_pasien.'">
					<button class="btn btn-sm btn-success"><i><b>Lihat Riwayat</b></i></button>
					</a>'
				);
			}
			$pageData['data_pasien'] = $data;
		}
		else if ($param == 'riwayat') {
			$id_pasien = $param1;
			if($param1 == 'add'){
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					$id_pasien = $this->input->post('id_pasien');
					$nomor = $this->input->post('nomor');
					$penjualan = array();
					for($i = 1; $i <= $nomor; $i++){
						$penjualan[$i] = array(
							'id_barang' 	=> $this->input->post('id_barang'.$i),
							'nama_barang' 	=> $this->input->post('nama_barang'.$i),
							'harga_barang' 	=> $this->input->post('harga_barang'.$i),
							'jumlah' 		=> $this->input->post('jumlah'.$i),
							'diskon' 		=> $this->input->post('diskon'.$i),
							'total' 		=> $this->input->post('jumlah'.$i) * $this->input->post('harga_barang'.$i),
							'total_bayar' 		=> (($this->input->post('jumlah'.$i) * $this->input->post('harga_barang'.$i)) - $this->input->post('diskon'.$i)),
						);
					}
					$pageData['penjualan'] = $penjualan;
					$pageData['nomor'] = $nomor;
					$pageData['id_pasien'] = $id_pasien;
					$pageData['tampilan'] = 'review';
				} else {
					$pageData['id_pasien'] = $param2;
					$pageData['data_barang'] = $this->Mod_barang->getBarangAll();
					$pageData['tampilan'] = 'add';
				}
			} else if($param1 == 'review'){
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					$id_pasien = $this->input->post('id_pasien');
					$nomor = $this->input->post('nomor');
					$total_penjualan = $this->input->post('total_penjualan');
					$total_keseluruhan = $this->input->post('total_keseluruhan');
					$keterangan_penjualan = $this->input->post('keterangan_penjualan');
					$user = $this->input->post('user');
					$penjualan = array();
					$dataPenjualan = array(
						'id_pasien'				=> $id_pasien,
						'username'				=> $user,
						'tanggal'				=> date('Y-m-d'),
						'total_penjualan'		=> $total_penjualan,
						'total_pembayaran'		=> $total_keseluruhan,
						'keterangan_penjualan'	=> $keterangan_penjualan,
					);

					$insert = $this->Mod_penjualan->addPenjualan($dataPenjualan);
					if ($insert) {
						$LastID = $this->Mod_penjualan->getLastID();
						print_r($LastID->AUTO_INCREMENT - 1);
						for($i = 1; $i < $nomor; $i++){
							$penjualan[$i] = array(
								'id_penjualan' 	=> ($LastID->AUTO_INCREMENT - 1),
								'id_barang' 	=> $this->input->post('id_barang'.$i),
								'jumlah' 		=> $this->input->post('jumlah'.$i),
								'diskon' 		=> $this->input->post('diskon'.$i),
								'total' 		=> $this->input->post('total_bayar'.$i),
							);
							$input = $this->Mod_detail_penjualan->addDetailPenjualan($penjualan[$i]);
						}
						$this->session->set_flashdata('alert_type', 'success');
						$this->session->set_flashdata('alert_text', '<strong>Berhasil .. !</strong>, Data Penjualan berhasil ditambahkan');
						redirect(base_url().'Main/penjualan/riwayat/'.$id_pasien,'refresh');
					}else{
						$this->session->set_flashdata('alert_type', 'warning');
						$this->session->set_flashdata('alert_text', '<strong>GAGAL .. !</strong>, Data Barang GAGAL ditambahkan');
						redirect(base_url().'Main/penjualan/riwayat/'.$id_pasien,'refresh');
					}
					$pageData['penjualan'] = $penjualan;
					$pageData['nomor'] = $nomor;
					$pageData['id_pasien'] = $id_pasien;
					$pageData['tampilan'] = 'review';
				} else {
					$pageData['id_pasien'] = $param2;
					$pageData['data_barang'] = $this->Mod_barang->getBarangAll();
					$pageData['tampilan'] = 'add';
				}
			} else if($param1 == 'detail'){
				$pageData['id_pasien'] = $param2;
				$pageData['id_penjualan'] = $param3;
				$data = array();
				$dataPenjualan = $this->Mod_detail_penjualan->getDetailPenjualanById($param3);
				$no = 0;
				foreach ($dataPenjualan as $list) {
					$no++;
					$data[] = (object) array(
						'Nomor'			=> $no,
						'id_barang'		=> $list->id_barang,
						'nama_barang'	=> $list->nama_barang,
						'jumlah'		=> $list->jumlah,
						'total'			=> $list->total,
						'diskon'		=> $list->diskon,
					);
				}
				$pageData['data_detail'] = $data;
				$pageData['tampilan'] = 'detail';
			} else{
				$pageData['id_pasien'] = $param2;
				$data = array();
				$dataPenjualan = $this->Mod_penjualan->getPenjualanByIdPasien($id_pasien);

				$no = 0;
				foreach ($dataPenjualan as $list) {
					$no++;
					$data[] = (object) array(
						'Nomor'					=> $no,
						'tanggal'				=> $list->tanggal,
						'id_penjualan'			=> $list->id_penjualan,
						'id_pasien'				=> $list->id_pasien,
						'username'				=> $list->username,
						'total_penjualan'		=> $list->total_penjualan,
						'total_pembayaran'		=> $list->total_pembayaran,
						'keterangan_penjualan'	=> $list->keterangan_penjualan,
						'Aksi'					=> '
						<a href="'.base_url().'Main/penjualan/riwayat/detail/'.$list->id_pasien.'/'.$list->id_penjualan.'">
						<button class="btn btn-sm btn-success"><i><b>Lihat Riwayat</b></i></button>
						</a>'
					);
				}
				$pageData['data_pasien'] = $data;
				$pageData['tampilan'] = 'riwayat';
			}
		}
		else {
			redirect(base_url().'Main/penjualan','refresh');
		}
		$pageData['page_title'] = 'Halaman Data Pasien';
		$pageData['page_name'] = 'penjualan';
		$this->load->view('Main/index', $pageData);
	}

	public function laporan_stok($param='',$param1='')
	{
		if ($param == '') {
			$pageData['tampilan'] = 'data_table';
			$data = array();
			$dataRiwayat= $this->Mod_riwayat->getRiwayatAll();
			$no = 0;
			foreach ($dataRiwayat as $list) {
				$no++;
				$data[] = (object) array(
					'Nomor'					=> $no,
					'tanggal_riwayat'		=> $list->tanggal_riwayat,
					'keterangan_riwayat'	=> $list->keterangan_riwayat,
				);
			}
			$pageData['riwayat'] = $data;
		} else {
				$id_barang = $param1;
				// ambil data dari db
				$dataRiwayat= $this->Mod_riwayat->getRiwayatAll();
				
				$pageData['data_barang'] = $data;
				$pageData['tampilan'] = 'add';
		}
		$pageData['page_title'] = 'Halaman Laporan Stok';
		$pageData['page_name'] = 'laporan_stok';
		$this->load->view('Main/index', $pageData);
	}

}