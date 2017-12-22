<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function getForumLanguage() {
		$this->db->select('set_value')->from('forum_settings')->where('set_name', 'language');
		return $this->db->get()->row('set_value');
	}

	public function getForumName() {
		$this->db->select('set_value')->from('forum_settings')->where('set_name', 'name');
		return $this->db->get()->row('set_value');
	}

	public function getUserID($login) {
		$this->db->select('user_id')->from('forum_users')->where('user_login', $login);
		return $this->db->get()->row('user_id');
	}

	public function getUser($user_id) {
		$this->db->from('forum_users')->where('user_id', $user_id);
		return $this->db->get()->row();
	}

	public function registerUser($login, $password, $email) {
		$data = array(
			'user_login' => $login,
			'user_password' => $this->hash_password($password),
			'user_email' => $email,
			'user_code' => random_string('alnum', 32),
			'user_registerdate' => time()
		);

		$this->db->insert('forum_users', $data);
	}

	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function loginUser($login, $password) {
		$this->db->select('user_password')->from('forum_users')->where('user_login', $login);
		$hash = $this->db->get()->row('user_password');

		return $this->verify_password_hash($password, $hash);
	}

	private function verify_password_hash($password, $hash) {
		return password_verify($password, $hash);
	}
}