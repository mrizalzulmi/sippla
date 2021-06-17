<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organisasi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organisasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $organisasi = $this->Organisasi_model->get_all();

            $data = array(
                'organisasi_data' => $organisasi
            );

            //$data['teknisi_sess'] = $this->access->get_teknisi();
            $data['level_sess'] = $this->access->get_level();

            $this->template->load('template','organisasi/list', $data);
        } else {
            header('location:'.base_url().'');
        }
    }

    public function read($id) 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $row = $this->Organisasi_model->get_by_id($id);
            if ($row) {
                $data = array(
                    'disable' => 'disabled',
                    'button' => '',
                    'action' => '',
            		'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
                    'KodeOrganisasi' => set_value('KodeOrganisasi', $row->KodeOrganisasi),
                    'NamaOrganisasi' => set_value('NamaOrganisasi', $row->NamaOrganisasi),
    	        );
                $this->template->load('template','organisasi/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('organisasi'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }

    public function create() 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $data = array(
                'disable' => '',
                'button' => 'Create',
                'action' => site_url('organisasi/create_action'),
        	    'IdOrganisasi' => set_value('IdOrganisasi'),
        	    'KodeOrganisasi' => set_value('KodeOrganisasi'),
        	    'NamaOrganisasi' => set_value('NamaOrganisasi'),
    	    );

            $this->template->load('template','organisasi/form', $data);
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function create_action() 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
            		'KodeOrganisasi' => $this->input->post('KodeOrganisasi',TRUE),
            		'NamaOrganisasi' => $this->input->post('NamaOrganisasi',TRUE),
    	    );

                $this->Organisasi_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('organisasi'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function update($id) 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $row = $this->Organisasi_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'disable' => '',
                    'button' => 'Update',
                    'action' => site_url('organisasi/update_action'),
            		'IdOrganisasi' => set_value('IdOrganisasi', $row->IdOrganisasi),
            		'KodeOrganisasi' => set_value('KodeOrganisasi', $row->KodeOrganisasi),
            		'NamaOrganisasi' => set_value('NamaOrganisasi', $row->NamaOrganisasi),
    	        );
                $this->template->load('template','organisasi/form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('organisasi'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function update_action() 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('IdOrganisasi', TRUE));
            } else {
                $data = array(
        		'KodeOrganisasi' => $this->input->post('KodeOrganisasi',TRUE),
        		'NamaOrganisasi' => $this->input->post('NamaOrganisasi',TRUE),
    	    );

                $this->Organisasi_model->update($this->input->post('IdOrganisasi', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('organisasi'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }
    
    public function delete($id) 
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $row = $this->Organisasi_model->get_by_id($id);

            if ($row) {
                $this->Organisasi_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('organisasi'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('organisasi'));
            }
        } else {
            header('location:'.base_url().'');
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('KodeOrganisasi', 'Kode Organisasi', 'trim|required');
    	$this->form_validation->set_rules('NamaOrganisasi', 'Nama Organisasi', 'trim|required');

    	$this->form_validation->set_rules('IdOrganisasi', 'IdOrganisasi', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        if($this->session->userdata('logged_in')!="" && ($this->session->userdata('level')=="admin" or $this->session->userdata('level')=="pegawai")) {
            $this->load->helper('exportexcel');
            $namaFile = "organisasi.xls";
            $judul = "organisasi";
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
        	xlsWriteLabel($tablehead, $kolomhead++, "Kode Organisasi");
        	xlsWriteLabel($tablehead, $kolomhead++, "Nama Organisasi");

    	   foreach ($this->Organisasi_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
        	    xlsWriteLabel($tablebody, $kolombody++, $data->KodeOrganisasi);
        	    xlsWriteLabel($tablebody, $kolombody++, $data->NamaOrganisasi);

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
            header("Content-Disposition: attachment;Filename=organisasi.doc");

            $data = array(
                'organisasi_data' => $this->Organisasi_model->get_all(),
                'start' => 0
            );
            
            $this->load->view('organisasi/doc',$data);
        } else {
            header('location:'.base_url().'');
        }
    }

}

/* End of file Organisasi.php */
/* Location: ./application/controllers/Organisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */