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
    $data['kamar'] = $this->Kamar_model->get_all();
    $data['content_view'] = 'kamar/index';
    $this->load->view('layouts/main', $data);
  }

  public function tambah() {
    if ($_POST) {
      // Format harga (hapus titik pemisah ribuan)
      $_POST['harga'] = str_replace('.', '', $this->input->post('harga'));

      // Upload banyak gambar
      $gambar_list = $this->_do_multiple_upload();

      // Simpan array nama file sebagai JSON
      $_POST['gambar'] = json_encode($gambar_list);

      // Simpan ke database
      $this->Kamar_model->insert($this->input->post());

      redirect('kamar');
    }

    $data['content_view'] = 'kamar/form';
    $this->load->view('layouts/main', $data);
  }

  public function edit($id) {
    $kamar = $this->Kamar_model->get($id);

    if ($_POST) {
      $_POST['harga'] = str_replace('.', '', $this->input->post('harga'));

      // Jika user mengupload gambar baru
      $gambar_baru = $this->_do_multiple_upload();
      if (!empty($gambar_baru)) {
        // Hapus gambar lama dari server
        if (!empty($kamar->gambar)) {
          $gambar_lama = json_decode($kamar->gambar, true);
          foreach ($gambar_lama as $g) {
            if (file_exists('./uploads/kamar/' . $g)) {
              unlink('./uploads/kamar/' . $g);
            }
          }
        }
        $_POST['gambar'] = json_encode($gambar_baru);
      } else {
        // Jika tidak upload baru, pakai yang lama
        $_POST['gambar'] = $kamar->gambar;
      }

      $this->Kamar_model->update($id, $this->input->post());
      redirect('kamar');
    }

    $data['kamar'] = $kamar;
    $data['content_view'] = 'kamar/form';
    $this->load->view('layouts/main', $data);
  }

  public function hapus($id) {
    $kamar = $this->Kamar_model->get($id);
    if (!empty($kamar->gambar)) {
      $gambar = json_decode($kamar->gambar, true);
      foreach ($gambar as $g) {
        if (file_exists('./uploads/kamar/' . $g)) {
          unlink('./uploads/kamar/' . $g);
        }
      }
    }
    $this->Kamar_model->delete($id);
    redirect('kamar');
  }

  // Upload banyak file gambar
  private function _do_multiple_upload() {
    $files = $_FILES['gambar'];
    $file_count = count($files['name']);
    $uploaded_files = [];

    for ($i = 0; $i < $file_count; $i++) {
      if (!empty($files['name'][$i])) {
        $_FILES['file']['name']     = $files['name'][$i];
        $_FILES['file']['type']     = $files['type'][$i];
        $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['file']['error']    = $files['error'][$i];
        $_FILES['file']['size']     = $files['size'][$i];

        $config['upload_path']   = './uploads/kamar/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
          $upload_data = $this->upload->data();
          $uploaded_files[] = $upload_data['file_name'];
        }
      }
    }

    return $uploaded_files;
  }
}
