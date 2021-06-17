<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spm_model extends CI_Model
{

    public $table = 'spm';
    public $id = 'IdSpm';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('IdSpm', 'ASC');
        return $this->db->get($this->table)->result();
    }

    // get all query
    function get_all_query()
    {
        $organisasi = $this->access->get_organisasi();
        if(!empty($organisasi)) {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdOrganisasi=".$organisasi." and (StatusPenomoran<>1 or StatusPenomoran IS NULL) and StatusView is NULL
                    order by a.Tanggal, a.NoSpm";
        } else {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where (StatusPenomoran<>1 or StatusPenomoran IS NULL) and StatusView is NULL
                    order by a.Tanggal, a.NoSpm";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_verifikasi_query()
    {
        $pegawai = $this->access->get_pegawai();
        if(!empty($pegawai)) {
            $sql = "SELECT a.*, b.*, c.*,
                    d.StatusVerifikasi as StatusVerifikasit, d.AlasanTolakVer as AlasanTolakVert,
                    d.StatusAppKasubid as StatusAppKasubidt, d.AlasanTolakKasubid as AlasanTolakKasubidt,
                    d.StatusAppKabid as StatusAppKabidt, d.AlasanTolakKabid as AlasanTolakKabidt
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    left join spm d on a.idspmold=d.IdSpm
                    where (a.StatusVerifikasi IS NULL) and a.IdVerifikator=".$pegawai."
                    order by a.TanggalUp, a.NoSpm";
        } else {
            $sql = "SELECT a.*, b.*, c.*,
                    d.StatusVerifikasi as StatusVerifikasit, d.AlasanTolakVer as AlasanTolakVert,
                    d.StatusAppKasubid as StatusAppKasubidt, d.AlasanTolakKasubid as AlasanTolakKasubidt,
                    d.StatusAppKabid as StatusAppKabidt, d.AlasanTolakKabid as AlasanTolakKabidt
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    left join spm d on a.idspmold=d.IdSpm
                    where (a.StatusVerifikasi IS NULL)
                    order by a.TanggalUp, a.NoSpm";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_kasubid_query()
    {
        $pegawai = $this->access->get_pegawai();
        if(!empty($pegawai)) {
            // Hanya di view per kasubid
            /*
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdKasubid=".$pegawai." and StatusVerifikasi=1
                    order by a.TanggalUp, a.NoSpm";*/

            // Kasubid bisa view semua
            $sql = "SELECT a.*, b.*, c.*,
                    d.StatusVerifikasi as StatusVerifikasit, d.AlasanTolakVer as AlasanTolakVert,
                    d.StatusAppKasubid as StatusAppKasubidt, d.AlasanTolakKasubid as AlasanTolakKasubidt,
                    d.StatusAppKabid as StatusAppKabidt, d.AlasanTolakKabid as AlasanTolakKabidt
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    left join spm d on a.idspmold=d.IdSpm
                    where a.StatusVerifikasi=1 and a.StatusAppKasubid IS NULL
                    order by a.TanggalVerifikasi, a.NoSpm";
        } else {
            $sql = "SELECT a.*, b.*, c.*,
                    d.StatusVerifikasi as StatusVerifikasit, d.AlasanTolakVer as AlasanTolakVert,
                    d.StatusAppKasubid as StatusAppKasubidt, d.AlasanTolakKasubid as AlasanTolakKasubidt,
                    d.StatusAppKabid as StatusAppKabidt, d.AlasanTolakKabid as AlasanTolakKabidt
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    left join spm d on a.idspmold=d.IdSpm
                    where a.StatusVerifikasi=1 and a.StatusAppKasubid IS NULL
                    order by a.TanggalVerifikasi, a.NoSpm";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_kabid_query()
    {
        $pegawai = $this->access->get_pegawai();
        if(!empty($pegawai)) {
            // Hanya di view per kabid
            /*
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdKabid=".$pegawai." and (StatusVerifikasi=1 and StatusAppKasubid=1)
                    order by a.TanggalUp, a.NoSpm"; */

            // Kasubid bisa view semua
            $sql = "SELECT a.*, b.*, c.*,
                    d.StatusVerifikasi as StatusVerifikasit, d.AlasanTolakVer as AlasanTolakVert,
                    d.StatusAppKasubid as StatusAppKasubidt, d.AlasanTolakKasubid as AlasanTolakKasubidt,
                    d.StatusAppKabid as StatusAppKabidt, d.AlasanTolakKabid as AlasanTolakKabidt
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    left join spm d on a.idspmold=d.IdSpm
                    where (a.StatusVerifikasi=1 and a.StatusAppKasubid=1 and a.StatusAppKabid IS NULL)
                    order by a.TanggalAppKasubid, a.NoSpm";
        } else {
            $sql = "SELECT a.*, b.*, c.*,
                    d.StatusVerifikasi as StatusVerifikasit, d.AlasanTolakVer as AlasanTolakVert,
                    d.StatusAppKasubid as StatusAppKasubidt, d.AlasanTolakKasubid as AlasanTolakKasubidt,
                    d.StatusAppKabid as StatusAppKabidt, d.AlasanTolakKabid as AlasanTolakKabidt
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    left join spm d on a.idspmold=d.IdSpm
                    where (a.StatusVerifikasi=1 and a.StatusAppKasubid=1 and a.StatusAppKabid IS NULL)
                    order by a.TanggalAppKasubid, a.NoSpm";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_penomoran_query()
    {
        $pegawai = $this->access->get_pegawai();
        $organisasi = $this->access->get_organisasi();
        /*
        if(!empty($pegawai)) {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdVerifikator=".$pegawai." and (StatusVerifikasi=1 and StatusAppKasubid=1 and StatusAppKabid=1 and StatusPenomoran IS NULL)
                    order by a.TanggalUp, a.NoSpm";
        } else { */
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where (StatusVerifikasi=1 and StatusAppKasubid=1 and StatusAppKabid=1 and StatusPenomoran IS NULL)
                    order by a.TanggalUp, a.NoSpm";
        //}
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_arsip_query()
    {
        $pegawai = $this->access->get_pegawai();
        $organisasi = $this->access->get_organisasi();
        $organisasi2 = $this->session->userdata('IdOrganisasi');
        if(!empty($organisasi)) {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdOrganisasi=".$organisasi." and (StatusVerifikasi=1 and StatusAppKasubid=1 and StatusAppKabid=1)
                    order by a.TanggalUp, a.NoSpm";
        } else if(!empty($organisasi2)) {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdOrganisasi=".$organisasi2." and (StatusVerifikasi=1 and StatusAppKasubid=1 and StatusAppKabid=1)
                    order by a.TanggalUp, a.NoSpm";
        } else {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdOrganisasi=0 and (StatusVerifikasi=1 and StatusAppKasubid=1 and StatusAppKabid=1)
                    order by a.TanggalUp, a.NoSpm";
        }
        return $this->db->query($sql)->result();
    }

    // get all query
    function get_tolak_query()
    {
        $pegawai = $this->access->get_pegawai();
        $organisasi = $this->access->get_organisasi();
        if(!empty($organisasi)) {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where a.IdOrganisasi=".$organisasi." and (StatusVerifikasi=2 or StatusAppKasubid=2 or StatusAppKabid=2)
                    order by a.TanggalUp, a.NoSpm";
        } else {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where (StatusVerifikasi=2 or StatusAppKasubid=2 or StatusAppKabid=2)
                    order by a.TanggalUp, a.NoSpm";
        }
        return $this->db->query($sql)->result();
    }

    //--------------------------
    // get cek verifikator ---
    function get_verifikasi_cek_query()
    {
        $pegawai = $this->access->get_pegawai();
        if(!empty($pegawai)) {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where (StatusVerifikasi=1 or StatusVerifikasi=2) and StatusPenomoran IS NULL and a.IdVerifikator=".$pegawai." and StatusView is NULL
                    order by a.TanggalUp, a.NoSpm";
        } else {
            $sql = "SELECT a.*, b.*, c.*
                    FROM spm a 
                    left join pegawai b on a.IdVerifikator=b.IdPegawai
                    left join organisasi c on a.IdOrganisasi=c.IdOrganisasi
                    where (StatusVerifikasi=1 or StatusVerifikasi=2) and StatusPenomoran IS NULL and StatusView is NULL
                    order by a.TanggalUp, a.NoSpm";
        }
        return $this->db->query($sql)->result();
    }



    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('IdSpm', $q);
    	$this->db->or_like('IdKegiatan', $q);
    	$this->db->or_like('Tipe', $q);
    	$this->db->or_like('IdProgram', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('IdSpm', $q);
    	$this->db->or_like('IdKegiatan', $q);
    	$this->db->or_like('Tipe', $q);
    	$this->db->or_like('IdProgram', $q);
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

    public function getIdAnggaranBelanja()
    {
        $q = $this->db->query("select MAX(IdSpm) as id_max from spm");
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

    public function getOrganisasi($IdOrganisasi)
    {
        $q = $this->db->query("select KodeOrganisasi, NamaOrganisasi from organisasi where IdOrganisasi=".$IdOrganisasi);
        $id = 0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $kode = $k->KodeOrganisasi;
                $nama = $k->NamaOrganisasi;
            }
        }
        else
        {
            $nama = '';
        }   
        return $nama;
    }

}

/* End of file Spm_model.php */
/* Location: ./application/models/Spm_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-22 04:24:22 */
/* http://harviacode.com */