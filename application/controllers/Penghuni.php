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
      $this->Penghuni_model->insert($this->input->post());
      redirect('penghuni');
    }
    $data['kamar'] = $this->Kamar_model->get_all();
    $data['content_view'] = 'penghuni/form';
    $this->load->view('layouts/main', $data);
  }

  public function edit($id) {
    if ($_POST) {
      $this->Penghuni_model->update($id, $this->input->post());
      redirect('penghuni');
    }
    $data['kamar'] = $this->Kamar_model->get_all();
    $data['penghuni'] = $this->Penghuni_model->get($id);
    $data['content_view'] = 'penghuni/form';
    $this->load->view('layouts/main', $data);
  }

  public function hapus($id) {
    $this->Penghuni_model->delete($id);
    redirect('penghuni');
  }
}
