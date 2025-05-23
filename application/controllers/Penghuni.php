<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model(['Penghuni_model', 'Kamar_model']);
    $this->load->helper(['url', 'form']);
  }

  public function index() {
    $data['penghuni'] = $this->Penghuni_model->get_all();
    $data['content_view'] = 'penghuni/index';
    $this->load->view('layouts/main', $data);
  }

  public function tambah() {
    if ($_POST) {
      $post = $this->input->post();
      $this->Penghuni_model->insert($post);
      $this->Kamar_model->update($post['kamar_id'], ['status' => 'terisi']);
      redirect('penghuni');
    }
    $data['kamar'] = $this->Kamar_model->get_all();
    $data['content_view'] = 'penghuni/form';
    $this->load->view('layouts/main', $data);
  }

  public function edit($id) {
    if ($_POST) {
      $post = $this->input->post();
      $this->Penghuni_model->update($id, $this->input->post());
      if ($post['status'] == 'keluar') {
        $this->Kamar_model->update($post['kamar_id'], ['status' => 'kosong']);
      }
      redirect('penghuni');
    }
    $data['kamar'] = $this->Kamar_model->get_all();
    $data['penghuni'] = $this->Penghuni_model->get($id);
    $data['content_view'] = 'penghuni/form';
    $this->load->view('layouts/main', $data);
  }

  public function hapus($id) {
    $penghuni = $this->Penghuni_model->get($id);

    if ($penghuni) {
      // Ubah status kamar jadi 'kosong'
      $this->Kamar_model->update($penghuni->kamar_id, ['status' => 'kosong']);
      
      // Hapus data penghuni
      $this->Penghuni_model->delete($id);
    }
    redirect('penghuni');
  }
}
