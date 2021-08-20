<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['nama']) and !isset($_SESSION['pass'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>search spp</title>
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
<table width="1000" border='0'>
 <tr>
	<td width='400'><center>
	<fieldset><legend><strong><b>Laporan Pembayaran Siswa/i </b></strong></legend>
		<table width="1000" border="1" align="center" cellspacing="0">
			<p style="margin-top:5px; margin-button:5px;" align="center">
				<form action="?page=lapspp" method="POST" name="form1">
					Input : Tgl. Pembayaran
					<input name="tgl_pmbyrn" type="text" id="cari" size="20" placeholder='Format : dd/mm/yyyy' maxlength="30">
						 
					<input type="submit" name="Submit" value="Tampilkan">
				</form>
			</p>
			
		</table>
	</fieldset>		
	</td>
   </tr>
</table>
</body>
</html>		
