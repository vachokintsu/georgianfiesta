<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia_tv_cats_ad_model extends CI_Model {

	
	private $chars_ge = ['ა' =>'a', 'ბ' =>'b', 'გ' =>'g', 'დ' =>'d', 'ე' =>'e', 'ვ' =>'v', 'ზ' =>'z', 'თ' =>'T', 'ი' =>'i', 'კ' =>'k', 'ლ' =>'l', 'მ' =>'m', 'ნ' =>'n', 'ო' =>'o', 'პ' =>'p', 'ჟ' =>'J', 'რ' =>'r', 'ს' =>'s', 'ტ' =>'t', 'უ' =>'u', 'ფ' =>'f', 'ქ' =>'q', 'ღ' =>'R', 'ყ' =>'y', 'შ' =>'S', 'ჩ' =>'C', 'ც' =>'c', 'ძ' =>'Z', 'წ' =>'w', 'ჭ' =>'W', 'ხ' =>'x', 'ჯ' =>'j','ჰ'=>'h'];
	private $chars_ru =	['А' => 'A', 'а' => 'a', 'Б' => 'B', 'б' => 'b', 'В' => 'V', 'в' => 'v', 'Г' => 'G', 'г' => 'g', 'Д' => 'D', 'д' => 'd', 'Е' => 'E', 'е' => 'E', 'Ё' => '', 'ё' => '', 'Ж' => 'J', 'ж' => 'j', 'З' => 'Z', 'з' => 'z', 'И' => 'I', 'и' => 'i', 'Й' => '', 'й' => '', 'К' => 'K', 'к' => 'k', 'Л' => 'L', 'л' => 'l', 'М' => 'M', 'м' => 'm', 'Н' => 'N', 'н' => 'n', 'О' => 'O', 'о' => 'o', 'П' => 'P', 'п' => 'p', 'Р' => 'R', 'р' => 'r', 'С' => 'S', 'с' => 's', 'Т' => 'T', 'т' => 't', 'У' => 'U', 'у' => 'u', 'Ф' => 'F', 'ф' => 'f', 'Х' => 'X', 'х' => 'x', 'Ц' => 'C', 'ц' => 'c', 'Ч' => 'Ch', 'ч' => 'ch', 'Ш' => 'Sh', 'ш' => 'sh', 'Щ' => 'Shsh', 'щ' => 'shsh', 'Ъ' => '', 'ъ' => '', 'ы' => '', 'ы' => '', 'Ь' => '', 'ь' => '', 'Э' => 'Z', 'э' => 'z', 'Ю' => '', 'ю' => '', 'Я' => '', 'я' => ''];

	private function translate_slug()
	{
		$slug = url_title($this->input->post('title_en'), 'dash');
		if(empty($slug))
			$slug = url_title($this->input->post('title_ge'), 'dash');
		if(empty($slug))
			$slug = url_title($this->input->post('title_ru'), 'dash');

		$slug = preg_split('/(?<!^)(?!$)/u', $slug );
		for ($i=0; $i < count($slug); $i++) {
			if(isset($this->chars_ge[$slug[$i]])) $slug[$i] = $this->chars_ge[$slug[$i]];
			if(isset($this->chars_ru[$slug[$i]])) $slug[$i] = $this->chars_ru[$slug[$i]];
		}

		$slug = implode($slug);

		$unique = true;
    	$i = 1;
    	while ($unique) {
        	$this->db->select('slug');
            $this->db->from('multimedia_tv_cats');
            $this->db->where('slug', $slug);
            $query = $this->db->get();
            if($query->num_rows() == 0) {
                $unique = false;
            } else {
                $slug = $slug.'-'.$i;
            }
            $i++;
        }
		return $slug;
	}

	public function read_parents() {
		$this->db->select('id, title_ge, sort');
		$this->db->from('multimedia_tv_cats');
		$this->db->order_by('sort', 'ASC');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function read() {
		$id = $this->uri->segment(4);

		$this->db->select('*');
		$this->db->from('multimedia_tv_cats');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function create() {
		$slug = $this->translate_slug();

		$this->db->insert('multimedia_tv_cats',
			array(
				'slug' => $slug,

				'title_ge' => $this->input->post('title_ge'),
				'title_en' => $this->input->post('title_en'),
				'title_ru' => $this->input->post('title_ru'),

				'descr_ge' => $this->input->post('descr_ge'),
				'descr_en' => $this->input->post('descr_en'),
				'descr_ru' => $this->input->post('descr_ru'),

				'active_ge' => $this->input->post('active_ge'),
				'active_en' => $this->input->post('active_en'),
				'active_ru' => $this->input->post('active_ru'),

				'color' => $this->input->post('color')
			)
		);
		return $this->db->insert_id();
	}

	public function update_slugs($langs) {
		$slug = $this->translate_slug();

		$id = $this->uri->segment(4);
		$this->db->where(array('id' => $id));
        $this->db->update('multimedia_tv_cats',
			array(
				'slug' => $slug
			)
		);
	}

	public function update() {
		$id = $this->uri->segment(4);
        $this->db->where(array('id' => $id));
		$this->db->update('multimedia_tv_cats',
			array(
				'title_ge' => $this->input->post('title_ge'),
				'title_en' => $this->input->post('title_en'),
				'title_ru' => $this->input->post('title_ru'),

				'descr_ge' => $this->input->post('descr_ge'),
				'descr_en' => $this->input->post('descr_en'),
				'descr_ru' => $this->input->post('descr_ru'),

				'active_ge' => $this->input->post('active_ge'),
				'active_en' => $this->input->post('active_en'),
				'active_ru' => $this->input->post('active_ru'),

				'color' => $this->input->post('color')
			)
		);
	}

	public function update_sorting() {
		$multimedia_tv_cats_data = $this->input->get('multimedia_tv_cats');

		foreach ($multimedia_tv_cats_data as $key) {
			$this->db->where(array('id' => $key['id']));
			$this->db->update('multimedia_tv_cats',
				array(
					'sort' => $key['number']
				)
			);
		}
	}

	public function delete() {
		$id = $this->uri->segment(4);

		$this->db->where('id', $id);
		$this->db->delete('multimedia_tv_cats');
	}

}