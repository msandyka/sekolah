<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_index extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	function login($user,$pass){
		$this->db->select('*');
		$this->db->from('smk7smg_portal.tb_user');
		$this->db->where('user_name', $user);
		$this->db->where('user_pass', md5($pass));

		$query = $this->db->get();

		$hasil = $query->num_rows();

		if($hasil == 1){
			return $query->result_array();
		}else{
			return false;
		}
	}

	function getAllMenu(){
		$this->db->select('*');
		$this->db->from('smk7smg_portal.tb_menu');

		$query = $this->db->get();

		return $query->result_array();
	}

	function getSubMenu($menuId){
		$this->db->select('*');
		$this->db->from('tb_menu_sub1');
		$this->db->where('id_menu', $menuId);

		$query = $this->db->get();

		return $query->result_array();
	}

	function getAllPost(){
		$this->db->select('*');
		$this->db->from('smk7smg_portal.tb_post');
		$this->db->where('approved', 3);
		$this->db->order_by("create_timestamp", "desc");

		$query = $this->db->get();

		return $query->result_array();
	}

	function getPostById($id){
		$this->db->select('*');
		$this->db->from('smk7smg_portal.tb_post');
		$this->db->where('approved', 3);
		$this->db->where('id_post', $id);

		$query = $this->db->get();

		return $query->result_array();
		
	}
}
?>