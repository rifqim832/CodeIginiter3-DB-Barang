<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function get_barang() {
        // Mengambil semua data dari tabel barang
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    // Method untuk mengambil data barang sesuai pencarian
    public function search_data_barang($keyword) {
        // Mencari data barang berdasarkan keyword di kolom nama_barang
        $this->db->like('nama_barang', $keyword);
        $query = $this->db->get('barang');
        return $query->result_array();
    }
}