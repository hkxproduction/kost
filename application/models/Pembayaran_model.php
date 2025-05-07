<?php
class Pembayaran_model extends CI_Model {
  public function get_all() {
    $this->db->select('pembayaran.*, penghuni.nama as nama_penghuni');
    $this->db->join('penghuni', 'penghuni.id = pembayaran.penghuni_id', 'left');
    return $this->db->get('pembayaran')->result();
  }

  public function get($id) {
    return $this->db->get_where('pembayaran', ['id' => $id])->row();
  }

  public function insert($data) {
    return $this->db->insert('pembayaran', $data);
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update('pembayaran', $data);
  }

  public function delete($id) {
    return $this->db->delete('pembayaran', ['id' => $id]);
  }
}
