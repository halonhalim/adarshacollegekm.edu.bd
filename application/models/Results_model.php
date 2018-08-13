<?php if (!defined('BASEPATH')) 	exit('Hacking Attempt : Get Out of the system ..!');

class Results_model extends CI_Model {

	var $table = 'results';
	var $column_order = array(null, 'class_name', 'year', 'title');
	var $column_search = array('class_name', 'year', 'title');
	var $order = array('results.id' => 'DESC');

	private function search() {
		$this->db->select('class_name, results.*');
		$this->db->from($this->table);
		$this->db->join('classes', 'results.class_id=classes.id', 'LEFT');
		$i = 0;
		foreach ($this->column_search as $col) { // loop column 
			if (isset($_POST['search']['value']) && !empty($_POST['search']['value'])) {
				$_POST['search']['value'] = $_POST['search']['value'];
			} else {
				$_POST['search']['value'] = '';
			}
			if ($_POST['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start();
					$this->db->like($col, $_POST['search']['value'], 'after');
				} else {
					$this->db->or_like($col, $_POST['search']['value'], 'after');
				}
				if (count($this->column_search) - 1 == $i) { //last loop
					$this->db->group_end(); //close bracket
				}
			}
			$i++;
		}

		if (isset($_POST['order'])) { // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function count_filtered() {
		$this->search();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all() {
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_all() {
		$this->search();

		if (isset($_POST['length']) && $_POST['length'] < 1) {
			$_POST['length'] = '10';
		} else {
			$_POST['length'] = $_POST['length'];
		}

		if (isset($_POST['start']) && $_POST['start'] > 1) {
			$_POST['start'] = $_POST['start'];
		}

		$this->db->limit($_POST['length'], $_POST['start']);
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id) {
		$query = $this->db->get_where($this->table, array('md5(id)' => $id));
		return $query->row();
	}

	public function save($data) {
		$this->db->insert($this->table, $data);

		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update($data, $id) {
		$this->db->update($this->table, $data, array('md5(id)' => $id));

		if ($this->db->affected_rows() == 1) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete($id) {
		$this->db->delete($this->table, array('md5(id)' => $id));

		if ($this->db->affected_rows() == 1)
			return TRUE;
		else
			return FALSE;
	}
	
	// Script for site
	
	public function result_list () {
		$this->db->select('class_name, results.*');
		$this->db->from($this->table);
		$this->db->join('classes', 'results.class_id=classes.id', 'LEFT');
		$this->db->order_by('id', 'DESC');
		return $this->db->get()->result();
	}

}
