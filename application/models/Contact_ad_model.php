<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_ad_model extends CI_Model {

	public function read() {
		$this->db->select('*');
		$this->db->from('contact');
		$this->db->where('id', 1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update() {
		$email = implode(',', $this->input->post('email[]'));
		$phone = implode(',', $this->input->post('phone[]'));
		$bus_ge = implode(',', $this->input->post('bus_ge[]'));
		$bus_en = implode(',', $this->input->post('bus_en[]'));
		$bus_ru = implode(',', $this->input->post('bus_ru[]'));

		$this->db->where('id', 1);
		$this->db->update('contact',
			array(
				'metro_ge' => $this->input->post('metro_ge'),
				'metro_en' => $this->input->post('metro_en'),
				'metro_ru' => $this->input->post('metro_ru'),
				'building_ge' => $this->input->post('building_ge'),
				'building_en' => $this->input->post('building_en'),
				'building_ru' => $this->input->post('building_ru'),
				'bus_ge' => $bus_ge,
				'bus_en' => $bus_en,
				'bus_ru' => $bus_ru,
				'email' => $email,
				'phone' => $phone,
				'fax' => $this->input->post('fax'),
				'viber' => $this->input->post('viber'),
				'whatsapp' => $this->input->post('whatsapp')
			)
		);
	}

}