<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('users_model');
	}
	
	function index(){	    
		if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd" or $this->session->userdata('level')=="verifikator" or $this->session->userdata('level')=="kasubid" or $this->session->userdata('level')=="kabid"))
        {
			$data['title']='Dashboard';
	        $data['login_nama']=$this->access->get_nama();
	        $data['app']=$this->access->get_aplikasi();
			//$this->template->load('dashboard_view',$data);

			$data['jumlah_pengajuan'] = $this->db->query("select count(*) as jml_pengajuan from spm")->row()->jml_pengajuan;
			$data['jumlah_sp2dbl'] = $this->db->query("select count(*) as jml_sp2dbl from spm where tipe='BL'")->row()->jml_sp2dbl;
			$data['jumlah_sp2dbtl'] = $this->db->query("select count(*) as jml_sp2dbtl from spm where tipe='BTL'")->row()->jml_sp2dbtl;
			$data['jumlah_tolak'] = $this->db->query("select count(*) as jml_tolak from spm where (StatusVerifikasi=2 or StatusAppKasubid=2 or StatusAppKabid=2)")->row()->jml_tolak;

			//$data['data_fpm'] = $this->db->query("select * from fpm order by id_fpm desc limit 1,10")->result();
			//$data['data_fpk'] = $this->db->query("select * from fpk order by id_fpk desc limit 1,10")->result();

			$this->template->load('template','dashboard', $data);
		}
        else
        {
            header('location:'.base_url().'');
        }
	}
    
    function password(){
        $this->load->library('form_validation');
        
		$this->form_validation->set_rules('password-old', 'Old Password','required|strip_tags');
		$this->form_validation->set_rules('password-new', 'New Password','required|strip_tags');
        $this->form_validation->set_rules('password-confirm', 'Confirm Password','required|strip_tags');
        
        if($this->form_validation->run() == TRUE){
            $this->form_validation->set_rules('token','token','callback_proses_password');
			if($this->form_validation->run()==TRUE){				
				$status['status'] = 1;
                $status['error'] = '';
			}else{
                $status['status'] = 0;
                $status['error'] = validation_errors();
			}
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }
    
    function proses_password(){		
		$old = $this->input->post('password-old', TRUE);
		$new = $this->input->post('password-new', TRUE);
		$confirm = $this->input->post('password-confirm', TRUE);
		
		$username = $this->access->get_username();
		
		if($this->users_model->get_user_count($username, $old)>0){
			if($new==$confirm){
				$this->users_model->change_password($username, $new);
				return TRUE;		
			}else{
				$this->form_validation->set_message('proses_password','Password baru tidak cocok');
				return FALSE;	
			}
		}else{
			$this->form_validation->set_message('proses_password','Password Lama tidak sesuai');
			return FALSE;
		}
	}
	
	function get_jumlah_pembuatanbu(){
		//$this->load->model('pembuatanbu_model');
		
		$data = $this->db->query("select a.nama_plant, count(b.id_pembuatanbu) as jml_pembuatanbu
														from plant a left join pembuatanbu b on a.id_plant=b.id_plant
														group by a.id_plant")->result();
		
		echo json_encode($data);
	}

	public function currMenu()
	{		
		$cMenu = $this->input->post("idMenu");

		if(isset($cMenu))
		{
			$this->unSetMenu();
			$this->activeMenu($cMenu);
			//$this->session->set_userdata('m2', 'active');
		} 
		else
		{
			//$this->unSetMenu();
			echo "not set - ".$cMenu;	
		}
	}

	public function activeMenu($sMenu)
	{
		$this->unSetMenu();

		$parent = $this->db->query("select is_parent from menu where id=".$sMenu)->row()->is_parent;
		$sHMenu = "m".$parent;
		//$sHMenu = "m".substr($sMenu, 0, 3)."0";
		$sItmMenu = "m".$sMenu;

		$this->session->set_userdata($sHMenu, 'active');
		$this->session->set_userdata($sItmMenu, 'active');
	}

	public function unSetMenu()
	{		
		$menu = $this->db->query("select * from menu")->result();
		foreach ($menu as $menus) {
			$menus = "m".$menus->id;
			$this->session->set_userdata($menus,'');
		}
	}
}