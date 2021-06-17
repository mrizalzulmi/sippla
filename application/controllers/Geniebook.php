<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Geniebook extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
    }

    function get_max_profit()
    {
        $stock_prices_yesterday = array(10, 7, 5, 8, 11, 9);
        
    }

    function shownumber()
    {
        $n = 4;
        $i = $n+1;
        $j = $n+4;

        for($a=1; $a<$i; $a++){

            for($b=1; $b<$j; $b++) {
                $c=1;
                if($a+1==$b or $a+2==$b) {
                    $c='*';
                } else {
                    $c=$b;
                }
                echo $c.' ';         
            }
            echo "<br>";
        }    

    }

    function merge_lists()
    {
        $my_list = array(3, 4, 6, 10, 11, 15);
        $alices_list = array(1, 5, 8, 12, 14, 19);
        $all_list = array();

        for($a=0; $a<6; $a++) {
            array_push($all_list, $my_list[$a]);
        }

        for($a=0; $a<6; $a++) {
            array_push($all_list, $alices_list[$a]);
        }
        
        for($i=0; $i<12; $i++) {
            for($j=0; $j<12; $j++) {
                if($all_list[$j] > $all_list[$j+1]) {
                    $all_list[0] = $all_list[$j];
                    $all_list[$j] = $all_list[$j+1];
                    $all_list[$j+1] = $all_list[0];
                }
            }
        }
        

        return $all_list;    
    }

    function get_product()
    {
        $product = array(1,7,3,4);
        $productmultiply = array();
        

        for($a=0; $a<4; $a++){
            $total=1;

            for($b=0; $b<4; $b++) {
                if($product[$b]<>$product[$a]) {
                    $total=$total*$product[$b];
                }
            }

            $productmultiply[]=$total;
        }    

        return $productmultiply;
    }

    public function index()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai"))
        {
            $pegawai = $this->Pegawai_model->get_all_query();

            $data = array(
                'pegawai_data' => $pegawai
            );

            $this->template->load('template','pegawai/pegawai_list', $data);
        }
        else
        {
            header('location:'.base_url().'');
        }
    }

    public function read($id) 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai"))
        {
            $row = $this->Pegawai_model->get_by_id($id);
            if ($row) {
                $data = array(
            		'IdPegawai' => $row->IdPegawai,
                    'IdOrganisasi' => $row->IdOrganisasi,
            		'Nip' => $row->Nip,
            		'NamaPegawai' => $row->NamaPegawai,
            		'TempatLahir' => $row->TempatLahir,
                    'TanggalLahir' => $row->TanggalLahir,
                    'Alamat' => $row->Alamat,
                    'Email' => $row->Email,
                    'Foto' => $row->Foto,
                    'StatusPegawai' => $row->StatusPegawai,
                    //'jabatan' => $row->jabatan,
                    'IsAktif' => $row->IsAktif,
                    //'gapok' => $row->gapok,
                    'IsUserOPD' => $row->IsUserOPD,
                    'username' => $row->username,
                    'password' => $row->password,
    	    );
                $this->template->load('template','pegawai/pegawai_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('pegawai'));
            }
        }
        else
        {
            header('location:'.base_url().'');
        }
    }

    public function create() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai"))
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('pegawai/create_action'),
        	    'IdPegawai' => set_value('IdPegawai'),
                'IdOrganisasi' => set_value('IdOrganisasi'),
        	    'Nip' => set_value('Nip'),
        	    'NamaPegawai' => set_value('NamaPegawai'),
        	    'TempatLahir' => set_value('TempatLahir'),
                'TanggalLahir' => set_value('TanggalLahir'),
                'Alamat' => set_value('Alamat'),
                'Email' => set_value('Email'),
                'Foto' => set_value('Foto'),
                'StatusPegawai' => set_value('StatusPegawai'),
                //'jabatan' => set_value('jabatan'),
                'IsAktif' => set_value('IsAktif'),
                //'gapok' => set_value('gapok'),
                'IsUserOPD' => set_value('IsUserOPD'),
                'username' => set_value('username'),
                'password' => set_value('password'),
    	    );

            $data['data_organisasi'] = $this->db->query('select * from organisasi order by KodeOrganisasi');
            $this->template->load('template','pegawai/pegawai_form', $data);
        }
        else
        {
            header('location:'.base_url().'');
        }
    }
    
    public function create_action() 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai"))
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                //upload config 
                $config['upload_path']      = './upload/pegawai/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if (!is_dir('upload'))
                {
                    mkdir('./upload', 0777, true);
                }

                if ($this->upload->do_upload('Foto')) {
                    $up_data1 = $this->upload->data();

                    $this->image_lib->initialize(array(
                        'image_library' => 'gd2', //library yang kita gunakan
                        'source_image' => './upload/pegawai/'. $up_data1['file_name'],
                        'maintain_ratio' => TRUE,
                        'create_thumb' => FALSE,
                        'width' => 700,
                        'height' => 550
                    ));
                    $this->image_lib->resize();

                    $upl_data = $up_data1['file_name'];
                } else {
                    $upl_data = "";
                }

                $data = array(
            		'IdOrganisasi' => $this->input->post('IdOrganisasi',TRUE),
                    'Nip' => $this->input->post('Nip',TRUE),
            		'NamaPegawai' => $this->input->post('NamaPegawai',TRUE),
            		'TempatLahir' => $this->input->post('TempatLahir',TRUE),
                    'TanggalLahir' => $this->input->post('TanggalLahir',TRUE),
                    'Alamat' => $this->input->post('Alamat',TRUE),
                    'Email' => $this->input->post('Email',TRUE),
                    'Foto' => $upl_data,
                    //'StatusPegawai' => $this->input->post('StatusPegawai',TRUE),
                    //'jabatan' => $this->input->post('jabatan',TRUE),
                    //'IsAktif' => $this->input->post('IsAktif',TRUE),
                    //'gapok' => $this->input->post('gapok',TRUE),
                    //'IsUserOPD' => $this->input->post('IsUserOPD',TRUE),
                    //'username' => $this->input->post('username',TRUE),
                    //'password' => $this->input->post('password',TRUE),
    	        );
                $this->Pegawai_model->insert($data);

                // Input ke User
                $idkary = $this->Pegawai_model->getMaxIdPegawai();
                $datauser = array(
                    //'id_plant' => $this->input->post('id_plant',TRUE),
                    'IdPegawai' => $idkary,
                    'nama' => $this->input->post('NamaPegawai',TRUE),
                    'username' => $this->input->post('username',TRUE),
                    'password' => sha1($this->input->post('password',TRUE)),
                    'level' => 'pegawai',
                    'aplikasi' => 'paperless',

                );
                $this->User_model->insert($datauser);

                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('pegawai'));
            }
        }
        else
        {
            header('location:'.base_url().'');
        }
    }
    
    public function update($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai"))
        {
            $row = $this->Pegawai_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('pegawai/update_action'),
            		'IdPegawai' => set_value('IdPegawai', $row->IdPegawai),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
            		'Nip' => set_value('Nip', $row->Nip),
            		'NamaPegawai' => set_value('NamaPegawai', $row->NamaPegawai),
            		'TempatLahir' => set_value('TempatLahir', $row->TempatLahir),
                    'TanggalLahir' => set_value('TanggalLahir', $row->TanggalLahir),
                    'Alamat' => set_value('Alamat', $row->Alamat),
                    'Email' => set_value('Email', $row->Email),
                    'Foto' => set_value('Foto', $row->Foto),
                    //'StatusPegawai' => set_value('StatusPegawai', $row->StatusPegawai),
                    //'jabatan' => set_value('jabatan', $row->jabatan),
                    //'IsAktif' => set_value('IsAktif', $row->IsAktif),
                    //'gapok' => set_value('gapok', $row->gapok),
                    //'IsUserOPD' => set_value('IsUserOPD', $row->IsUserOPD),
                    'username' => set_value('username', $row->username),
                    'password' => set_value('password', $row->password),
    	        );

                $data['data_organisasi'] = $this->db->query('select * from organisasi order by KodeOrganisasi');
                $this->template->load('template','pegawai/pegawai_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('pegawai'));
            }
        }
        else
        {
            header('location:'.base_url().'');
        }
    }
    
    public function update_action() 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai"))
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('IdPegawai', TRUE));
            } else {
                //upload config 
                $config['upload_path']      = './upload/pegawai/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if ($this->upload->do_upload('Foto')) {
                    $up_data1 = $this->upload->data();

                    // Resize Image
                    $this->image_lib->initialize(array(
                        'image_library' => 'gd2', //library yang kita gunakan
                        'source_image' => './upload/pegawai/'. $up_data1['file_name'],
                        'maintain_ratio' => TRUE,
                        'create_thumb' => FALSE,
                        'width' => 700,
                        'height' => 550
                    ));
                    $this->image_lib->resize();

                    $upl_data = $up_data1['file_name'];
                }
                else {
                    $upl_data = $this->input->post('Foto',TRUE);
                }

                $data = array(
            		'IdOrganisasi' => $this->input->post('IdOrganisasi',TRUE),
                    'Nip' => $this->input->post('Nip',TRUE),
            		'NamaPegawai' => $this->input->post('NamaPegawai',TRUE),
            		'TempatLahir' => $this->input->post('TempatLahir',TRUE),
                    'TanggalLahir' => $this->input->post('TanggalLahir',TRUE),
                    'Alamat' => $this->input->post('Alamat',TRUE),
                    'Email' => $this->input->post('Email',TRUE),
                    'Foto' => $upl_data,
                    //'StatusPegawai' => $this->input->post('StatusPegawai',TRUE),
                    //'jabatan' => $this->input->post('jabatan',TRUE),
                    //'IsAktif' => $this->input->post('IsAktif',TRUE),
                    //'gapok' => $this->input->post('gapok',TRUE),
                    //'IsUserOPD' => $this->input->post('IsUserOPD',TRUE),
                    //'username' => $this->input->post('username',TRUE),
                    //'password' => $this->input->post('password',TRUE),
    	        );

                $this->Pegawai_model->update($this->input->post('IdPegawai', TRUE), $data);

                $password = $this->Pegawai_model->getPassword($this->input->post('IdPegawai', TRUE));
                if($password==$this->input->post('password',TRUE)) {
                    $pass=$this->input->post('password',TRUE);
                } else {
                    $pass=sha1($this->input->post('password',TRUE));
                }

                $data2 = array(
                    'nama' => $this->input->post('NamaPegawai',TRUE),
                    'username' => $this->input->post('username',TRUE),
                    //'password' => sha1($this->input->post('password',TRUE)),
                    'password' => $pass,
                );

                $this->Pegawai_model->update_user($this->input->post('IdPegawai', TRUE), $data2);

                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('pegawai'));
            }
        }
        else
        {
            header('location:'.base_url().'');
        }
    }

    public function profile($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd" or $this->session->userdata('level')=="verifikator" or $this->session->userdata('level')=="kasubid" or $this->session->userdata('level')=="kabid"))
        {
            $row = $this->Pegawai_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('pegawai/updateprof_action'),
                    'IdPegawai' => set_value('IdPegawai', $row->IdPegawai),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Nip' => set_value('Nip', $row->Nip),
                    'NamaPegawai' => set_value('NamaPegawai', $row->NamaPegawai),
                    'TempatLahir' => set_value('TempatLahir', $row->TempatLahir),
                    'TanggalLahir' => set_value('TanggalLahir', $row->TanggalLahir),
                    'Alamat' => set_value('Alamat', $row->Alamat),
                    'Email' => set_value('Email', $row->Email),
                    'Foto' => set_value('Foto', $row->Foto),
                    //'StatusPegawai' => set_value('StatusPegawai', $row->StatusPegawai),
                    //'jabatan' => set_value('jabatan', $row->jabatan),
                    //'IsAktif' => set_value('IsAktif', $row->IsAktif),
                    //'gapok' => set_value('gapok', $row->gapok),
                    //'IsUserOPD' => set_value('IsUserOPD', $row->IsUserOPD),
                    'username' => set_value('username', $row->username),
                    'password' => set_value('password', $row->password),
                );

                $data['data_organisasi'] = $this->db->query('select * from organisasi order by KodeOrganisasi');
                $this->template->load('template','pegawai/pegawai_profile', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('pegawai/profile'));
            }
        }
        else
        {
            header('location:'.base_url().'');
        }
    }

    public function updateprof_action() 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd" or $this->session->userdata('level')=="verifikator" or $this->session->userdata('level')=="kasubid" or $this->session->userdata('level')=="kabid"))
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('IdPegawai', TRUE));
            } else {
                //upload config 
                $config['upload_path']      = './upload/pegawai/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';

                $this->load->library('upload', $config);
                $this->load->library('image_lib');

                if ($this->upload->do_upload('Foto')) {
                    $up_data1 = $this->upload->data();

                    // Resize Image
                    $this->image_lib->initialize(array(
                        'image_library' => 'gd2', //library yang kita gunakan
                        'source_image' => './upload/pegawai/'. $up_data1['file_name'],
                        'maintain_ratio' => TRUE,
                        'create_thumb' => FALSE,
                        'width' => 700,
                        'height' => 550
                    ));
                    $this->image_lib->resize();

                    $upl_data = $up_data1['file_name'];
                }
                else {
                    $upl_data = $this->input->post('Foto',TRUE);
                }

                $data = array(
                    'IdOrganisasi' => $this->input->post('IdOrganisasi',TRUE),
                    'Nip' => $this->input->post('Nip',TRUE),
                    'NamaPegawai' => $this->input->post('NamaPegawai',TRUE),
                    'TempatLahir' => $this->input->post('TempatLahir',TRUE),
                    'TanggalLahir' => $this->input->post('TanggalLahir',TRUE),
                    'Alamat' => $this->input->post('Alamat',TRUE),
                    'Email' => $this->input->post('Email',TRUE),
                    'Foto' => $upl_data,
                    //'StatusPegawai' => $this->input->post('StatusPegawai',TRUE),
                    //'jabatan' => $this->input->post('jabatan',TRUE),
                    //'IsAktif' => $this->input->post('IsAktif',TRUE),
                    //'gapok' => $this->input->post('gapok',TRUE),
                    //'IsUserOPD' => $this->input->post('IsUserOPD',TRUE),
                    //'username' => $this->input->post('username',TRUE),
                    //'password' => $this->input->post('password',TRUE),
                );

                $this->Pegawai_model->update($this->input->post('IdPegawai', TRUE), $data);

                $password = $this->Pegawai_model->getPassword($this->input->post('IdPegawai', TRUE));
                if($password==$this->input->post('password',TRUE)) {
                    $pass=$this->input->post('password',TRUE);
                } else {
                    $pass=sha1($this->input->post('password',TRUE));
                }

                $data2 = array(
                    'nama' => $this->input->post('NamaPegawai',TRUE),
                    'username' => $this->input->post('username',TRUE),
                    //'password' => sha1($this->input->post('password',TRUE)),
                    'password' => $pass,
                );

                $this->Pegawai_model->update_user($this->input->post('IdPegawai', TRUE), $data2);

                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('pegawai/profile/'.$this->input->post('IdPegawai', TRUE)));
            }
        }
        else
        {
            header('location:'.base_url().'');
        }
    }
    
    public function delete($id) 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai"))
        {
            $row = $this->Pegawai_model->get_by_id($id);

            if ($row) {
                $this->Pegawai_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('pegawai'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('pegawai'));
            }
        }
        else
        {
            header('location:'.base_url().'');
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('Nip', 'NIP Pegawai', 'trim|required');
    	$this->form_validation->set_rules('NamaPegawai', 'Nama Pegawai', 'trim|required');
    	//$this->form_validation->set_rules('TempatLahir', 'luas penampang', 'trim|required');
        //$this->form_validation->set_rules('TanggalLahir', 'TanggalLahir', 'trim|required');

    	$this->form_validation->set_rules('IdPegawai', 'IdPegawai', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pegawai.xls";
        $judul = "pegawai";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pegawai");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pegawai");
    	xlsWriteLabel($tablehead, $kolomhead++, "Luas Penampang");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	   foreach ($this->Pegawai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Nip);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->NamaPegawai);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->TanggalLahir);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pegawai.doc");

        $data = array(
            'pegawai_data' => $this->Pegawai_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pegawai/pegawai_doc',$data);
    }

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */