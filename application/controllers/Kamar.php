<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Kamar_model');
    $this->load->helper(['url', 'form']);
    $this->load->library('upload');
  }

  public function index() {
    // Mendapatkan data kamar
    $data['kamar'] = $this->Kamar_model->get_all();
    
    // Menetapkan view konten untuk digunakan dalam layout utama
    $data['content_view'] = 'kamar/index';
    
    // Memuat layout utama dengan konten yang sesuai
    $this->load->view('layouts/main', $data);
  }

  public function tambah() {
    if ($_POST) {
      // Proses upload gambar
      // $upload_data = $this->_do_upload();
      // if ($upload_data) {
      //   $_POST['gambar'] = $upload_data['file_name'];
      // }
      
      // Insert data kamar ke database
      $this->Kamar_model->insert($this->input->post());
      
      // Redirect ke halaman kamar
      redirect('kamar');
    }

    // Menetapkan view konten untuk digunakan dalam layout utama
    $data['content_view'] = 'kamar/form';
    
    // Memuat layout utama dengan konten yang sesuai
    $this->load->view('layouts/main', $data);
  }

  public function edit($id) {
    if ($_POST) {
      // Mendapatkan data kamar untuk update
      $kamar = $this->Kamar_model->get($id);
      
      // Proses upload gambar baru
      $upload_data = $this->_do_upload();
      if ($upload_data) {
        // Hapus gambar lama jika ada
        if ($kamar->gambar && file_exists('./uploads/' . $kamar->gambar)) {
          unlink('./uploads/' . $kamar->gambar);
        }
        
        $_POST['gambar'] = $upload_data['file_name'];
      }

      // Update data kamar di database
      $this->Kamar_model->update($id, $this->input->post());
      
      // Redirect ke halaman kamar
      redirect('kamar');
    }

    // Mendapatkan data kamar yang akan diedit
    $data['kamar'] = $this->Kamar_model->get($id);
    
    // Menetapkan view konten untuk digunakan dalam layout utama
    $data['content_view'] = 'kamar/form';
    
    // Memuat layout utama dengan konten yang sesuai
    $this->load->view('layouts/main', $data);
  }

  public function hapus($id) {
    // Mendapatkan data kamar yang akan dihapus
    $kamar = $this->Kamar_model->get($id);
    
    // Hapus gambar lama jika ada
    if ($kamar->gambar && file_exists('./uploads/' . $kamar->gambar)) {
      unlink('./uploads/' . $kamar->gambar);
    }

    // Hapus data kamar dari database
    $this->Kamar_model->delete($id);
    
    // Redirect ke halaman kamar
    redirect('kamar');
  }

  // Fungsi untuk meng-handle upload gambar
  private function _do_upload() {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size'] = 2048; // Maksimal ukuran file 2MB
    $config['encrypt_name'] = TRUE; // Nama file dienkripsi untuk menghindari duplikasi

    // Inisialisasi konfigurasi upload
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('gambar')) {
      // Jika upload gagal, kembalikan null
      return null;
    }
    
    // Kembalikan data file yang di-upload
    return $this->upload->data();
  }
}
	