<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model(['Pembayaran_model', 'Penghuni_model']);
    $this->load->helper(['url', 'form']);
  }

  public function index() {
    $data['pembayaran'] = $this->Pembayaran_model->get_all();
    $data['content_view'] = 'pembayaran/index';
    $this->load->view('layouts/main', $data);
  }

  public function tambah() {
    if ($_POST) {
      $this->Pembayaran_model->insert($this->input->post());
      redirect('pembayaran');
    }
    $data['penghuni'] = $this->Penghuni_model->get_all();
    $data['content_view'] = 'pembayaran/form';
    $this->load->view('layouts/main', $data);
  }

  public function edit($id) {
    if ($_POST) {
      $this->Pembayaran_model->update($id, $this->input->post());
      redirect('pembayaran');
    }
    $data['penghuni'] = $this->Penghuni_model->get_all();
    $data['pembayaran'] = $this->Pembayaran_model->get($id);
    $data['content_view'] = 'pembayaran/form';
    $this->load->view('layouts/main', $data);
  }

  public function hapus($id) {
    $this->Pembayaran_model->delete($id);
    redirect('pembayaran');
  }
}
