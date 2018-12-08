<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model(array('Front_model', 'Front_hotels_model', 'Front_announcements_model'));
	}

	public function index($slug = null)
	{
		if($slug === null) redirect(base_url()); 
		$data['data'] = $this->Front_hotels_model->getBySlug(urldecode($slug));

		if($data['data']['slug_'.LANG] != urldecode($slug)) {
			redirect(site_url('/hotel/index/'.$data['data']['slug_'.LANG].'?lang='.LANG));
		}
		if($data['data']['active_'.LANG] != 1)
			redirect($_SERVER['HTTP_REFERER']);

		/* STATIC WORDS TRANSLATIONS */
		$data['translate'] = $this->Front_model->translations();
		$data['contact'] = $this->Front_model->contact();

		/* GOOGLE FORMS */
		$data['google_forms_link'] = $this->Front_model->google_forms_link();
		$data['socials'] = $this->Front_model->socials();
		$data['sidebar'] = $this->Front_model->sidebar();

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

		
		$data['announcements'] = $this->Front_announcements_model->getAnnouncements();

		/* POLL */
		$this->load->helper('cookie');
		$data['poll'] = $this->Front_model->getPoll();
		if(isset($data['poll']['id']) && $data['poll']['id'] == get_cookie('poll'))
			$data['poll'] = [];

		/* hotels */
		$data['latest_hotels'] = $this->Front_hotels_model->home_hotels(4);
		foreach ($data['latest_hotels'] as $key => $value):
			$category = $this->Front_hotels_model->read_cat_by_id($value['category']);
			$data['latest_hotels'][$key]['categories'] = $category;
		endforeach;

		$this->load->view('front/hotel', $data);
	}

}