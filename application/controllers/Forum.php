<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('settings_model');
		$this->load->model('user_model');
		$this->lang->load('polish', 'polish');
	}

	public function index() {
		$data['language'] = $this->settings_model->getForumLanguage();
		$data['name'] = $this->settings_model->getForumName();

		$this->load->view('header', $data);
		$this->load->view('index');
		$this->load->view('footer');
	}
/*
	public function register() {
		$this->load->view('header', $data);
		$this->load->view('user/session/register');
		$this->load->view('footer');
	}

	public function login() {
		$this->load->view('header', $data);
		$this->load->view('user/session/login');
		$this->load->view('footer');
	}

	public function logout() {
		$this->load->view('header', $data);
		$this->load->view('user/session/logout');
		$this->load->view('footer');
	}

	public function category() {
		$this->load->view('header', $data);
		$this->load->view('user/session/login');
		$this->load->view('footer');
	}

	public function forum() {
		$this->load->view('header', $data);
		$this->load->view('user/session/login');
		$this->load->view('footer');
	}

	public function topic() {
		$this->load->view('header', $data);
		$this->load->view('user/session/login');
		$this->load->view('footer');
	}
	*/
}
