<?php if (!defined('BASEPATH')) 	exit('No direct script access allowed.');

class MY_Form_validation extends CI_Form_validation {

	public function __construct() {
		parent::__construct();
	}

	// Reset form value after successfully submit
	public function resetForm() {
		$obj = & _get_validation_object();
		foreach ($obj->_field_data as $key) {
			$this->_field_data[$key['field']]['postdata'] = NULL;
		}
		return true;
	}

}
