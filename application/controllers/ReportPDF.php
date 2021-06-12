<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportPDF extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('Mahasiswa_model');
    $this->load->model('Mtk_model');
    $this->load->model('Nilai_model');

  }

  function index() {
    $data['mhs'] = $this->Mtk_model->retrieve();
    $this->load->view('ReportPDF_view', $data);
  }

  public function hsk() {
    $mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp']);
    $results = $this->Nilai_model->retrieve($this->input->post('vKdmtk'));
    
    $output = "<h1>Laporan Nilai</h1></br>";
    $output .= "<div>Kode MTK: ".$results[0][1]."</div>";
    $output .= "<div>Matakuliah: ".$results[0][2]."</div>";
    $output .= "<table border='1' width='100%' cellpadding='5'>
                <tr>
                  <th>No.</th>
                  <th>Kode MTK</th>
                  <th>Matakuliah</th>
                  <th>Absen</th>
                  <th>Tugas</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th>Grade</th>
                </tr>";
    $no=1;
    foreach($results as $data) {
      $akhir = 0.3 * $data[4] + 0.3 * $data[5] + 0.4 * $data[6];

      if ($akhir >= 85)
        $grade = "A";
      elseif ($akhir >= 80)
        $grade = "A-";
      elseif ($akhir >= 75)
        $grade = "B+";
      elseif ($akhir >= 70)
        $grade = "B";
      elseif ($akhir >= 65)
        $grade = "B-";
      elseif ($akhir >= 60)
        $grade = "C";
      elseif ($akhir >= 45)
        $grade = "D";
      else
        $grade = "E";
      
      $output .= "<tr>
          <td>$no.</td>
          <td>$data[1]</td>
          <td>$data[2]</td>
          <td>$data[3]</td>
          <td>$data[4]</td>
          <td>$data[5]</td>
          <td>$data[6]</td>
          <td>$grade</td>
        </tr>";
        $no++;
      }
      $output .= "</table>";
      $mpdf->WriteHTML($output);
      $mpdf->Output('1911601431.pdf', 'D');
  }
}
?>