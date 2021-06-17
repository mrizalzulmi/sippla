<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{

    public $table = 'pegawai';
    public $id = 'IdPegawai';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all query
    function get_all_query()
    {
        $sql = "select a.*, b.KodeOrganisasi, b.NamaOrganisasi
                from pegawai a 
                left join organisasi b on a.IdOrganisasi=b.IdOrganisasi";
        
        return $this->db->query($sql)->result();
    }

    // get data by id
    /*
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    } */

    function get_by_id($id)
    {
        $sql = "select a.*, b.username, b.password
                from pegawai a 
                left join user b on a.IdPegawai=b.IdPegawai
                where a.IdPegawai=".$id;
        
        return $this->db->query($sql)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('IdPegawai', $q);
    	$this->db->or_like('Nip', $q);
    	$this->db->or_like('NamaPegawai', $q);
    	$this->db->or_like('TempatLahir', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('IdPegawai', $q);
    	$this->db->or_like('Nip', $q);
    	$this->db->or_like('NamaPegawai', $q);
    	$this->db->or_like('TempatLahir', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function getMaxIdPegawai()
    {
        $q = $this->db->query("select MAX(IdPegawai) as id_max from pegawai");
        $id = 0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $id = ((int)$k->id_max);
            }
        }
        else
        {
            $id = 1;
        }   
        return $id;
    }

    public function getPassword($id)
    {
        $q = $this->db->query("select password from user where IdPegawai=".$id);
        $password = 0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $password = $k->password;
            }
        }
        else
        {
            $password = '';
        }   
        return $password;
    }

    // update user
    function update_user($id, $data)
    {
        $this->db->query("UPDATE user 
                          SET nama='$data[nama]', username='$data[username]', password='$data[password]'  
                          WHERE IdPegawai=$id");
    }

    // delete user
    function delete_user($id)
    {
        $this->db->query("delete from user where IdPegawai=$id");
    }

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */