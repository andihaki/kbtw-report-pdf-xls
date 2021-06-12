<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <tr>
    <th>No.</th>
    <th>Kode MTK</th>
    <th>Matakuliah</th>
    <th>Absen</th>
    <th>Tugas</th>
    <th>UTS</th>
    <th>UAS</th>
  </tr>

<?php
$no=1;
foreach($results as $data) {
  echo "<tr>
    <td>$no</td>
    <td>$data[1]</td>
    <td>$data[2]</td>
    <td>$data[3]</td>
    <td>$data[4]</td>
    <td>$data[5]</td>
    <td>$data[6]</td>
    </tr> ";
    $no++;
}
?>
</table>