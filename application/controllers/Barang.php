<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model Barang_model
        $this->load->model('Barang_model');
        // Memuat helper URL
        $this->load->helper('url');
    }

    public function index() {
        // Menggunakan model untuk mendapatkan data barang
        $data['barang'] = $this->Barang_model->get_barang();
        // Memuat view dengan data barang
        $this->load->view('barang/list_barang', $data);
    }

    public function search_barang() {
        // Mendapatkan keyword dari input post
        $keyword = $this->input->post('keyword');
        // Menggunakan model untuk mencari data barang berdasarkan keyword
        $data['barang'] = $this->Barang_model->search_data_barang($keyword);
        // Memuat view dengan data barang yang ditemukan
        $this->load->view('barang/list_barang', $data);
    }
}