<html>
<head>
<title>Report</title>
</head>
<body>

<h1>Cetak HSK</h1>
<?php echo form_open('reportxls/hsk'); ?>
  Matakuliah <select name='vKdmtk'>
  <?php
  foreach($mhs as $content) {
    echo "<option value='$content[0]'>$content[0] - $content[1]</option>";
  }
  ?>

  </select>
<input type="submit" value="Cetak" />
</form>

 

</body>
</html>