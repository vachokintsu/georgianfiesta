<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_form extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data['error'] = 0;
		if(isset($_POST['sendMail'])) {
			if($this->recaptcha($this->input->post('g-recaptcha-response')) === true) {
				$this->load->helper("security");
				$this->load->library('email');
				$email = $this->security->xss_clean($this->input->POST('email'));
				$subject = $this->security->xss_clean($this->input->POST('subject'));
				$message = $this->security->xss_clean($this->input->POST('message'));
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$data['error'] = 1;

					$config = array(
					    'mailtype'  => 'html',
					    'charset'   => 'utf-8'
					);
					$this->email->initialize($config);
					$this->email->set_newline("\r\n");
					$this->email->from('contact@georgianfiesta.ge');
					$this->email->to('contact@georgianfiesta.ge');
					$this->email->subject($subject);
					$this->email->message('Email: '.$email.'<br>'.'Message: '.$message);
					$this->email->send();
				} else {
					$data['error'] = 2;
				}
			} else {
				$data['error'] = 2;
			}
		}

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function recaptcha($str = '')
	{
		$google_url = "https://www.google.com/recaptcha/api/siteverify";
		$secret = '6Ld2UloUAAAAALXHWzd8CYyoJPnqJeRARwkfXhZ8';
		$ip = $_SERVER['REMOTE_ADDR'];
		$url = $google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
		$res = curl_exec($curl);
		curl_close($curl);
		$res = json_decode($res, true);
		//reCaptcha success check
		if($res['success']) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}