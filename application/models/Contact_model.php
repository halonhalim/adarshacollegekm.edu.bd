<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt : Get Out of the system ..!');

class Contact_model extends CI_Model {

	var $table = 'contact';

	public function index() {
		$query = $this->db->get_where($this->table);
		return $query->row();
	}

	public function save($data, $id) {
		$this->db->update($this->table, $data, array('md5(id)' => $id));

		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
