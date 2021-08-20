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
	<legend>Cari Per-Periode</legend>
	<form method="POST" action="?page=lapperiode_dsp18">
		<table cellpadding="2">
			<tr>
				<td>Dari</td><td>:</td>
				<td><input name="dari" type="text" id="cari" placeholder='Format : dd/mm/yyyy' style="width:200px; height:25px"></td>
			</tr>
			<tr>
				<td>Sampai</td><td>:</td>
				<td><input name="sampai" type="text" id="cari" placeholder='Format : dd/mm/yyyy' style="width:200px; height:25px"></td>
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
<table width="1000" border='0'>
 <tr>
	<td width='400'><center><fieldset><legend><strong><b>Laporan Penerimaan Pembayaran DSP Calon Siswa</b></strong></legend>
		<table width="1000" border="1" align="center" cellspacing="0">
			<p style="margin-top:5px; margin-button:5px;" align="center">
				<form action="?page=prospmyrn18" method="POST" name="form1">
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
