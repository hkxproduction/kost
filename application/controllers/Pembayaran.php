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
    $this->load->view('pembayaran/index', $data);
  }

  public function tambah() {
    if ($_POST) {
      $this->Pembayaran_model->insert($this->input->post());
      redirect('pembayaran');
    }
    $data['penghuni'] = $this->Penghuni_model->get_all();
    $this->load->view('pembayaran/form', $data);
  }

  public function edit($id) {
    if ($_POST) {
      $this->Pembayaran_model->update($id, $this->input->post());
      redirect('pembayaran');
    }
    $data['penghuni'] = $this->Penghuni_model->get_all();
    $data['pembayaran'] = $this->Pembayaran_model->get($id);
    $this->load->view('pembayaran/form', $data);
  }

  public function hapus($id) {
    $this->Pembayaran_model->delete($id);
    redirect('pembayaran');
  }
}
