<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect('login');
		}
		$data['level'] = $this->session->userdata('level');
		$this->load->view('home', $data);
	}
}
