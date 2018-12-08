<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sidebar_ad_model extends CI_Model {

	public function read_all($search, $num, $start) {
		$this->db->select('id, title_ge, image');
		$this->db->from('sidebar');
		$this->db->like('title_ge', $search);
		$this->db->order_by('id', 'desc');
		$this->db->limit($num, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function data_count($search) {
		$this->db->from('sidebar');
		$this->db->like('title_ge', $search);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function read() {
		$id = $this->uri->segment(4);

		$this->db->select('*');
		$this->db->from('sidebar');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create() {
		$this->db->insert('sidebar',
			array(
				'title_ge' => $this->input->post('title_ge'),
				'title_en' => $this->input->post('title_en'),
				'title_ru' => $this->input->post('title_ru'),

				'active_ge' => $this->input->post('active_ge'),
				'active_en' => $this->input->post('active_en'),
				'active_ru' => $this->input->post('active_ru'),

				'link' => $this->input->post('link'),
				'target' => $this->input->post('target'),
				'image' => $this->input->post('image')
			)
		);
		return $this->db->insert_id();
	}

	public function update() {
		$id = $this->uri->segment(4);

		$this->db->where( array('id' => $id ));
		$this->db->update('sidebar',
			array(
				'title_ge' => $this->input->post('title_ge'),
				'title_en' => $this->input->post('title_en'),
				'title_ru' => $this->input->post('title_ru'),

				'active_ge' => $this->input->post('active_ge'),
				'active_en' => $this->input->post('active_en'),
				'active_ru' => $this->input->post('active_ru'),

				'link' => $this->input->post('link'),
				'target' => $this->input->post('target'),
				'image' => $this->input->post('image')
			)
		);
	}

	public function delete() {
		$id = $this->uri->segment(4);

		$this->db->where('id', $id);
		$this->db->delete('sidebar');
	}

}