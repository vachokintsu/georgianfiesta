<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Front_tours_model extends CI_Model {

	public function filter() {
		$this->db->select('slug_'.$this->input->post('lang').', title_'.$this->input->post('lang').', category, sale, image');
		$this->db->from('tours');
		$this->db->where('active_'.$this->input->post('lang'), 1);
		if(!empty($this->input->post('newsSearchFilter'))):
			$this->db->like('title_'.$this->input->post('lang'), $this->input->post('newsSearchFilter'));
		endif;
		if(!empty($this->input->post('newsFilterCat')) || !empty($this->input->post('newsFilterCatGet'))):
			$newsFilterCat = $this->input->post('newsFilterCat') ? $this->input->post('newsFilterCat') : $this->input->post('newsFilterCatGet');
			$this->db->like('category', $newsFilterCat, 'both');
		endif;

		$this->db->order_by('id', 'DESC');
		$this->db->limit(15, $this->input->post('newsOffset'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function home_tours($limit = null) {
		$this->db->select('*');
		$this->db->from('tours');
		$this->db->order_by('id', 'DESC');
		$this->db->where('active_'.LANG, 1);
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tours_categories() {
		$this->db->select('id, title_'.LANG);
		$this->db->from('tours_cats');
		$this->db->where('active_'.LANG, 1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function read_cat_by_id($ids) {
		if($this->input->post('lang')) {
			$language = $this->input->post('lang');
		} else {
			$language = LANG;
		}
		$this->db->select('id, color, title_'.$language.', active_'.$language);
		$this->db->from('tours_cats');
		$ids = explode(',', $ids);
		foreach($ids as $id):
			$this->db->or_where('id', $id);
		endforeach;
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getBySlug($slug){
		$this->db->select('*');
		$this->db->from('tours');
		$this->db->where('slug_ge',$slug);
		$this->db->or_where('slug_en',$slug);
		$this->db->or_where('slug_ru',$slug);
		$query = $this->db->get();
		$data = $query->row_array();

		if(!empty($data['category'])){
			$data['category'] = $this->getCategoriesWhereIn($data['category']);
		}
		if($data['image_paths'] != '')
			$data['image_paths'] = explode(',', $data['image_paths']);

		return $data;
	}

	public function getCategoriesWhereIn($categories)
	{
			$this->db->select('*');
			$this->db->from('tours_cats');
			$this->db->where_in('id', explode(',', $categories));
			$query = $this->db->get();
			return $query->result_array();
	}

}