<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/M_admin');
		
		$loged=$this->session->userdata('logged_in');
		if (!$loged) {
			redirect();
		}
		date_default_timezone_set('Asia/Jakarta');
		$executionTimestamp	=	date('Y-m-d H:i:s');
	}
	
//**********************Dashboard*************************//
	public function index()
	{
		$data['username']=$this->session->userdata('name');
		$data['Dashboard'] = "active";
		$data['listPost'] = $this->M_admin->listdatapost();

		$this->load->view('template/V_header',$data);
		$this->load->view('template/V_sidemenu',$data);
		$this->load->view('Admin/V_admin', $data);
		$this->load->view('template/V_footer',$data);
	}

	public function CheckPost($id)
	{
		$data['username']=$this->session->userdata('name');
		$data['Dashboard'] = "active";
		$listPost = $this->M_admin->CheckPost($id);
		$data['checkPost'] = $listPost;
		$data['error'] = '';

		$this->load->view('template/V_header',$data);
		$this->load->view('template/V_sidemenu', $data);
		$this->load->view('Admin/V_check_post',$data);
		$this->load->view('template/V_footer',$data);
	}

	public function kirimApprove($id)
	{
		$this->M_admin->kirimApprove($id);

		redirect('Admin');
	}

	public function kirimRevice($id)
	{
		$this->M_admin->kirimRevice($id);

		redirect('Admin');
	}

	public function kirimReject($id)
	{
		$this->M_admin->kirimReject($id);

		redirect('Admin');
	}

//***********************UserManagement******************//
	public function UserManagement()
	{
		$data['username']=$this->session->userdata('name');
		$data['UserMgm'] = "active";
		$data['listUser'] = $this->M_admin->listdatauser();

		$this->load->view('template/V_header',$data);
		$this->load->view('template/V_sidemenu', $data);
		$this->load->view('Admin/V_user_management',$data);
		$this->load->view('template/V_footer',$data);
	}
	
	public function InsertDataUser()
	{
		$data['username']=$this->session->userdata('name');
		$data['UserMgm'] = "active";

		$this->load->view('template/V_header',$data);
		$this->load->view('template/V_sidemenu', $data);
		$this->load->view('Admin/V_input_user');
		$this->load->view('template/V_footer',$data);
	}

	public function SaveDataUser()
	{
		$data = array(
					'user_name' => $this->input->post('username'),
					'user_pass' => md5($this->input->post('password')),
					'user_fullname' => strtoupper($this->input->post('fullname')),
					'user_uniqueid' => $this->input->post('id_user'),
					'create_timestamp' => date('Y-m-d h:i:s'),
					'last_update_timestamp' => date('Y-m-d h:i:s'),
					'user_level' => $this->input->post('user_lev'),
				);
		$this->M_admin->SaveDataUser($data);
		$header_id = $this->db->insert_id();

		$history = array(
						'id_user' => $header_id,
						'user_name' => $this->input->post('username'),
						'user_pass' => md5($this->input->post('password')),
						'user_fullname' => strtoupper($this->input->post('fullname')),
						'user_uniqueid' => $this->input->post('id_user'),
						'create_timestamp' => date('Y-m-d h:i:s'),
						'user_level' => $this->input->post('user_lev'),
						'type' => 'CREATE',
					);
		$this->M_admin->SaveToHistory($history);
		redirect('Admin/UserManagement');
	}

	public function deleteDataUser($id)
	{
		$listData = $this->M_admin->EditDataUser($id);
		$delete = array(
						'id_user' => $id,
						'user_name' => $listData['0']['user_name'],
						'user_pass' => $listData['0']['user_pass'],
						'user_fullname' => $listData['0']['user_fullname'],
						'user_uniqueid' => $listData['0']['user_uniqueid'],
						'delete_timestamp' => date('Y-m-d h:i:s'),
						'user_level' => $listData['0']['user_level'],
						'type' => 'DELETE',
					);
		$this->M_admin->SaveToHistory($delete);
		
		$this->M_admin->deleteDataUser($id);
		redirect('Admin/UserManagement');
	}

	public function UpdateDataUser($id)
	{
		$data['username']=$this->session->userdata('name');
		$cekbox = $this->input->post('gantiPSW');
		$CekPassLama = $this->M_admin->EditDataUser($id);
		$cekpasslama = $CekPassLama[0]['user_pass'];

		$CekPass = "";
		if ($cekbox[0]==1) {
			$CekPass = md5($this->input->post('passLama'));
		}else{
			$CekPass = $this->input->post('passLama');
		}

		if ($CekPass==$cekpasslama) {
			$data = array(
					'user_name' => $this->input->post('username'),
					'user_pass' => $CekPass,
					'user_fullname' => strtoupper($this->input->post('fullname')),
					'user_uniqueid' => $this->input->post('id_user'),
					'last_update_timestamp' => date('Y-m-d h:i:s'),
					'user_level' => $this->input->post('user_lev'),
				);
			$this->M_admin->UpdateDataUser($data,$id);

			$update = array(
						'id_user' => $id,
						'user_name' => $this->input->post('username'),
						'user_pass' => $CekPass,
						'user_fullname' => strtoupper($this->input->post('fullname')),
						'user_uniqueid' => $this->input->post('id_user'),
						'update_timestamp' => date('Y-m-d h:i:s'),
						'user_level' => $this->input->post('user_lev'),
						'type' => 'UPDATE',
					);
			$this->M_admin->SaveToHistory($update);
			redirect('Admin/UserManagement');
		}else{
			$data['error'] = '<div class="alert alert-danger" align="center">Password Tidak Benar</div>';

			$data['UserMgm'] = "active";
			$listData = $this->M_admin->EditDataUser($id);
			$data['editUser'] = $listData[0];

			$this->load->view('template/V_header',$data);
			$this->load->view('template/V_sidemenu', $data);
			$this->load->view('Admin/V_edit_user',$data);
			$this->load->view('template/V_footer',$data);
		}

	}

	public function EditDataUser($id)
	{
		$data['username']=$this->session->userdata('name');
		$data['UserMgm'] = "active";
		$listData = $this->M_admin->EditDataUser($id);
		$data['editUser'] = $listData[0];
		$data['error'] = '';

		$this->load->view('template/V_header',$data);
		$this->load->view('template/V_sidemenu', $data);
		$this->load->view('Admin/V_edit_user',$data);
		$this->load->view('template/V_footer',$data);
	}

//*********************MenuManagement***********************//
	public function MenuManagement()
	{
		$data['username']=$this->session->userdata('name');
		$menumgm['MenuMgm'] = "active";

		$data['mainMenuList'] 	=	$this->M_admin->getMainMenuList();
		$data['subMenuList']	=	$this->M_admin->getSubMenuList();

		$this->load->view('template/V_header', $data);
		$this->load->view('template/V_sidemenu', $menumgm);
		$this->load->view('Admin/V_menu_management', $data);
		$this->load->view('template/V_footer');
	}

	public function MenuManagement_insertMenu()
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$this->form_validation->set_rules('txtMenuName', 'Menu Name', 'required');
		$this->form_validation->set_rules('radioSubmenu', 'Submenu', 'required');

		if($this->form_validation->run() === FALSE)
		{
			redirect('Admin/MenuManagement');
		}
		else
		{
			$menuName 		=	$this->input->post('txtMenuName', TRUE);
			$submenu 		=	$this->input->post('radioSubmenu', TRUE);

			// Input untuk Single Menu Single Post atau Submenu
			$multiPost			=	0;
			$multiPostPriority	=	0;
			$externalReference	=	0;
			$externalSite		=	NULL;

			if($submenu == 0)
			{
				$menuType 	=	$this->input->post('radioMenuType', TRUE);
				if($menuType == 1) // Input untuk Multi Post
				{
					$multiPost			=	1;
					if($this->input->post('chkPriorityInvolved')==1)
					{
						$multiPostPriority 	= 	1;
					}
					else
					{
						$multiPostPriority 	= 	0;
					}
				}
				elseif($menuType == 2) // Input untuk External Reference
				{
					$externalReference	=	1;
					$externalSite 		=	filter_var($this->input->post('txtExternalSite', TRUE), FILTER_SANITIZE_URL);
				}
			}

			$insertMainMenu		=	array
									(
										'name'				=>	$menuName,
										'submenu_included'	=>	$submenu,
										'multi_post'		=>	$multiPost,
										'priority_involved'	=>	$multiPostPriority,
										'external_reference'=>	$externalReference,
										'external_site'		=>	$externalSite,
										'create_timestamp'	=>	$executionTimestamp,
										'create_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
									);

			echo '<pre>';
			print_r($this->session);
			echo '</pre>';

			echo '<pre>';
			print_r($insertMainMenu);
			echo '</pre>';

			$idMenu 	=	$this->M_admin->insertMainMenu($insertMainMenu);

			$insertMenuHistory	=	array
									(
										'id_menu'			=>	$idMenu,
										'name'				=>	$menuName,
										'submenu_included'	=>	$submenu,
										'multi_post'		=>	$multiPost,
										'priority_involved'	=>	$multiPostPriority,
										'external_reference'=>	$externalReference,
										'external_site'		=>	$externalSite,
										'type'				=>	'CREATE',
										'create_timestamp'	=>	$executionTimestamp,
										'create_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
									);
			$this->M_admin->insertMenuHistory($insertMenuHistory);
			redirect('Admin/MenuManagement');
		}
	}

	public function MenuManagement_updateMenu()
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$this->form_validation->set_rules('txtMenuName', 'Menu Name', 'required');
		$this->form_validation->set_rules('radioSubmenu', 'Submenu', 'required');
		$this->form_validation->set_rules('txtIDMenu', 'ID Menu', 'required');

		if($this->form_validation->run() === FALSE)
		{
			redirect('Admin/MenuManagement');
		}
		else
		{
			$menuName 		=	$this->input->post('txtMenuName', TRUE);
			$submenu 		=	$this->input->post('radioSubmenu', TRUE);
			$id_menu 		=	$this->encryption->decrypt(str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('txtIDMenu')));

			// Input untuk Single Menu Single Post atau Submenu
			$multiPost			=	0;
			$multiPostPriority	=	0;
			$externalReference	=	0;
			$externalSite		=	NULL;

			if($submenu == 0)
			{
				$menuType 	=	$this->input->post('radioMenuType', TRUE);
				if($menuType == 1) // Input untuk Multi Post
				{
					$multiPost			=	1;
					if($this->input->post('chkPriorityInvolved')==1)
					{
						$multiPostPriority 	= 	1;
					}
					else
					{
						$multiPostPriority 	= 	0;
					}
				}
				elseif($menuType == 2) // Input untuk External Reference
				{
					$externalReference	=	1;
					$externalSite 		=	filter_var($this->input->post('txtExternalSite', TRUE), FILTER_SANITIZE_URL);
				}
			}

			$updateMainMenu		=	array
									(
										'name'					=>	$menuName,
										'submenu_included'		=>	$submenu,
										'multi_post'			=>	$multiPost,
										'priority_involved'		=>	$multiPostPriority,
										'external_reference'	=>	$externalReference,
										'external_site'			=>	$externalSite,
										'last_update_timestamp'	=>	$executionTimestamp,
										'last_update_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
									);

			echo '<pre>';
			print_r($updateMainMenu);
			echo '</pre>';

			$this->M_admin->updateMainMenu($updateMainMenu, $id_menu);
			$getMainMenu 		=	$this->M_admin->getMainMenuList($id_menu);
			foreach ($getMainMenu as $menu)
			{
				$insertMenuHistory	=	array
										(
											'id_menu'			=>	$menu['id_menu'],
											'name'				=>	$menu['name'],
											'submenu_included'	=>	$menu['submenu_included'],
											'multi_post'		=>	$menu['multi_post'],
											'priority_involved'	=>	$menu['id_menu'],
											'external_reference'=>	$menu['external_reference'],
											'external_site'		=>	$menu['external_site'],
											'type'				=>	'UPDATE',
											'update_timestamp'	=>	$executionTimestamp,
											'update_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
										);
				$this->M_admin->insertMenuHistory($insertMenuHistory);
			}
			redirect('Admin/MenuManagement');
		}
	}

	public function MenuManagement_deleteMenu()
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');
		
		$this->form_validation->set_rules('txtIDMenu', 'ID Menu', 'required');

		if($this->form_validation->run() !== FALSE)
		{
			$id_menu 		=	filter_var($this->encryption->decrypt(str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('txtIDMenu', TRUE))), FILTER_SANITIZE_NUMBER_INT);
			
			echo $id_menu.'<br/>';

			$this->MenuManagement_processDeletePost(FALSE, $id_menu, FALSE, 'RELATION DELETE');
			$this->MenuManagement_processDeleteUserAccess(FALSE, FALSE, $id_menu, FALSE, 'RELATION DELETE');
			$this->MenuManagement_processDeleteSubmenu($id_menu, FALSE, 'RELATION DELETE');
			$this->MenuManagement_processDeleteMenu($id_menu, 'DELETE');
			redirect('Admin/MenuManagement');
		}
	}

	public function MenuManagement_insertSubmenu()
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$this->form_validation->set_rules('txtSubmenuName', 'Submenu Name', 'required');

		if($this->form_validation->run() === FALSE)
		{
			redirect('Admin/MenuManagement');
		}
		else
		{
			$submenuName 		=	$this->input->post('txtSubmenuName', TRUE);
			$id_menu 			=	$this->encryption->decrypt(str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('txtIDMenu')));

			// Input untuk Single Menu Single Post atau Submenu
			$multiPost			=	0;
			$multiPostPriority	=	0;
			$externalReference	=	0;
			$externalSite		=	NULL;

			$menuType 	=	$this->input->post('radioSubmenuType', TRUE);
			if($menuType == 1) // Input untuk Multi Post
			{
				$multiPost			=	1;
				if($this->input->post('chkPriorityInvolvedSubmenu')==1)
				{
					$multiPostPriority 	= 	1;
				}
				else
				{
					$multiPostPriority 	= 	0;
				}
			}
			elseif($menuType == 2) // Input untuk External Reference
			{
				$externalReference	=	1;
				$externalSite 		=	filter_var($this->input->post('txtExternalSiteSubmenu', TRUE), FILTER_SANITIZE_URL);
			}

			$insertSubmenu		=	array
									(
										'id_menu'			=>	$id_menu,
										'name'				=>	$submenuName,
										'multi_post'		=>	$multiPost,
										'priority_involved'	=>	$multiPostPriority,
										'external_reference'=>	$externalReference,
										'external_site'		=>	$externalSite,
										'create_timestamp'	=>	$executionTimestamp,
										'create_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
									);


			$idMenuSub1 		=	$this->M_admin->insertSubmenu($insertSubmenu);

			$insertSubmenuHistory	=	array
									(
										'id_menu_sub1'		=>	$idMenuSub1,
										'id_menu'			=>	$id_menu,
										'name'				=>	$submenuName,
										'multi_post'		=>	$multiPost,
										'priority_involved'	=>	$multiPostPriority,
										'external_reference'=>	$externalReference,
										'external_site'		=>	$externalSite,
										'type'				=>	'CREATE',
										'create_timestamp'	=>	$executionTimestamp,
										'create_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
									);
			$this->M_admin->insertSubmenuHistory($insertSubmenuHistory);
			redirect('Admin/MenuManagement');
		}
	}

	public function MenuManagement_updateSubmenu()
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$this->form_validation->set_rules('txtSubmenuName', 'Submenu Name', 'required');
		$this->form_validation->set_rules('txtIDSubmenu', 'ID Submenu', 'required');

		if($this->form_validation->run() === FALSE)
		{
			redirect('Admin/MenuManagement');
		}
		else
		{
			$submenuName 		=	$this->input->post('txtSubmenuName', TRUE);
			$id_menu_sub1		=	$this->encryption->decrypt(str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('txtIDSubmenu')));

			// Input untuk Single Menu Single Post atau Submenu
			$multiPost			=	0;
			$multiPostPriority	=	0;
			$externalReference	=	0;
			$externalSite		=	NULL;

			$menuType 	=	$this->input->post('radioSubmenuType', TRUE);
			if($menuType == 1) // Input untuk Multi Post
			{
				$multiPost			=	1;
				if($this->input->post('chkPriorityInvolvedSubmenu')==1)
				{
					$multiPostPriority 	= 	1;
				}
				else
				{
					$multiPostPriority 	= 	0;
				}
			}
			elseif($menuType == 2) // Input untuk External Reference
			{
				$externalReference	=	1;
				$externalSite 		=	filter_var($this->input->post('txtExternalSiteSubmenu', TRUE), FILTER_SANITIZE_URL);
			}

			$updateSubmenu		=	array
									(
										'name'					=>	$submenuName,
										'multi_post'			=>	$multiPost,
										'priority_involved'		=>	$multiPostPriority,
										'external_reference'	=>	$externalReference,
										'external_site'			=>	$externalSite,
										'last_update_timestamp'	=>	$executionTimestamp,
										'last_update_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
									);


			$this->M_admin->updateSubmenu($updateSubmenu, $id_menu_sub1);
			$getSubmenu 		=	$this->M_admin->getSubMenuList(FALSE, $id_menu_sub1);
			foreach ($getSubmenu as $submenu) 
			{
				if(empty($submenu['external_site']))
				{
					$submenu['external_site'] = NULL;
				}
				$insertSubmenuHistory	=	array
										(
											'id_menu_sub1'		=>	$submenu['id_menu_sub1'],
											'id_menu'			=>	$submenu['id_menu'],
											'name'				=>	$submenu['name'],
											'multi_post'		=>	$submenu['multi_post'],
											'priority_involved'	=>	$submenu['priority_involved'],
											'external_reference'=>	$submenu['external_reference'],
											'external_site'		=>	$submenu['external_site'],
											'type'				=>	'UPDATE',
											'update_timestamp'	=>	$executionTimestamp,
											'update_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
										);
				$this->M_admin->insertSubmenuHistory($insertSubmenuHistory);
			}
			redirect('Admin/MenuManagement');
		}
	}

	public function MenuManagement_deleteSubmenu()
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$this->form_validation->set_rules('txtIDSubmenu', 'ID Submenu', 'required');

		if($this->form_validation->run() !== FALSE)
		{
			$id_menu_sub1 		=	filter_var($this->encryption->decrypt(str_replace(array('-', '_', '~'), array('+', '/', '='), $this->input->post('txtIDSubmenu', TRUE))), FILTER_SANITIZE_NUMBER_INT);
			
			echo $id_menu_sub1.'<br/>';

			$this->MenuManagement_processDeletePost(FALSE, FALSE, $id_menu_sub1, 'RELATION DELETE');
			$this->MenuManagement_processDeleteUserAccess(FALSE, FALSE, FALSE, $id_menu_sub1, 'RELATION DELETE');
			$this->MenuManagement_processDeleteSubmenu(FALSE, $id_menu_sub1, 'DELETE');
			redirect('Admin/MenuManagement');
		}
	}

	public function MenuManagement_processDeletePost($id_post = FALSE, $id_menu = FALSE, $id_menu_sub1 = FALSE, $type)
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$getPostList 	=	$this->M_admin->getPostList($id_post, $id_menu, $id_menu_sub1);
		foreach ($getPostList as $post)
		{
			if(empty($post['id_menu_sub1']))
			{
				$post['id_menu_sub1']	=	NULL;
			}
			if(empty($post['preview']))
			{
				$post['preview']	=	NULL;
			}
			if(empty($post['preview_image']))
			{
				$post['preview_image']	=	NULL;
			}
			if(empty($post['last_revise_timestamp']))
			{
				$post['last_revise_timestamp']	=	NULL;
			}
			if(empty($post['last_revise_user']))
			{
				$post['last_revise_user']	=	NULL;
			}

			$insertPostHistory		= 	array
										(
											'id_post'				=>	$post['id_post'],
											'id_menu'				=>	$post['id_menu'],
											'id_menu_sub1'			=>	$post['id_menu_sub1'],
											'title'					=>	$post['title'],
											'content'				=>	$post['content'],
											'preview'				=>	$post['preview'],
											'preview_image'			=>	$post['preview_image'],
											'approved'				=>	$post['approved'],
											'revise_timestamp'		=>	$post['last_revise_timestamp'],
											'revise_user'			=>	$post['last_revise_user'],
											'type'					=>	$type,
											'delete_timestamp'		=>	$executionTimestamp,
											'delete_user'			=>	$this->encryption->decrypt($this->session->userdata('id_user')),
										);
			echo '<pre>';
			print_r($insertPostHistory);
			echo '</pre>';
			$this->M_admin->insertPostHistory($insertPostHistory);
		}

		if($id_post !== FALSE)
		{
			$this->M_admin->deletePost($id_post, FALSE, FALSE);
			echo '1';
		}

		if($id_menu !== FALSE)
		{
			$this->M_admin->deletePost(FALSE, $id_menu, FALSE);
			echo '2';
		}

		if($id_menu_sub1 !== FALSE)
		{
			$this->M_admin->deletePost(FALSE, FALSE, $id_menu_sub1);
			echo '3';
		}
	}

	public function MenuManagement_processDeleteUserAccess($id_user_access = FALSE, $id_user = FALSE, $id_menu = FALSE, $id_menu_sub1 = FALSE, $type)
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$getUserAccessList 	=	$this->M_admin->getUserAccessList($id_user_access, $id_user, $id_menu, $id_menu_sub1);
		foreach ($getUserAccessList as $userAccess)
		{
			if(empty($post['id_menu_sub1']))
			{
				$post['id_menu_sub1']	=	NULL;
			}

			$insertUserAccessHistory	=	array
											(
												'id_user_access'	=>	$userAccess['id_user_access'],
												'id_user'			=>	$userAccess['id_user'],
												'id_menu'			=>	$userAccess['id_menu'],
												'id_menu_sub1'		=>	$userAccess['id_menu_sub1'],
												'type'				=>	$type,
												'delete_timestamp'	=>	$executionTimestamp,
												'delete_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
											);
			echo '<pre>';
			print_r($insertUserAccessHistory);
			echo '</pre>';

			$this->M_admin->insertUserAccessHistory($insertUserAccessHistory);
		}

		if($id_user_access !== FALSE)
		{
			$this->M_admin->deleteUserAccess($id_user_access, FALSE, FALSE, FALSE);
		}
		
		if($id_user !== FALSE)
		{
			$this->M_admin->deleteUserAccess(FALSE, $id_user, FALSE, FALSE);
		}
		
		if($id_menu !== FALSE)
		{
			$this->M_admin->deleteUserAccess(FALSE, FALSE, $id_menu, FALSE);
		}
		
		if($id_menu_sub1 !== FALSE)
		{
			$this->M_admin->deleteUserAccess(FALSE, FALSE, FALSE, $id_menu_sub1);
		}
	}

	public function MenuManagement_processDeleteSubmenu($id_menu = FALSE, $id_menu_sub1 = FALSE, $type)
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$getSubmenu 	=	$this->M_admin->getSubMenuList($id_menu, $id_menu_sub1);
		foreach ($getSubmenu as $submenu)
		{
			if(empty($submenu['external_site']))
			{
				$submenu['external_site']	=	NULL;
			}
			$insertSubmenuHistory	=	array
										(
											'id_menu_sub1'		=>	$submenu['id_menu_sub1'],
											'id_menu'			=>	$submenu['id_menu'],
											'name'				=>	$submenu['name'],
											'multi_post'		=>	$submenu['multi_post'],
											'priority_involved'	=>	$submenu['priority_involved'],
											'external_reference'=>	$submenu['external_reference'],
											'external_site'		=>	$submenu['external_site'],
											'type'				=>	$type,
											'delete_timestamp'	=>	$executionTimestamp,
											'delete_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
										);
			echo '<pre>';
			print_r($insertSubmenuHistory);
			echo '</pre>';

			$this->M_admin->insertSubmenuHistory($insertSubmenuHistory);
		}

		if($id_menu !== FALSE)
		{
			$this->M_admin->deleteSubmenu($id_menu, FALSE);
		}

		if($id_menu_sub1 !== FALSE)
		{
			$this->M_admin->deleteSubmenu(FALSE, $id_menu_sub1);
		}
	}

	public function MenuManagement_processDeleteMenu($id_menu, $type)
	{
		$executionTimestamp	=	date('Y-m-d H:i:s');

		$getMainMenu 	=	$this->M_admin->getMainMenuList($id_menu);
		foreach ($getMainMenu as $menu)
		{
			if(empty($menu['external_site']))
			{
				$menu['external_site']	=	NULL;
			}
			$insertMenuHistory		=	array
										(
											'id_menu'			=>	$menu['id_menu'],
											'name'				=>	$menu['name'],
											'submenu_included'	=>	$menu['submenu_included'],
											'multi_post'		=>	$menu['multi_post'],
											'priority_involved'	=>	$menu['priority_involved'],
											'external_reference'=>	$menu['external_reference'],
											'external_site'		=>	$menu['external_site'],
											'type'				=>	$type,
											'delete_timestamp'	=>	$executionTimestamp,
											'delete_user'		=>	$this->encryption->decrypt($this->session->userdata('id_user')),
										);
			echo '<pre>';
			print_r($insertMenuHistory);
			echo '</pre>';

			$this->M_admin->insertMenuHistory($insertMenuHistory);
		}
		$this->M_admin->deleteMenu($id_menu);
	}
}
