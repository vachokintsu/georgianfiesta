<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Google_forms extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('email')) {redirect(base_url('admin/login'));}
		$this->load->model(array('Configs_ad_model', 'Google_forms_ad_model'));
		$this->pageTitle = 'Google ფორმები';
	}

	public function index($start = 0)
	{
		$data['pageTitle'] = $this->pageTitle;
		$this->load->library('pagination');
		// search
		if(isset($_GET['search'])) {
			$search = trim($this->input->get('search'));
		} else {
			$search = '';
		}
		$config['base_url'] = base_url().'admin/google_forms/index/';
		$config['reuse_query_string'] = TRUE;
		$config['total_rows'] = $this->Google_forms_ad_model->data_count($search);
		$config['uri_segment'] = 4;
		$config['per_page'] = 10;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="paginate_button active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = 'პირველი';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'ბოლო';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'შემდეგი';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'წინა';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$data['google_forms'] = $this->Google_forms_ad_model->read_all($search, 10, $start);
		$this->load->view('admin/google_forms/manage', $data);
	}

	public function create()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();

		$this->load->view('admin/google_forms/create', $data);

		if($this->input->post()) {
			$this->Google_forms_ad_model->create($data['langs']);
			redirect(base_url().'admin/google_forms');
		}
	}

	public function update()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();
		$data['item'] = $this->Google_forms_ad_model->read();

		$this->load->view('admin/google_forms/update', $data);

		if($this->input->post()) {
			$this->Google_forms_ad_model->update_slugs($data['langs']);
			$this->Google_forms_ad_model->update();
			redirect(base_url().'admin/google_forms');
		}
	}

	public function delete()
	{
		$this->Google_forms_ad_model->delete();
		redirect(base_url().'admin/google_forms');
	}

}