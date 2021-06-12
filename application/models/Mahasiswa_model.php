<?php
class Mahasiswa_model extends CI_Model {
  function retrieve() {
    $query = $this->db->get('mhs');
    
    if($query->result()) {
      foreach($query->result() as $content) {
        $data[] = array(
          $content->nim,
          $content->nama,
          $content->alamat
        
        );
      }
      return $data;
    }else{
      return FALSE;
    }
  }
}
?>