<?php
class Nilai_model extends CI_Model {
  function retrieve($arg) {
    $this->db->select('*');
    $this->db->from('nilai');
    
    $this->db->join('mhs', 'mhs.nim = nilai.nim');
    $this->db->join('mtk', 'mtk.kdmtk = nilai.kdmtk');
    $this->db->where('nilai.kdmtk', $arg);
    
    $query = $this->db->get();
    
    if($query->result()) {
      foreach($query->result() as $content) {
        $data[] = array(
        
        $content->nim,
        $content->kdmtk,
        $content->namamtk,
        $content->absen,
        $content->tugas,
        $content->uts,
        $content->uas
        );
      }
      return $data;
    }else{  
      return FALSE;
    }
  }
}
?>