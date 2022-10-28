<?php

class Karyawan_model extends CI_Model{

    public function getAllKaryawan(){
        return $this->db->get("tabel_12211094")->result_array();
    }

    public function tambahDataKaryawan($table, $data){
        $this->db->insert($table, $data);
    }
    
    public function hapusDataKaryawan($id){
        $this->db->delete("tabel_12211094", ["id" => $id]);
    }

    public function getKaryawanById($id){
        return $this->db->get_where("tabel_12211094", ["id" => $id])->row_array();
    }

    public function ubahDataKaryawan($id, $data){
        $this->db->where("id", $id);
        $this->db->update("tabel_12211094", $data);
    }
}