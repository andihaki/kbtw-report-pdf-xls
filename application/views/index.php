<html>
<head>
<title>Report</title>
</head>
<body>

<h1>Cetak Laporan Nilai</h1>
<?php 
$attributes = array('id' => 'form-action');
echo form_open('reportpdf/hsk', $attributes);
?>
  Matakuliah <select name='vKdmtk'>
  <?php
  foreach($mhs as $content) {
    echo "<option value='$content[0]'>$content[0] - $content[1]</option>";
  }
  ?>
  </select>
  <div>
  <td>Output</td>
    <input type="radio" id="pdf" name="report-type" value="pdf" checked>
    <label for="pdf">PDF</label>
    <input type="radio" id="xls" name="report-type" value="xls" >
    <label for="xls">XLS</label><br>
  </div>
<input type="submit" value="Cetak" />
</form>
</body>
<script>
function changeFormAction(id) {
  document.querySelector(`#${id}`).addEventListener('click', function (event) {
    if (event.target && event.target.matches("input[type='radio']")) {
      const hostname = window.location;
      const value = event.target.value;
      const postUrl = `${hostname}index.php/report${value}/hsk`;
      console.log(postUrl)
      document.querySelector('#form-action').action = postUrl;
    }
});
}

changeFormAction('xls');
changeFormAction('pdf');
</script>
</html>