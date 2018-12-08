<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Front_contact_model extends CI_Model {

	public function getInfo() {
		$this->db->select('*');
		$this->db->from('contact');
		$this->db->where('id',1);
		$query = $this->db->get();
		$data =  $query->row_array();
		$data['email'] = explode(',', $data['email']);
		$data['phone'] = explode(',', $data['phone']);
		$data['fax'] = explode(',', $data['fax']);
		$data['bus_'.LANG] = explode(',', $data['bus_'.LANG]);
		return $data;
	}

}