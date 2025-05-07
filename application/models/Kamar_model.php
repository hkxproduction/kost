<?php
class Kamar_model extends CI_Model {
  public function get_all() {
    return $this->db->get('kamar')->result();
  }

  public function get($id) {
    return $this->db->get_where('kamar', ['id' => $id])->row();
  }

  public function insert($data) {
    return $this->db->insert('kamar', $data);
  }

  public function update($id, $data) {
    return $this->db->where('id', $id)->update('kamar', $data);
  }

  public function delete($id) {
    return $this->db->delete('kamar', ['id' => $id]);
  }
}
