<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Karyawan_model");
    }

    public function index() {
        $data["title"] = "Tampil Data Karyawan";
        $data["karyawan"] = $this->Karyawan_model->getAllKaryawan();
        $this->load->view("templates/header", $data);
        $this->load->view("karyawan/index", $data);
        $this->load->view("templates/footer");
    }
    
    public function input() {
        $data["title"] = "Input Data Karyawan";
        $data["jabatan"] = ["Manager", "Direktur", "Staff"];
        $data["status"] = ["Menikah", "Belum Menikah"];
        $this->form_validation->set_rules("nama", "Nama", "required");
        
        if ($this->form_validation->run() == false){
            $this->load->view("templates/header", $data);
            $this->load->view("karyawan/input", $data);
            $this->load->view("templates/footer");
        } else {
            $nama = $this->input->post("nama", true);
            $status = $this->input->post("status");
            $jabatan = $this->input->post("jabatan");  
            
            if ($status == "Menikah" && $jabatan == "Manager"){
                $gajipokok = 10000000;
            } elseif ($status == "Belum Menikah" && $jabatan == "Manager") {
                $gajipokok = 7500000;
            } elseif ($status == "Menikah" && $jabatan == "Direktur"){
                $gajipokok = 12000000;
            } elseif ($status == "Belum Menikah" && $jabatan == "Direktur") {
                $gajipokok = 11000000;
            } elseif ($status == "Menikah" && $jabatan == "Staff"){
                $gajipokok = 5000000;
            } elseif ($status == "Belum Menikah" && $jabatan == "Staff") {
                $gajipokok = 4000000;
            }

            $tunjangan = 0.4 * $gajipokok;
            $total = $gajipokok + $tunjangan;
            
            // $config["max_size"] = "2048";
            // $config["allowed_types"] = "gif|jpg|png|jpeg";
            // $config["upload_path"] = "./assets/img/";

            // $this->load->library("upload", $config);
            // $this->upload->do_upload("foto");
            // $foto = $this->upload->data("file_name");

            $config["max_size"] = 2048;
            $config["allowed_types"] = "png|jpg|jpeg|gif";
            $config["remove_spaces"] = true;
            $config["overwrite"] = true;
            $config["upload_path"] = FCPATH."assets/img";
            
            $this->load->library("upload");
            $this->upload->initialize($config);
            
            $this->upload->do_upload("foto");
            $data_image = $this->upload->data("file_name");
            $location = "assets/img/";
            $foto = $location.$data_image;

            $data = [
                "nama" => $nama,
                "status" => $status,
                "jabatan" => $jabatan,
                "gajipokok" => $gajipokok,
                "tunjangan" => $tunjangan,
                "total" => $total,
                "foto" => $foto,
            ];
        
            $this->Karyawan_model->tambahDataKaryawan("tabel_12211094", $data);
            $this->session->set_flashdata("karyawan", "Ditambahkan");
            redirect("karyawan");
        }
    }

    public function edit($id) {
        $data["title"] = "Edit Data Karyawan";
        $data["karyawan"] = $this->Karyawan_model->getKaryawanById($id);
        $data["jabatan"] = ["Manager", "Direktur", "Staff"];
        $data["status"] = ["Menikah", "Belum Menikah"];
        $this->form_validation->set_rules("nama", "Nama", "required");
        if ($this->form_validation->run() == false){
            $this->load->view("templates/header", $data);
            $this->load->view("karyawan/edit", $data);
            $this->load->view("templates/footer");
        } else {
            $id = $this->input->post("id");
            $nama = $this->input->post("nama", true);
            $status = $this->input->post("status");
            $jabatan = $this->input->post("jabatan");  
            
            if ($status == "Menikah" && $jabatan == "Manager"){
                $gajipokok = 10000000;
            } elseif ($status == "Belum Menikah" && $jabatan == "Manager") {
                $gajipokok = 7500000;
            } elseif ($status == "Menikah" && $jabatan == "Direktur"){
                $gajipokok = 12000000;
            } elseif ($status == "Belum Menikah" && $jabatan == "Direktur") {
                $gajipokok = 11000000;
            } elseif ($status == "Menikah" && $jabatan == "Staff"){
                $gajipokok = 5000000;
            } elseif ($status == "Belum Menikah" && $jabatan == "Staff") {
                $gajipokok = 4000000;
            }

            $tunjangan = 0.4 * $gajipokok;
            $total = $gajipokok + $tunjangan;

            // $config["max_size"] = "2048";
            // $config["allowed_types"] = "gif|jpg|png|jpeg";
            // $config["upload_path"] = "./assets/img/";

            // $this->load->library("upload", $config);
            // $this->upload->do_upload("foto");
            // $foto = $this->upload->data("file_name");

            $config["max_size"] = 2048;
            $config["allowed_types"] = "png|jpg|jpeg|gif";
            $config["remove_spaces"] = true;
            $config["overwrite"] = true;
            $config["upload_path"] = FCPATH."assets/img";
            
            $this->load->library("upload");
            $this->upload->initialize($config);
            
            $this->upload->do_upload("foto");
            $data_image = $this->upload->data("file_name");
            $location = "assets/img/";
            $foto = $location.$data_image;

            $data = [
                "nama" => $nama,
                "status" => $status,
                "jabatan" => $jabatan,
                "gajipokok" => $gajipokok,
                "tunjangan" => $tunjangan,
                "total" => $total,
                "foto" => $foto,
            ];
        
            $this->Karyawan_model->ubahDataKaryawan($id, $data);
            $this->session->set_flashdata("karyawan", "Di Update");
            redirect("karyawan");
        }
    }

    public function hapus($id){
        $this->Karyawan_model->hapusDataKaryawan($id);
        $this->session->set_flashdata("karyawan", "Dihapus");
        redirect("karyawan");
    }
}