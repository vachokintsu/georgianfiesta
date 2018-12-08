<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('email')) {redirect(base_url('admin/login'));}
		$this->load->model(array('Configs_ad_model', 'Tours_ad_model'));
		$this->pageTitle = 'ტურები';
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
		$config['base_url'] = base_url().'admin/tours/index/';
		$config['reuse_query_string'] = TRUE;
		$config['total_rows'] = $this->Tours_ad_model->data_count($search);
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
		$data['tours'] = $this->Tours_ad_model->read_all($search, 10, $start);

		$this->load->view('admin/tours/manage', $data);
	}

	public function create()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();
		$data['cats'] = $this->Tours_ad_model->read_cats();
		$data['lectors'] = $this->Tours_ad_model->read_lectors();

		$this->load->view('admin/tours/create', $data);

		if($this->input->post()) {
			$this->Tours_ad_model->create($data['langs']);

			redirect(base_url().'admin/tours');
		}
	}

	public function update()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();
		$data['cats'] = $this->Tours_ad_model->read_cats();
		$data['lectors'] = $this->Tours_ad_model->read_lectors();
		$data['item'] = $this->Tours_ad_model->read();

		$this->load->view('admin/tours/update', $data);

		if($this->input->post()) {
			$this->Tours_ad_model->update_slugs($data['langs']);
			$this->Tours_ad_model->update();
			redirect(base_url().'admin/tours');
		}
	}

	public function delete()
	{
		$this->Tours_ad_model->delete();
		redirect(base_url().'admin/tours');
	}

}