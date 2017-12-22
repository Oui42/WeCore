<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
	public function getForumLanguage() {
		$this->db->select('set_value')->from('forum_settings')->where('set_name', 'language');
		return $this->db->get()->row('set_value');
	}

	public function getForumName() {
		$this->db->select('set_value')->from('forum_settings')->where('set_name', 'name');
		return $this->db->get()->row('set_value');
	}
}
