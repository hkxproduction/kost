<?php
class Penghuni_model extends CI_Model {
  public function get_all() {
    $this->db->select('penghuni.*, kamar.nomor_kamar');
    $this->db->join('kamar', 'kamar.id = penghuni.kamar_id', 'left');
    return $this->db->get('penghuni')->result();
  }

  public function get($id) {
    return $this->db->get_where('penghuni', ['id' => $id])->row();
  }

  public function insert($data) {
    return $this->db->insert('penghuni', $data);
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update('penghuni', $data);
  }

  public function delete($id) {
    return $this->db->delete('penghuni', ['id' => $id]);
  }
}
