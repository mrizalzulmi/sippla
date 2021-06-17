<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spm extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->model('Spm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $spm = $this->Spm_model->get_all_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();

            $this->template->load('template','spm/list', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function upload()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $spm = $this->Spm_model->get_all_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();

            $this->template->load('template','spm/list', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function verifikasi()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {
            $spm = $this->Spm_model->get_verifikasi_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();

            $this->template->load('template','spm/verifikasilist', $data);
        } else {
            header('location:'.base_url().'');
        }
    }


//---------- tambahanku ------------

    public function verifikasiview()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {
            //$spm = $this->Spm_model->get_all_query();
            $spm = $this->Spm_model->get_verifikasi_cek_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();

            $this->template->load('template','spm/verifikasiview', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    //----------------------------------------------------

    public function approvalkasubid()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="kasubid")) {
            $spm = $this->Spm_model->get_kasubid_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();
            $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
            $this->template->load('template','spm/appkasubidlist', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function approvalkabid()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="kabid")) {
            $spm = $this->Spm_model->get_kabid_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();
            $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
            $this->template->load('template','spm/appkabidlist', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function penomoransp2d()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {
            $spm = $this->Spm_model->get_penomoran_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();

            $this->template->load('template','spm/penomoranlist', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function spmtolak()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd" or $this->session->userdata('level')=="verifikator" or $this->session->userdata('level')=="kasubid" or $this->session->userdata('level')=="kabid")) {
            $spm = $this->Spm_model->get_tolak_query();

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();

            $this->template->load('template','spm/tolaklist', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function arsip()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd" or $this->session->userdata('level')=="verifikator" or $this->session->userdata('level')=="kasubid") or $this->session->userdata('level')=="kabid") {
            $spm = $this->Spm_model->get_arsip_query();
            //$spm = $this->db->query("select ");

            $data = array(
                'spm_data' => $spm
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();
            $data['organisasi'] = $this->access->get_organisasi();
            $data['organisasi2'] = $this->session->userdata('IdOrganisasi');
            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else if(!empty($this->session->userdata('IdOrganisasi'))) {
                $data['org_sess'] = $this->session->userdata('IdOrganisasi');
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->session->userdata('IdOrganisasi'));
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();
            $data['data_organisasi'] = $this->db->query('select * from organisasi order by KodeOrganisasi');

            $this->template->load('template','spm/arsiplist', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function read($id) 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $row = $this->Spm_model->get_by_id($id);
            if ($row) {
                $data = array(
                    'disable' => 'disabled',
                    'button' => '',
                    'action' => '',
            		'IdSpm' => set_value('IdSpm', $row->IdSpm),
                    'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'IdSpp' => set_value('IdSpp', $row->IdSpp),
                    'Tipe' => set_value('Tipe', $row->Tipe),
                    'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
    	        );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_spp'] = $this->db->query('select a.*, sum(b.Jumlah) as Jumlah from spp a left join sppdetil b on a.IdSpp=b.IdSpp order by a.NoSpp');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');
                $this->template->load('template','spm/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }

    public function create() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $data = array(
                'disable' => '',
                'button' => 'Create',
                'action' => site_url('spm/create_action'),
        	    'IdSpm' => set_value('IdSpm'),
        	    'NoSpm' => set_value('NoSpm'),
                'Jenis' => set_value('Jenis'),
                'IdVerifikator' => set_value('IdVerifikator'),
                'IdOrganisasi' => set_value('IdOrganisasi'),
        	    'Tipe' => set_value('Tipe'),
        	    'IdProgram' => set_value('IdProgram'),
                'Tanggal' => set_value('Tanggal'),
                'FileUp' => set_value('FileUp'),
    	    );

            $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
            $data['data_jenis'] = $this->db->query('select * from jenis order by Jenis');
            $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
            $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
            $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

            if(!empty($this->access->get_organisasi())) {
                $data['org_sess'] = $this->access->get_organisasi();
                $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
            } else {
                $data['org_sess'] = '';
                $data['org_nama'] = '';
            }
            $data['peg_sess'] = $this->access->get_pegawai();

            $this->template->load('template','spm/form', $data);
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function create_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                //upload config 
                //$this->load->library('upload');
                $tahun=$this->access->get_tahun();
                $filepath = 'filepdf';
                switch($tahun){
                     
                    case 2020 :
                        $filepath = 'filepdf';
                        break;
                    case 2021 :
                        $filepath = 'filepdf2021';
                        break;
                    case 2022 :
                        $filepath = 'filepdf2022';
                        break;
                    default :
                        $filepath = 'filepdf';
                        break;
                }
                //$config['upload_path']      = './upload/filepdf/';
                $config['upload_path']      = './upload/'.$filepath.'/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'pdf';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                //$config['file_name']        = $this->input->post('NoSpm',TRUE);

                $this->load->library('upload', $config);
                //$this->upload->initialize($config);
                $this->load->library('image_lib');

                if (!is_dir('upload'))
                {
                    mkdir('./upload', 0777, true);
                }

                // foto
                if ($this->upload->do_upload('FileUp')) {
                    $up_data1 = $this->upload->data();

                    /*
                    $this->image_lib->initialize(array(
                        'image_library' => 'gd2', //library yang kita gunakan
                        'source_image' => './upload/filepdf/'. $up_data1['file_name'],
                        'maintain_ratio' => TRUE,
                        'create_thumb' => FALSE,
                        'width' => 700,
                        'height' => 550
                    ));
                    $this->image_lib->resize();*/

                    $upl_data = $up_data1['file_name'];
                } else {
                    $upl_data = "";
                }
                $data = array(
            		'NoSpm' => $this->input->post('NoSpm',TRUE),
                    'Jenis' => $this->input->post('Jenis',TRUE),
                    'IdSpp' => $this->input->post('IdSpp',TRUE),
            		'Tipe' => $this->input->post('Tipe',TRUE),
            		'IdProgram' => $this->input->post('IdProgram',TRUE),
                    'IdOrganisasi' => $this->input->post('IdOrganisasi',TRUE),
                    'IdVerifikator' => $this->input->post('IdVerifikator',TRUE),
                    'Tanggal' => $this->input->post('Tanggal',TRUE),
                    'TanggalUp' => date('Y-m-d H:i:s'),
                    'FileUp' => $upl_data,
                    'SubmitDt' => date('Y-m-d H:i:s'),
    	        );

                $this->Spm_model->insert($data);

                $IdSpm = $this->Spm_model->getIdAnggaranBelanja();
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('spm/upload/'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function update($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button' => 'Update',
                    'action' => site_url('spm/update_action'),
            		'IdSpm' => set_value('IdSpm', $row->IdSpm),
            		'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'Jenis' => set_value('Jenis', $row->Jenis),
                    'IdVerifikator' => set_value('IdVerifikator', $row->IdVerifikator),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
            		'Tipe' => set_value('Tipe', $row->Tipe),
            		'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
                    'FileUp' => set_value('FileUp', $row->FileUp),
    	        );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_jenis'] = $this->db->query('select * from jenis order by Jenis');
                $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

                if(!empty($this->access->get_organisasi())) {
                    $data['org_sess'] = $this->access->get_organisasi();
                    $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
                } else {
                    $data['org_sess'] = '';
                    $data['org_nama'] = '';
                }
                $data['peg_sess'] = $this->access->get_pegawai();
                
                $this->template->load('template','spm/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function update_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('IdSpm', TRUE));
            } else {
                /* Upload File */
                //upload config 
                $tahun=$this->access->get_tahun();
                $filepath = 'filepdf';
                switch($tahun){
                     
                    case 2020 :
                        $filepath = 'filepdf';
                        break;
                    case 2021 :
                        $filepath = 'filepdf2021';
                        break;
                    case 2022 :
                        $filepath = 'filepdf2022';
                        break;
                    default :
                        $filepath = 'filepdf';
                        break;
                }
                //$config['upload_path']      = './upload/filepdf/';
                $config['upload_path']      = './upload/'.$filepath.'/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                //$nama_file                  = str_replace('/','',$this->input->post('NoSpm', TRUE));
                //$nama_file                  = $this->input->post('NoSpm', TRUE);
                //$config['file_name']        = $nama_file;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('FileUp')) {
                    $up_ktp1 = $this->upload->data();
                    $upl_ktp = $up_ktp1['file_name'];
                }
                else {
                    $upl_ktp = $this->input->post('FileUp',TRUE);
                }

                $data = array(
            		'NoSpm' => $this->input->post('NoSpm',TRUE),
                    'Jenis' => $this->input->post('Jenis',TRUE),
                    'IdSpp' => $this->input->post('IdSpp',TRUE),
            		'Tipe' => $this->input->post('Tipe',TRUE),
            		'IdProgram' => $this->input->post('IdProgram',TRUE),
                    'IdOrganisasi' => $this->input->post('IdOrganisasi',TRUE),
                    'IdVerifikator' => $this->input->post('IdVerifikator',TRUE),
                    'Tanggal' => $this->input->post('Tanggal',TRUE),
                    'FileUp' => $upl_ktp,
                    'ModDt' => date('Y-m-d H:i:s'),
    	        );

                $this->Spm_model->update($this->input->post('IdSpm', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('spm/upload/'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }

    public function revisispm($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button' => 'Revisi',
                    'action' => site_url('spm/revisispm_action'),
                    'IdSpm' => set_value('IdSpm', $row->IdSpm),
                    'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'Jenis' => set_value('Jenis', $row->Jenis),
                    'IdVerifikator' => set_value('IdVerifikator', $row->IdVerifikator),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Tipe' => set_value('Tipe', $row->Tipe),
                    'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
                    'FileUp' => set_value('FileUp', $row->FileUp),
                );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_jenis'] = $this->db->query('select * from jenis order by Jenis');
                $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

                if(!empty($this->access->get_organisasi())) {
                    $data['org_sess'] = $this->access->get_organisasi();
                    $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
                } else {
                    $data['org_sess'] = '';
                    $data['org_nama'] = '';
                }
                $data['peg_sess'] = $this->access->get_pegawai();
                
                $this->template->load('template','spm/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function revisispm_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('IdSpm', TRUE));
            } else {
                /* Upload File */
                //upload config 
                $tahun=$this->access->get_tahun();
                $filepath = 'filepdf';
                switch($tahun){
                     
                    case 2020 :
                        $filepath = 'filepdf';
                        break;
                    case 2021 :
                        $filepath = 'filepdf2021';
                        break;
                    case 2022 :
                        $filepath = 'filepdf2022';
                        break;
                    default :
                        $filepath = 'filepdf';
                        break;
                }
                //$config['upload_path']      = './upload/filepdf/';
                $config['upload_path']      = './upload/'.$filepath.'/';
                //$config['allowed_types']    = 'gif|jpg|png|pdf|doc|docx';
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']         = '0';
                $config['max_width']        = '0';
                $config['max_height']       = '0';
                //$nama_file                  = str_replace('/','',$this->input->post('NoSpm', TRUE));
                //$nama_file                  = $this->input->post('NoSpm', TRUE);
                //$config['file_name']        = $nama_file;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('FileUp')) {
                    $up_ktp1 = $this->upload->data();
                    $upl_ktp = $up_ktp1['file_name'];
                }
                else {
                    $upl_ktp = $this->input->post('FileUp',TRUE);
                }

                
                // Update Status Revisi
                $data = array(
                    'StatusView' => 2,
                );

                $this->Spm_model->update($this->input->post('IdSpm', TRUE), $data);

                // Insert Data Baru Hasil Revisi
                $data = array(
                    'NoSpm' => $this->input->post('NoSpm',TRUE),
                    'Jenis' => $this->input->post('Jenis',TRUE),
                    'IdSpp' => $this->input->post('IdSpp',TRUE),
                    'Tipe' => $this->input->post('Tipe',TRUE),
                    'IdProgram' => $this->input->post('IdProgram',TRUE),
                    'IdOrganisasi' => $this->input->post('IdOrganisasi',TRUE),
                    'IdVerifikator' => $this->input->post('IdVerifikator',TRUE),
                    'Tanggal' => $this->input->post('Tanggal',TRUE),
                    'TanggalUp' => date('Y-m-d H:i:s'),
                    'FileUp' => $upl_ktp,
                    'SubmitDt' => date('Y-m-d H:i:s'),
                    'IsRevisi' => 1,
                    'IdSpmOld' => $this->input->post('IdSpm', TRUE),
                );

                $this->Spm_model->insert($data);

                $this->session->set_flashdata('message', 'Revise Record Success');
                redirect(site_url('spm/upload/'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function delete($id) 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="opd")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $this->Spm_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('spm'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }

    public function cekverifikasi($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button' => 'Submit',
                    'action' => site_url('spm/cekverifikasi_action'),
                    'IdSpm' => set_value('IdSpm', $row->IdSpm),
                    'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'IdVerifikator' => set_value('IdVerifikator', $row->IdVerifikator),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Tipe' => set_value('Tipe', $row->Tipe),
                    'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
                    'FileUp' => set_value('FileUp', $row->FileUp),
                    'Keterangan' => set_value('Keterangan', ''),
                );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
                $data['data_kasubid'] = $this->db->query('select * from pegawai where IsKasubid=1 and IsAktif=1 order by NamaPegawai');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

                if(!empty($this->access->get_organisasi())) {
                    $data['org_sess'] = $this->access->get_organisasi();
                    $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
                } else {
                    $data['org_sess'] = '';
                    $data['org_nama'] = '';
                }
                $data['peg_sess'] = $this->access->get_pegawai();
                
                $this->template->load('template','spm/verifikasiform', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function cekverifikasi_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {

            if(!empty($this->input->post('terima',TRUE))) {
                $status=1;
            } else if(!empty($this->input->post('tolak',TRUE))) {
                $status=2;
            }
            $data = array(
                'IdKasubid' => $this->input->post('IdKasubid',TRUE),
                'Tipe' => $this->input->post('Tipe',TRUE),
                'Keterangan' => $this->input->post('Keterangan',TRUE),
                'StatusVerifikasi' => $this->input->post('StatusVerifikasi',TRUE),
                'AlasanTolakVer' => $this->input->post('AlasanTolakVer',TRUE),
                'TanggalVerifikasi' => date('Y-m-d H:i:s'),
            );

            $this->Spm_model->update($this->input->post('IdSpm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spm/verifikasi/'));
        } else {
            header('location:'.base_url().'');
        }
    }


    //---------- Tambahanku -------------------
    public function cekverifikasiupdate($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button' => 'Update',
                    'action' => site_url('spm/cekverifikasiupdate_action'),
                    'IdSpm' => set_value('IdSpm', $row->IdSpm),
                    'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'IdVerifikator' => set_value('IdVerifikator', $row->IdVerifikator),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Tipe' => set_value('Tipe', $row->Tipe),
                    'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
                    'FileUp' => set_value('FileUp', $row->FileUp),
                    'Keterangan' => set_value('Keterangan', $row->Keterangan),
                    'StatusVerifikasi' => set_value('StatusVerifikasi',$row->StatusVerifikasi),
                    'AlasanTolakVer' => set_value('AlasanTolakVer',$row->AlasanTolakVer),
                );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
                $data['data_kasubid'] = $this->db->query('select * from pegawai where IsKasubid=1 and IsAktif=1 order by NamaPegawai');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

                if(!empty($this->access->get_organisasi())) {
                    $data['org_sess'] = $this->access->get_organisasi();
                    $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
                } else {
                    $data['org_sess'] = '';
                    $data['org_nama'] = '';
                }
                $data['peg_sess'] = $this->access->get_pegawai();
                
                $this->template->load('template','spm/verifikasiform', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function cekverifikasiupdate_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {

            if(!empty($this->input->post('terima',TRUE))) {
                $status=1;
            } else if(!empty($this->input->post('tolak',TRUE))) {
                $status=2;
            }
            $data = array(
                'IdKasubid' => $this->input->post('IdKasubid',TRUE),
                'Tipe' => $this->input->post('Tipe',TRUE),
                'Keterangan' => $this->input->post('Keterangan',TRUE),
                'StatusVerifikasi' => $this->input->post('StatusVerifikasi',TRUE),
                'AlasanTolakVer' => $this->input->post('AlasanTolakVer',TRUE),
                'TanggalVerifikasi' => date('Y-m-d H:i:s'),
            );

            $this->Spm_model->update($this->input->post('IdSpm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spm/verifikasiview/'));
        } else {
            header('location:'.base_url().'');
        }
    }

    //----------- end tambahanku --------------



    public function cekpenomoransp2d($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button1' => 'Submit',
                    'action' => site_url('spm/cekpenomoransp2d_action'),
                    'IdSpm' => set_value('IdSpm', $row->IdSpm),
                    'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'IdVerifikator' => set_value('IdVerifikator', $row->IdVerifikator),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Tipe' => set_value('Tipe', $row->Tipe),
                    'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
                    'FileUp' => set_value('FileUp', $row->FileUp),
                    'Keterangan' => set_value('Keterangan', ''),
                );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
                $data['data_kasubid'] = $this->db->query('select * from pegawai where IsKasubid=1 and IsAktif=1 order by NamaPegawai');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

                if(!empty($this->access->get_organisasi())) {
                    $data['org_sess'] = $this->access->get_organisasi();
                    $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
                } else {
                    $data['org_sess'] = '';
                    $data['org_nama'] = '';
                }
                $data['peg_sess'] = $this->access->get_pegawai();
                
                $this->template->load('template','spm/penomoranform', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function cekpenomoransp2d_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="verifikator")) {

            /*
            if(!empty($this->input->post('terima',TRUE))) {
                $status=1;
            } else if(!empty($this->input->post('tolak',TRUE))) {
                $status=2;
            } */
            $data = array(
                'NoSp2d' => $this->input->post('NoSp2d',TRUE),
                'TanggalSp2d' => $this->input->post('TanggalSp2d',TRUE),
                'StatusPenomoran' => 1,
                'TanggalPenomoran' => date('Y-m-d H:i:s'),
            );

            $this->Spm_model->update($this->input->post('IdSpm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spm/penomoransp2d/'));
        } else {
            header('location:'.base_url().'');
        }
    }

    public function cekapprovalkasubid($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="kasubid")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button' => 'Submit',
                    'action' => site_url('spm/cekapprovalkasubid_action'),
                    'IdSpm' => set_value('IdSpm', $row->IdSpm),
                    'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'IdVerifikator' => set_value('IdVerifikator', $row->IdVerifikator),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Tipe' => set_value('Tipe', $row->Tipe),
                    'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
                    'FileUp' => set_value('FileUp', $row->FileUp),
                );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
                $data['data_kasubid'] = $this->db->query('select * from pegawai where IsKasubid=1 and IsAktif=1 order by NamaPegawai');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

                if(!empty($this->access->get_organisasi())) {
                    $data['org_sess'] = $this->access->get_organisasi();
                    $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
                } else {
                    $data['org_sess'] = '';
                    $data['org_nama'] = '';
                }
                $data['peg_sess'] = $this->access->get_pegawai();
                
                $this->template->load('template','spm/appkasubidform', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function cekapprovalkasubid_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="kasubid")) {

            if(!empty($this->input->post('terima',TRUE))) {
                $status=1;
            } else if(!empty($this->input->post('tolak',TRUE))) {
                $status=2;
            }
            $data = array(
                //'IdKasubid' => $this->input->post('IdKasubid',TRUE),
                'StatusAppKasubid' => $this->input->post('StatusAppKasubid',TRUE),
                'AlasanTolakKasubid' => $this->input->post('AlasanTolakKasubid',TRUE),
                'TanggalAppKasubid' => date('Y-m-d H:i:s'),
            );

            $this->Spm_model->update($this->input->post('IdSpm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spm/approvalkasubid/'));
        } else {
            header('location:'.base_url().'');
        }
    }

    public function cekapprovalkabid($id) 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="kabid")) {
            $row = $this->Spm_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button' => 'Submit',
                    'action' => site_url('spm/cekapprovalkabid_action'),
                    'IdSpm' => set_value('IdSpm', $row->IdSpm),
                    'NoSpm' => set_value('NoSpm', $row->NoSpm),
                    'IdVerifikator' => set_value('IdVerifikator', $row->IdVerifikator),
                    'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'Tipe' => set_value('Tipe', $row->Tipe),
                    'IdProgram' => set_value('IdProgram', $row->IdProgram),
                    'Tanggal' => set_value('Tanggal', $row->Tanggal),
                    'FileUp' => set_value('FileUp', $row->FileUp),
                );

                $data['data_tipe'] = $this->db->query('select * from tipe order by Tipe');
                $data['data_verifikator'] = $this->db->query('select * from pegawai where IsVerifikator=1 and IsAktif=1 order by NamaPegawai');
                $data['data_kasubid'] = $this->db->query('select * from pegawai where IsKasubid=1 and IsAktif=1 order by NamaPegawai');
                $data['data_program'] = $this->db->query('select * from program order by KodeProgram');
                $data['data_kegiatan'] = $this->db->query('select * from kegiatan order by KodeKegiatan');

                if(!empty($this->access->get_organisasi())) {
                    $data['org_sess'] = $this->access->get_organisasi();
                    $data['org_nama'] = $this->Spm_model->getOrganisasi($this->access->get_organisasi());
                } else {
                    $data['org_sess'] = '';
                    $data['org_nama'] = '';
                }
                $data['peg_sess'] = $this->access->get_pegawai();
                
                $this->template->load('template','spm/appkabidform', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('spm'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function cekapprovalkabid_action() 
    {
        date_default_timezone_set('Asia/Bangkok');
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="kabid")) {

            if(!empty($this->input->post('terima',TRUE))) {
                $status=1;
            } else if(!empty($this->input->post('tolak',TRUE))) {
                $status=2;
            }
            $data = array(
                //'IdKasubid' => $this->input->post('IdKasubid',TRUE),
                'StatusAppKabid' => $this->input->post('StatusAppKabid',TRUE),
                'AlasanTolakKabid' => $this->input->post('AlasanTolakKabid',TRUE),
                'TanggalAppKabid' => date('Y-m-d H:i:s'),
            );

            $this->Spm_model->update($this->input->post('IdSpm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spm/approvalkabid/'));
        } else {
            header('location:'.base_url().'');
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('NoSpm', 'Nomor SPM', 'trim|required');
        //$this->form_validation->set_rules('Jenis', 'Jenis SPM', 'trim|required');
        //$this->form_validation->set_rules('IdSpp', 'Nomor SPP', 'trim|required');
    	//$this->form_validation->set_rules('FileUp', 'FileUp', 'trim|required');
        if (empty($_FILES['FileUp']['name']))
        {
            $this->form_validation->set_rules('FileUp', 'File Upload PDF', 'required');
        }
    	$this->form_validation->set_rules('IdVerifikator', 'Nama Verifikator', 'trim|required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal SPM', 'trim|required');

    	$this->form_validation->set_rules('IdSpm', 'IdSpm', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $this->load->helper('exportexcel');
            $namaFile = "spm.xls";
            $judul = "spm";
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
        	xlsWriteLabel($tablehead, $kolomhead++, "Kode Spm");
        	xlsWriteLabel($tablehead, $kolomhead++, "Nama Spm");
        	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi Spm");

    	   foreach ($this->Spm_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
        	    xlsWriteLabel($tablebody, $kolombody++, $data->IdSpp);
        	    xlsWriteLabel($tablebody, $kolombody++, $data->Tipe);
        	    xlsWriteLabel($tablebody, $kolombody++, $data->IdProgram);

    	    $tablebody++;
                $nourut++;
            }

            xlsEOF();
            exit();
        } else {
            header('location:'.base_url().'');
        }
    }

    public function word()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=spm.doc");

            $data = array(
                'spm_data' => $this->Spm_model->get_all(),
                'start' => 0
            );
            
            $this->load->view('spm/doc',$data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function ambil_data_spmkasubid()
    {
        if(!empty($_GET["Tipe"])) {
            $Tipe = $_GET["Tipe"];
            $data["Tipe"] = $_GET["Tipe"];
        }
        
        $this->session->set_userdata($data);
        $Tipe = $this->session->userdata('Tipe');

        if(!empty($Tipe)) {
            /*
            $q = $this->db->query("SELECT a.IdAnggaran, a.Periode, a.Month, a.KodeAkun, b.NamaAkun, SUM(Anggaran) AS Anggaran,
                                    SUM(IF(c.Month=a.Month And c.Periode=a.Periode AND Week=1, Realisasi, 0)) AS Week1,
                                    SUM(IF(c.Month=a.Month And c.Periode=a.Periode AND Week=2, Realisasi, 0)) AS Week2,
                                    SUM(IF(c.Month=a.Month And c.Periode=a.Periode AND Week=3, Realisasi, 0)) AS Week3,
                                    SUM(IF(c.Month=a.Month And c.Periode=a.Periode AND Week=4, Realisasi, 0)) AS Week4
                                    FROM Anggaran a
                                    LEFT JOIN akun b on a.KodeAkun=b.KodeAkun
                                    LEFT JOIN realisasi c ON a.KodeAkun=c.KodeAkun AND a.Periode=c.Periode AND a.Month=c.Month
                                    WHERE a.Periode='".$Periode."' AND a.Month=".$Month."
                                    GROUP BY a.KodeAkun, a.Periode"); */
            $q = $this->db->query("SELECT a.*, b.*, c.*
                                    FROM spm a 
                                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                                    where StatusVerifikasi=1 and StatusAppKasubid IS NULL and a.Tipe='".$Tipe."'
                                    order by a.TanggalVerifikasi, a.NoSpm");
        }

        echo "<script src=".base_url()."AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js></script>
                <link rel='stylesheet' href=".base_url()."AdminLTE3/plugins/datatables/dataTables.bootstrap.css>";
        echo "<div class='table table-responsive'>
                <table class='table table-bordered table-striped table-condensed' id='mytable' style='border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;'>
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>No SPM</th>
                            <th>Tanggal<br>SPM</th>
                            <th>Tanggal<br>Verifikasi</th>
                            <th>Organisasi</th>
                            <th>Verifikator</th>
                            <th>Keterangan<br>Pengajuan</th>
                            <th style='text-align:center'>File</th>
                            <th style='text-align:center'>Tipe</th>
                            <th style='text-align:center'>Status<br>Verifikasi</th>
                            <th style='text-align:center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
        $start=0;
        foreach($q->result_array() as $spm)
        {
            ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <!--<td><?php echo $spm->Jenis ?></td>-->
                <td><?php echo $spm['NoSpm'] ?></td>
                <td><?php echo $spm['Tanggal'] ?></td>
                <td><?php echo $spm['TanggalVerifikasi'] ?></td>
                <td><?php echo $spm['NamaOrganisasi'] ?></td>
                <td><?php echo $spm['NamaPegawai'] ?></td>
                <td><?php echo $spm['Keterangan'] ?></td>
                <?php
                    $tahun=$this->access->get_tahun();
                    $filepath = 'filepdf';
                    switch($tahun){
                         
                        case 2020 :
                            $filepath = 'filepdf';
                            break;
                        case 2021 :
                            $filepath = 'filepdf2021';
                            break;
                        case 2022 :
                            $filepath = 'filepdf2022';
                            break;
                        default :
                            $filepath = 'filepdf';
                            break;
                    }
                ?>
                <td style="text-align:center"><?php echo anchor(site_url('upload/'.$filepath.'/'.$spm['FileUp']),'<i class="fa fa-file-pdf-o"></i>',array('title'=>'File Upload','class'=>'btn btn-warning btn-xs','target'=>'_blank')); ?></td>
                <td><?php echo $spm['Tipe'] ?></td>
                <td style="text-align:center">
                    <?php if($spm['StatusVerifikasi'] == 1) { ?>
                        <small class="label label-success"><i class="fa fa-check-circle"></i> Diterima</small>
                    <?php } else if($spm['StatusVerifikasi'] == 2) { ?>
                        <small class="label label-danger"><i class="fa fa-ban"></i> Ditolak</small>
                    <?php } else { ?>
                        <small class="label label-default"><i class="fa fa-clock-o"></i> Pending</small>
                    <?php } ?>
                </td>
                <td style="text-align:center" width="80px">
                    <?php 
                    echo '  ';
                    echo anchor(site_url('spm/cekapprovalkasubid/'.$spm['IdSpm']),'<i class="fa fa-check"></i> Cek',array('title'=>'cek','class'=>'btn btn-primary btn-xs')); 
                    ?>
                </td>
            </tr>
            <?php
        }   

        echo "</tbody>
            </table>
            </div>";

        echo "<script src='".base_url()."AdminLTE3/plugins/datatables/jquery.dataTables.min.js'></script>
            <script src='".base_url()."AdminLTE3/plugins/datatables/dataTables.bootstrap.min.js'></script>";

        echo "<script type='text/javascript'>
                $(document).ready(function () {
                    $('#mytable').DataTable({
                        'lengthMenu': [ [25, 50, 100, 500, -1], [25, 50, 100, 500, 'All'] ]
                    });
                });
            </script>";
    }

    public function ambil_data_spmarsip()
    {
        if(!empty($_GET["IdOrganisasi"])) {
            $IdOrganisasi = $_GET["IdOrganisasi"];
            $data["IdOrganisasi"] = $_GET["IdOrganisasi"];
        }
        
        $this->session->set_userdata($data);
        $IdOrganisasi = $this->session->userdata('IdOrganisasi');

        if(!empty($IdOrganisasi)) {            
            $q = $this->db->query("SELECT a.*, b.*, c.*
                                    FROM spm a 
                                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                                    where a.IdOrganisasi=".$IdOrganisasi." and (StatusVerifikasi=1 and StatusAppKasubid=1 and StatusAppKabid=1)
                                    order by a.TanggalUp, a.NoSpm");
        }

        echo "<script src=".base_url()."AdminLTE3/plugins/jQuery/jQuery-2.1.4.min.js></script>
                <link rel='stylesheet' href=".base_url()."AdminLTE3/plugins/datatables/dataTables.bootstrap.css>";
        echo "<div class='table table-responsive'>
                <table class='table table-bordered table-striped table-condensed' id='mytable' style='border-top:1px solid #ddd; border-left:1px solid #ddd; border-right:1px solid #ddd; border-bottom:1px solid #ddd;'>
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>No SPM</th>
                            <th>Tanggal SPM</th>
                            <th>Organisasi</th>
                            <th>Verifikator</th>
                            <th>File</th>
                            <th>Nomor SP2D</th>
                            <th>Tanggal SP2D</th>
                        </tr>
                    </thead>
                    <tbody>";
        $start=0;
        foreach($q->result_array() as $spm)
        {
            ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $spm['NoSpm'] ?></td>
                <td><?php echo $spm['Tanggal'] ?></td>
                <td><?php echo $spm['NamaOrganisasi'] ?></td>
                <td><?php echo $spm['NamaPegawai'] ?></td>
                <?php
                    $tahun=$this->access->get_tahun();
                    $filepath = 'filepdf';
                    switch($tahun){
                         
                        case 2020 :
                            $filepath = 'filepdf';
                            break;
                        case 2021 :
                            $filepath = 'filepdf2021';
                            break;
                        case 2022 :
                            $filepath = 'filepdf2022';
                            break;
                        default :
                            $filepath = 'filepdf';
                            break;
                    }
                ?>
                <td style="text-align:center"><?php echo anchor(site_url('upload/'.$filepath.'/'.$spm['FileUp']),'<i class="fa fa-file-pdf-o"></i>',array('title'=>'File Upload','class'=>'btn btn-warning btn-xs','target'=>'_blank')); ?></td>
                <td><?php echo $spm['NoSp2d'] ?></td>
                <td><?php echo $spm['TanggalSp2d'] ?></td>                
            </tr>
            <?php
        }   

        echo "</tbody>
            </table>
            </div>";

        echo "<script src='".base_url()."AdminLTE3/plugins/datatables/jquery.dataTables.min.js'></script>
            <script src='".base_url()."AdminLTE3/plugins/datatables/dataTables.bootstrap.min.js'></script>";

        echo "<script type='text/javascript'>
                $(document).ready(function () {
                    $('#mytable').DataTable({
                        'lengthMenu': [ [25, 50, 100, 500, -1], [25, 50, 100, 500, 'All'] ]
                    });
                });
            </script>";
    }

}

/* End of file Spm.php */
/* Location: ./application/controllers/Spm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */