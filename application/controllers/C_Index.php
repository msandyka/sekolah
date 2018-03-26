<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_index');
	}

	public function login()
	{
		$username = filter_var($this->input->post('uname'), FILTER_SANITIZE_STRING);
		$password = filter_var($this->input->post('passw'), FILTER_SANITIZE_STRING);

		$dataUser = $this->M_index->login($username,$password);

		if ($dataUser) 
		{
			$userArray = array
						(
							'name'		=>	$dataUser[0]['user_fullname'],
							'username'	=>	$dataUser[0]['user_name'],
							'logged_in'	=>	true,
							'id_user'	=>	$this->encryption->encrypt($dataUser[0]['id_user']),
						);
		}else{
			$userArray = array('name'=>'', 'logged_in'=>false);
		}
		$this->session->set_userdata($userArray);
		redirect('Admin');
	}

	public function checkLogin()
	{
		$loged=$this->session->userdata('logged_in');
		if (!$loged) {
			redirect();
		}
	}

	public function logout()
	{
		$userArray = array('name'=>'', 'logged_in'=>false);
		$this->session->set_userdata($userArray);
		$this->checkLogin();
	}

	public function index()
	{
		$data['loged']=$this->session->userdata('logged_in');

		// $this->load->view('V_login');
		$data['activeMenu'] = "home";
		$data['getAllMenu'] = $this->M_index->getAllMenu();
		
		$this->load->view('interface/V_Nav',$data);
		$this->load->view('interface/V_Section');
		$this->load->view('interface/V_Footer');

	}

	public function articles()
	{
		$data['loged']=$this->session->userdata('logged_in');
		$data['activeMenu'] = "articles";
		$data['getAllMenu'] = $this->M_index->getAllMenu();
		$data['getAllPost'] = $this->M_index->getAllPost();
		
		$this->load->view('interface/V_Nav',$data);
		$this->load->view('interface/articles/V_Articles',$data);
		$this->load->view('interface/articles/V_Sidebar');
		$this->load->view('interface/V_Footer');

	}

	public function post($id)
	{
		$data['loged']=$this->session->userdata('logged_in');
		$data['activeMenu'] = "articles";
		$data['getAllMenu'] = $this->M_index->getAllMenu();
		$data['getPostById'] = $this->M_index->getPostById($id);
		
		$this->load->view('interface/V_Nav',$data);
		$this->load->view('interface/articles/V_Post');
		$this->load->view('interface/articles/V_Sidebar');
		$this->load->view('interface/V_Footer');
	}

	public function gallery()
	{
		$data['loged']=$this->session->userdata('logged_in');
		$data['activeMenu'] = "gallery";
		
		$this->load->view('interface/V_Nav',$data);
		$this->load->view('interface/V_Gallery');
		$this->load->view('interface/V_Footer');
	}
}