 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model {

    var $table = 'user';

	function cekLogin($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user')->row(); // result()
	}

	function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function addUser($data){
        $hasil = $this->db->insert($this->table, $data);
        return $hasil;
    }

}

/* End of file Mod_user.php */
/* Location: ./application/models/Mod_user.php */