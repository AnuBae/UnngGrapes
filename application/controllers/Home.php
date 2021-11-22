<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('template/Header');
		$this->load->view('home/Index');
		$this->load->view('template/Footer');

		
	}

	public function about()
	{
		$this->load->view('template/Header');
		$this->load->view('template/About');
		$this->load->view('template/Footer');
	}

	public function help()
	{
		$this->load->view('template/Header');
		$this->load->view('template/Help');
		$this->load->view('template/Footer');
	}
}
