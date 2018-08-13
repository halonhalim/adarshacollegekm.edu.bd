<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt : Get Out of the system ..!');

class Login_model extends CI_Model {

	var $table = 'users';

	public function check_user($username, $password) {
		$this->db->select('*')->from($this->table)->where('username', $username)->where('status', 1);
		$user = $this->db->get()->row();
		if (isset($user)) {
			if (verifyHashedPassword($password, $user->encode_password)) {
				return $user;
			}
		}
		return NULL;
	}

	public function login_time($id) {
		$data = array('last_login' => date('Y-m-d H:i:s'));
		$this->db->update($this->table, $data, array('id' => $id));
	}

	public function logout_time($id) {
		$data = array('last_logout' => date('Y-m-d H:i:s'));
		$this->db->update($this->table, $data, array('id' => $id));
	}


}
