<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $data['items'] = $this->session->userdata('items');
        $data['total'] = $this->hitung_total(); // Menghitung total di sini

        // Memeriksa apakah $items sudah terdefinisi atau tidak
        if (!empty($data['items'])) {
            $data['items'] = $this->session->userdata('items');
        } else {
            $data['items'] = array(); // Inisialisasi $items jika null
        }

        $this->load->view('kasir', $data);
    }

    public function tambah_item() {
        $item = array(
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah') // Menambah input jumlah
        );

        $items = $this->session->userdata('items');
        if (!$items) {
            $items = array();
        }
        $items[] = $item;
        $this->session->set_userdata('items', $items);

        redirect('kasir');
    }

    public function hapus_item($index) {
        $items = $this->session->userdata('items');
        unset($items[$index]);
        $this->session->set_userdata('items', array_values($items));

        redirect('kasir');
    }

    public function hitung_total() {
        $items = $this->session->userdata('items');
        $total = 0;
        if (!empty($items)) {
            foreach ($items as $item) {
                $total += $item['harga'] * $item['jumlah']; // Perhitungan total dengan mempertimbangkan jumlah barang
            }
        }
        return $total;
    }

    public function hapus_semua_item() {
        $this->session->unset_userdata('items');
        redirect('kasir');
    }
}
