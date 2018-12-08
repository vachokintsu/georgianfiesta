<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials_ad_model extends CI_Model {

	public function read_all($search, $num, $start) {
		$this->db->select('id, title_ge, image');
		$this->db->from('testimonials');
		$this->db->like('title_ge', $search);
		$this->db->order_by('id', 'desc');
		$this->db->limit($num, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function data_count($search) {
		$this->db->from('testimonials');
		$this->db->like('title_ge', $search);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function read() {
		$id = $this->uri->segment(4);

		$this->db->select('*');
		$this->db->from('testimonials');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create($langs) {
		$slug = url_title(mb_strtolower($this->input->post('title_en'), 'UTF-8'), 'dash');

		$unique = true;
    	$i = 1;
    	while ($unique) {
        	$this->db->select('slug');
            $this->db->from('testimonials');
            $this->db->where('slug', $slug);
            $query = $this->db->get();
            if($query->num_rows() == 0) {
                $unique = false;
            } else {
                $slug = $slug.'-'.$i;
            }
            $i++;
        }

		$this->db->insert('testimonials',
			array(
				'slug' => $slug,

				'title_ru' => $this->input->post('title_ru'),
				'title_en' => $this->input->post('title_en'),
				'title_ge' => $this->input->post('title_ge'),

				'descr_ru' => $this->input->post('descr_ru'),
				'descr_en' => $this->input->post('descr_en'),
				'descr_ge' => $this->input->post('descr_ge'),
				
				'text_ru' => $this->input->post('text_ru'),
				'text_en' => $this->input->post('text_en'),
				'text_ge' => $this->input->post('text_ge'),

				'profession_ru' => $this->input->post('profession_ru'),
				'profession_en' => $this->input->post('profession_en'),
				'profession_ge' => $this->input->post('profession_ge'),

				'image' => $this->input->post('image')
			)
		);
		return $this->db->insert_id();
	}

	public function update_slugs($langs) {
		$old_slugs = $this->read();
		$old_slug = $old_slugs['slug'];

		$slug = url_title(mb_strtolower($this->input->post('title_en'), 'UTF-8'), 'dash');

		$unique = true;
    	$i = 1;
    	while ($unique) {
    		if($old_slug != $slug) {
            	$this->db->select('slug');
	            $this->db->from('testimonials');
	            $this->db->where('slug', $slug);
	            $query = $this->db->get();
	            if($query->num_rows() == 0) {
	                $unique = false;
	            } else {
	                $slug = $slug.'-'.$i;
	            }
	        } else {
	        	$unique = false;
	        }
            $i++;
        }

		$id = $this->uri->segment(4);
		$this->db->where(array('id' => $id));
        $this->db->update('testimonials',
			array(
				'slug' => $slug
			)
		);
	}

	public function update() {
		$id = $this->uri->segment(4);

        $this->db->where(array('id' => $id));
		$this->db->update('testimonials',
			array(
				'title_ru' => $this->input->post('title_ru'),
				'title_en' => $this->input->post('title_en'),
				'title_ge' => $this->input->post('title_ge'),

				'descr_ru' => $this->input->post('descr_ru'),
				'descr_en' => $this->input->post('descr_en'),
				'descr_ge' => $this->input->post('descr_ge'),
				
				'text_ru' => $this->input->post('text_ru'),
				'text_en' => $this->input->post('text_en'),
				'text_ge' => $this->input->post('text_ge'),

				'profession_ru' => $this->input->post('profession_ru'),
				'profession_en' => $this->input->post('profession_en'),
				'profession_ge' => $this->input->post('profession_ge'),

				'image' => $this->input->post('image')
			)
		);
	}

	public function delete() {
		$id = $this->uri->segment(4);

		$this->db->where('id', $id);
		$this->db->delete('testimonials');
	}

}