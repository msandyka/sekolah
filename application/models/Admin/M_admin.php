<?php
class M_admin extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}

//usermanagement
	public function SaveDataUser($data)
	{
		return $this->db->insert('smk7smg_portal.tb_user', $data);
	}

	public function SaveToHistory($history)
	{
		return $this->db->insert('smk7smg_portal.tb_user_history', $history);
	}

	public function listdatauser()
	{
		$sql = $this->db->query("select * from smk7smg_portal.tb_user");
		return $sql->result_array();
	}

	public function UpdateDataUser($data,$id)
	{
		$this->db->where('id_user', $id);
        $this->db->update('smk7smg_portal.tb_user', $data);
	}

	public function deleteDataUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('smk7smg_portal.tb_user');
	}

	public function EditDataUser($id)
	{
		$sql = $this->db->query("select * from smk7smg_portal.tb_user where id_user='$id'");
		return $sql->result_array();
	}

//dashboard
	public function listdatapost()
	{
		$sql = $this->db->query("select * from smk7smg_portal.tb_post");
		return $sql->result_array();
	}

	public function CheckPost($id)
	{
		$sql = $this->db->query("select * from smk7smg_portal.tb_post where id_post = '$id'");
		return $sql->result_array();
	}

	public function kirimApprove($id)
    {
        $queryApprove   = " UPDATE  smk7smg_portal.tb_post
                                SET     approved = 3      
                                WHERE   id_post = '$id'
                                		and";
        $sqlApprove     =   $this->db->query($queryApprove);
    }

    public function kirimReject($id)
    {
        $queryApprove   = " UPDATE  smk7smg_portal.tb_post
                                SET     approved = 1      
                                WHERE   id_post = '$id'";
        $sqlApprove     =   $this->db->query($queryApprove);
    }

    public function kirimRevice($id)
    {
        $queryApprove   = " UPDATE  smk7smg_portal.tb_post
                                SET     approved = 2     
                                WHERE   id_post = '$id'";
        $sqlApprove     =   $this->db->query($queryApprove);
    }

    //	Menu Management
    //	{
    		public function insertMenuHistory($insertMenuHistory)
    		{
    			$this->db->insert('smk7smg_portal.tb_menu_history', $insertMenuHistory);
    		}

    		public function insertMainMenu($insertMainMenu)
    		{
    			$this->db->insert('smk7smg_portal.tb_menu', $insertMainMenu);
    			return $this->db->insert_id();
    		}

            public function updateMainMenu($updateMainMenu, $id_menu)
            {
                $this->db->where('id_menu=', $id_menu);
                $this->db->update('smk7smg_portal.tb_menu', $updateMainMenu);
            }

            public function deleteMenu($id_menu)
            {
                $this->db->where('id_menu=', $id_menu);
                $this->db->delete('smk7smg_portal.tb_menu');
            }

    		public function getMainMenuList($id_menu = FALSE)
    		{
    			$this->db->select('*');
    			$this->db->from('smk7smg_portal.tb_menu');
    			if($id_menu !== FALSE)
    			{
    				$this->db->where('id_menu=', $id_menu);
    			}
    			return $this->db->get()->result_array();
    		}

    		public function getSubMenuList($id_menu = FALSE, $id_menu_sub1 = FALSE)
    		{
    			$this->db->select('*');
    			$this->db->from('smk7smg_portal.tb_menu_sub1');
    			
                if($id_menu !== FALSE)
                {
                    $this->db->where('id_menu=', $id_menu);
                }
                if($id_menu_sub1 !== FALSE)
    			{
    				$this->db->where('id_menu_sub1=', $id_menu_sub1);
    			}

    			return $this->db->get()->result_array();
    		}
    		
    		public function insertSubmenu($insertSubmenu)
    		{
    			$this->db->insert('smk7smg_portal.tb_menu_sub1', $insertSubmenu);
    			return $this->db->insert_id();
    		}

            public function updateSubmenu($updateSubmenu, $id_menu_sub1)
            {
                $this->db->where('id_menu_sub1=', $id_menu_sub1);
                $this->db->update('smk7smg_portal.tb_menu_sub1', $updateSubmenu);
            }

    		public function insertSubmenuHistory($insertSubmenuHistory)
    		{
    			$this->db->insert('smk7smg_portal.tb_menu_sub1_history', $insertSubmenuHistory);
    		}

            public function deleteSubmenu($id_menu = FALSE, $id_menu_sub1 = FALSE)
            {
                if($id_menu !== FALSE)
                {
                    $this->db->where('id_menu=', $id_menu);
                    $this->db->delete('smk7smg_portal.tb_menu_sub1');
                }

                if($id_menu_sub1 !== FALSE)
                {
                    $this->db->where('id_menu_sub1', $id_menu_sub1);
                    $this->db->delete('smk7smg_portal.tb_menu_sub1');
                }
            }
	//	}

    //  Post Management
    //  {
            public function getPostList($id_post = FALSE, $id_menu = FALSE, $id_menu_sub1 = FALSE)
            {
                $this->db->select('*');
                $this->db->from('smk7smg_portal.tb_post');
                if($id_post !== FALSE)
                {
                    $this->db->where('id_post=', $id_post);
                }

                if($id_menu !== FALSE)
                {
                    $this->db->where('id_menu=', $id_menu);
                }

                if($id_menu_sub1 !== FALSE)
                {
                    $this->db->where('id_menu_sub1=', $id_menu_sub1);
                }

                return $this->db->get()->result_array();
            }

            public function insertPostHistory($insertPostHistory)
            {
                $this->db->insert('smk7smg_portal.tb_post_history', $insertPostHistory);
            }

            public function deletePost($id_post = FALSE, $id_menu = FALSE, $id_menu_sub1 = FALSE)
            {
                if($id_post !== FALSE)
                {
                    $this->db->where('id_post=', $id_post);
                    $this->db->delete('smk7smg_portal.tb_post');
                }

                if($id_menu !== FALSE)
                {
                    $this->db->where('id_menu=', $id_menu);
                    $this->db->delete('smk7smg_portal.tb_post');
                }

                if($id_menu_sub1 !== FALSE)
                {
                    $this->db->where('id_menu_sub1=', $id_menu_sub1);
                    $this->db->delete('smk7smg_portal.tb_post');
                }
            }
    //  }

    //  User Access Management
    //  {
            public function getUserAccessList($id_user_access = FALSE, $id_user = FALSE, $id_menu = FALSE, $id_menu_sub1 = FALSE)
            {
                $this->db->select('*');
                $this->db->from('smk7smg_portal.tb_user_access');
                if($id_user_access !== FALSE)
                {
                    $this->db->where('id_user_access=', $id_user_access);
                }

                if($id_user !== FALSE)
                {
                    $this->db->where('id_user=', $id_user);
                }

                if($id_menu !== FALSE)
                {
                    $this->db->where('id_menu=', $id_menu);
                }

                if($id_menu_sub1 !== FALSE)
                {
                    $this->db->where('id_menu_sub1=', $id_menu_sub1);
                }

                return $this->db->get()->result_array();
            }

            public function deleteUserAccess($id_user_access = FALSE, $id_user = FALSE, $id_menu = FALSE, $id_menu_sub1 = FALSE)
            {
                if($id_user_access !== FALSE)
                {
                    $this->db->where('id_user_access=', $id_user_access);
                    $this->db->delete('smk7smg_portal.tb_user_access');
                }
                if($id_user !== FALSE)
                {
                    $this->db->where('id_user=', $id_user);
                    $this->db->delete('smk7smg_portal.tb_user_access');
                }
                if($id_menu !== FALSE)
                {
                    $this->db->where('id_menu=', $id_menu);
                    $this->db->delete('smk7smg_portal.tb_user_access');
                }
                if($id_menu_sub1 !== FALSE)
                {
                    $this->db->where('id_menu_sub1=', $id_menu_sub1);
                    $this->db->delete('smk7smg_portal.tb_user_access');
                }
            }

            public function insertUserAccessHistory($insertUserAccessHistory)
            {
                $this->db->insert('smk7smg_portal.tb_user_access_history', $insertUserAccessHistory);
            }
    //  }
}