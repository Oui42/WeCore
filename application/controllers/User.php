<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
		$this->load->view('user/session/register');
		$this->load->view('user/session/login');
		$this->load->view('footer', $data);
	}

	public function register() {
		$data['language'] = $this->settings_model->getForumLanguage();
		$data['name'] = $this->settings_model->getForumName();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_login', 'Login', 'required|trim|alpha_numeric|min_length[3]|is_unique[forum_users.user_login]|max_length[32]', array('is_unique' => $this->lang->line('login_already_exists')));
		$this->form_validation->set_rules('user_password', $this->lang->line('key_password'), 'required|trim|min_length[6]');
		$this->form_validation->set_rules('user_password_repeat', $this->lang->line('key_repeat_password'), 'required|trim|min_length[6]|matches[user_password]');
		$this->form_validation->set_rules('user_email', 'E-mail', 'required|trim|valid_email|is_unique[forum_users.user_email]|max_length[64]');
		$this->form_validation->set_rules('rules', $this->lang->line('key_rules'), 'required|trim');

		if($this->form_validation->run() === false) {
			
		} else {
			$login = $this->input->post('user_login');
			$password = $this->input->post('user_password');
			$email = $this->input->post('user_email');

			if($this->user_model->registerUser($login, $password, $email)) {
				$this->load->view('header');	// success message
			} else {
				
			}
		}

		$this->load->view('header', $data);
		$this->load->view('user/session/register');
		$this->load->view('footer', $data);
	}

	public function login() {
		$data['language'] = $this->settings_model->getForumLanguage();
		$data['name'] = $this->settings_model->getForumName();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_login', 'Login', 'required|alpha_numeric');
		$this->form_validation->set_rules('user_password', $this->lang->line('key_password'), 'required');

		if($this->form_validation->run() == false) {

		} else {
			$login = $this->input->post('user_login');
			$password = $this->input->post('user_password');

			if($this->user_model->loginUser($login, $password)) {
				$user_id = $this->user_model->getUserID($login);
				$user = $this->user_model->getUser($user_id);

				$_SESSION['user_id'] = (int)$user->user_id;
				$_SESSION['user_login'] = (string)$user->user_login;
				$_SESSION['logged_in'] = (bool)true;
			} else {
				// login failed
			}
		}

		$this->load->view('header', $data);
		$this->load->view('user/session/login');
		$this->load->view('footer', $data);
	}

	public function logout() {
		$data['language'] = $this->settings_model->getForumLanguage();
		$data['name'] = $this->settings_model->getForumName();

		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			foreach($_SESSION as $key => $value) {
				unset($_SESSION['key']);
			}

			$this->load->view('header', $data);
			$this->load->view('user/session/logout');
			$this->load->view('footer', $data);
		} else {
			redirect('/');
		}
	}
}
