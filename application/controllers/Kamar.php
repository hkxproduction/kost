<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Kamar_model');
    $this->load->helper(['url', 'form']);
  }

  public function index() {
    $data['kamar'] = $this->Kamar_model->get_all();
    $this->load->view('kamar/index', $data);
  }

  public function tambah() {
    if ($_POST) {
      $this->Kamar_model->insert($this->input->post());
      redirect('kamar');
    }
    $this->load->view('kamar/tambah');
  }

  public function edit($id) {
    if ($_POST) {
      $this->Kamar_model->update($id, $this->input->post());
      redirect('kamar');
    }
    $data['kamar'] = $this->Kamar_model->get($id);
    $this->load->view('kamar/form', $data);
  }

  public function hapus($id) {
    $this->Kamar_model->delete($id);
    redirect('kamar');
  }
}
