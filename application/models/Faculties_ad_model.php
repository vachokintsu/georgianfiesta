<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faculties_ad_model extends CI_Model {

	public function read_parents() {
		$this->db->select('id, title_ge, sort');
		$this->db->from('faculties');
		$this->db->order_by('sort', 'ASC');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function read() {
		$id = $this->uri->segment(4);

		$this->db->select('*');
		$this->db->from('faculties');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create() {


		$this->db->insert('faculties',
			array(

				'title_ge' => $this->input->post('title_ge'),
				'title_en' => $this->input->post('title_en'),
				'title_ru' => $this->input->post('title_ru'),

				'active_ge' => $this->input->post('active_ge'),
				'active_en' => $this->input->post('active_en'),
				'active_ru' => $this->input->post('active_ru')
			)
		);
		return $this->db->insert_id();
	}


	public function update() {
		$id = $this->uri->segment(4);
        $this->db->where(array('id' => $id));
		$this->db->update('faculties',
			array(
				'title_ge' => $this->input->post('title_ge'),
				'title_en' => $this->input->post('title_en'),
				'title_ru' => $this->input->post('title_ru'),

				'active_ge' => $this->input->post('active_ge'),
				'active_en' => $this->input->post('active_en'),
				'active_ru' => $this->input->post('active_ru')
			)
		);
	}

	public function update_sorting() {
		$faculties_data = $this->input->get('faculties');

		foreach ($faculties_data as $key) {
			$this->db->where(array('id' => $key['id']));
			$this->db->update('faculties',
				array(
					'sort' => $key['number']
				)
			);
		}
	}

	public function delete() {
		$id = $this->uri->segment(4);

		$this->db->where('id', $id);
		$this->db->delete('faculties');
	}

}