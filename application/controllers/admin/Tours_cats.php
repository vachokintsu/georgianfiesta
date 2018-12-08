<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tours_cats extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('email')) {redirect(base_url('admin/login'));}
		$this->load->model(array('Configs_ad_model', 'Tours_cats_ad_model'));
		$this->pageTitle = 'ტურის კატეგორიები';
	}

	public function index()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['parents'] = $this->Tours_cats_ad_model->read_parents();
		$this->load->view('admin/tours_cats/manage', $data);
	}

	public function create()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();

		$this->load->view('admin/tours_cats/create', $data);

		if($this->input->post()) {
			$this->Tours_cats_ad_model->create($data['langs']);
			redirect(base_url().'admin/tours_cats');
		}
	}

	public function update()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();
		$data['item'] = $this->Tours_cats_ad_model->read();

		$this->load->view('admin/tours_cats/update', $data);

		if($this->input->post()) {
			$this->Tours_cats_ad_model->update_slugs($data['langs']);
			$this->Tours_cats_ad_model->update();
			redirect(base_url().'admin/tours_cats');
		}
	}

	public function update_sorting()
	{
		$data['tours_cats'] = $this->Tours_cats_ad_model->update_sorting();
	}

	public function delete()
	{
		$this->Tours_cats_ad_model->delete();
		redirect(base_url().'admin/tours_cats');
	}

}