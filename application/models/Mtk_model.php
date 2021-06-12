<?php
class Mtk_model extends CI_Model {
  function retrieve() {
    $query = $this->db->get('mtk');
    
    if($query->result()) {
      foreach($query->result() as $content) {
        $data[] = array(
          $content->kdmtk,
          $content->namamtk,
          $content->sks  
        );
      }
      return $data;
    }else{
    return FALSE;
    }
  }
}

?>