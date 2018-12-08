<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Front_photo_gallery_model extends CI_Model {

	/* Search */
	public function filter() {
		$this->db->select('*');
		$this->db->from('photo_gallery');
		$this->db->where('active_'.$this->input->post('lang'), 1);
		if(!empty($this->input->post('newsSearchFilter'))):
			$this->db->like('title_'.$this->input->post('lang'), $this->input->post('newsSearchFilter'));
		endif;
		if(!empty($this->input->post('newsFilterCat')) || !empty($this->input->post('newsFilterCatGet'))):
			$newsFilterCat = $this->input->post('newsFilterCat') ? $this->input->post('newsFilterCat') : $this->input->post('newsFilterCatGet');
			$this->db->like('category', $newsFilterCat, 'both');
		endif;
		if(!empty($this->input->post('newsDatepicker'))):
			$this->db->like('date', $this->input->post('newsDatepicker'));
		endif;
		$this->db->order_by('id', 'DESC');
		$this->db->limit(15, $this->input->post('newsOffset'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getBySlug($slug){
		$this->db->select('*');
		$this->db->from('photo_gallery');
		$this->db->where('slug',$slug);
		$query = $this->db->get();
		$data = $query->row_array();

		if(!empty($data['category'])){
			$data['category'] = $this->getCategoriesWhereIn($data['category']);
		}

		return $data;
	}

}