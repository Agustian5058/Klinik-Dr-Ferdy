<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mod_user');
	}	

	public function index()
	{
		$pageData['page_title'] = 'Halaman Login';
		$this->load->view('login/index', $pageData);
	}

	public function cek_login(){

		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');

		$cekUser = $this->Mod_user->cekLogin($data['username'], $data['password']);

		if ($cekUser){
			$dataLogin['nama_user'] 	= $cekUser->nama_user;
			$dataLogin['username'] 		= $cekUser->username;
			$dataLogin['user_level'] 	= $cekUser->level;

			if ($cekUser->level == 'admin') {
				$dataLogin['is_admin'] = TRUE;
				$this->session->set_userdata($dataLogin);
				redirect('Main','refresh');
			} else if ($cekUser->level == 'user') {
				$dataLogin['is_user'] = TRUE;
				$this->session->set_userdata($dataLogin);
				redirect('user','refresh');
			}
		} else {
			redirect('login/index','refresh');
		}

	}

	public function logout(){
		session_destroy();
		redirect('login/index','refresh');
	}

}