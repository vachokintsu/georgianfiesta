<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model(array('Front_model', 'Front_hotels_model'));
	}

	public function index()
	{
		/* STATIC WORDS TRANSLATIONS */
		$data['translate'] = $this->Front_model->translations();

		/* GOOGLE FORMS */
		$data['google_forms_link'] = $this->Front_model->google_forms_link();
		$data['socials'] = $this->Front_model->socials();
		$data['contact'] = $this->Front_model->contact();

		/* MENU */
		$data['unordered_menu'] = $this->Front_model->menu();

		$data['menu'] = array();

		foreach ($data['unordered_menu'] as $key => $value):
            if ($data['unordered_menu'][$key]['parent'] === '0'):
            	$data['unordered_menu'][$key]['submenu'] = array();
                array_push($data['menu'], $data['unordered_menu'][$key]);
        	endif;
        endforeach;

        foreach ($data['menu'] as $key => $value):
	        foreach ($data['unordered_menu'] as $skey => $svalue):
				if ($data['menu'][$key]['id'] == $data['unordered_menu'][$skey]['parent']):
					array_push($data['menu'][$key]['submenu'], $data['unordered_menu'][$skey]);
				endif;
			endforeach;
		endforeach;

		/* POLL */
		$this->load->helper('cookie');
		$data['poll'] = $this->Front_model->getPoll();
		if(isset($data['poll']['id']) && $data['poll']['id'] == get_cookie('poll'))
			$data['poll'] = [];
		
		$data['hotels_categories'] = $this->Front_hotels_model->hotels_categories();
		$this->load->view('front/hotels', $data);
	}

	public function filter()
	{
		if(!empty($this->input->post())) {
			$data = $this->Front_hotels_model->filter();
			foreach ($data as $key => $value):
				$category = $this->Front_hotels_model->read_cat_by_id($value['category']);
				$data[$key]['categories'] = $category;
			endforeach;
			print_r(json_encode($data));
		}
	}

}