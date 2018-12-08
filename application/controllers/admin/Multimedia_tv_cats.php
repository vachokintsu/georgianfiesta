<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Multimedia_tv_cats extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('email')) {redirect(base_url('admin/login'));}
		$this->load->model(array('Configs_ad_model', 'Multimedia_tv_cats_ad_model'));
		$this->pageTitle = 'ტელევიზიის კატეგორიები';
	}

	public function index()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['parents'] = $this->Multimedia_tv_cats_ad_model->read_parents();
		$this->load->view('admin/multimedia_tv_cats/manage', $data);
	}

	public function create()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();

		$this->load->view('admin/multimedia_tv_cats/create', $data);

		if($this->input->post()) {
			$this->Multimedia_tv_cats_ad_model->create($data['langs']);
			redirect(base_url().'admin/multimedia_tv_cats');
		}
	}

	public function update()
	{
		$data['pageTitle'] = $this->pageTitle;
		$data['langs'] = $this->Configs_ad_model->langs();
		$data['item'] = $this->Multimedia_tv_cats_ad_model->read();

		$this->load->view('admin/multimedia_tv_cats/update', $data);

		if($this->input->post()) {
			$this->Multimedia_tv_cats_ad_model->update_slugs($data['langs']);
			$this->Multimedia_tv_cats_ad_model->update();
			redirect(base_url().'admin/multimedia_tv_cats/update/'.$this->uri->segment(4));
		}
	}

	public function update_sorting()
	{
		$data['multimedia_tv_cats'] = $this->Multimedia_tv_cats_ad_model->update_sorting();
	}

	public function delete()
	{
		$this->Multimedia_tv_cats_ad_model->delete();
		redirect(base_url().'admin/multimedia_tv_cats');
	}

}