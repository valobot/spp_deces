<?php
session_start();
include "dt/koneksi.php";
if(!isset($_SESSION['userid']) and !isset($_SESSION['psw'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Peng Selkh</title>
	<link rel="stylesheet" type="text/css" href="css-tgl/ui.all.css" />
    <script src="js-tgl/jquery-1.8.0.min.js"></script>
    <script src="js-tgl/ui.core.js"></script>
    <script src="js-tgl/ui.datepicker.js"></script>
    <script src="js-tgl/ui.datepicker-id.js"></script>
	<script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $("#tgl").datepicker({
          changeMonth : true,
          changeYear : true,
          yearRange : '-34:+5'
        });
      });
    </script>
    
    <script language='javascript'>
     function validAngka(a)
     {
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
    }
    </script>
</head>
<body>
	<legend><strong><b>Laporan Tunggakan SMK Tunas Bangsa Depok</b></strong></legend>
	<form method="POST" action="?page=tung_periodesmk">
		<table cellpadding="2">
			<tr>
				<td>Dari</td><td>:</td>
				<td><input name="dari" type="text" id="cari" placeholder='Format : yyyy-mm-dd' style="width:200px; height:25px"></td>
			</tr>
			<tr>
				<td>Sampai</td><td>:</td>
				<td><input name="sampai" type="text" id="cari" placeholder='Format : yyyy-mm-dd' style="width:200px; height:25px"></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td>&nbsp;</td>
				<td>
					<input type="submit" name="Submit"  value="Proses" style="width:100px; height:30px">
					<input type="reset" name="reset" value="Batal" style="width:100px ;height:30px" onclick="javascript:$('#tgl').dialog('close')">
				</td>
			</tr>
		</table>
     </form>
	</fieldset>
</body>
</html>		
