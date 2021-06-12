<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportXLS extends CI_Controller {
  function __construct() {

    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model( 'Mahasiswa_model');
    $this->load->model('Mtk_model');
    $this->load->model( 'Nilai_model');

  }

  public function index() {
    $data['mhs'] = $this->Mtk_model->retrieve();
    $this->load->view('ReportXLS_view', $data);
  }

  public function hsk() {
    $data['title'] = 'HSK_'.$this->input->post('vKdmtk');
    $data['results'] = $this->Nilai_model->retrieve($this->input->post('vKdmtk'));

    $this->load->view( 'ReportXLSExport_view' , $data) ;
  }
}
?>