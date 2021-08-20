<?php
session_start();
include "dt/koneksi.php";
if(!isset($_SESSION['userid']) and !isset($_SESSION['psw'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}
?>
<html>
<head>
	<title>Detail</title>
	<link rel="stylesheet" type="text/css" href="font.css" />
	<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
	<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
	<script type="text/javascript">
		function printDiv(elementId) {
		 var a = document.getElementById('printing-css').value;
		 var b = document.getElementById(elementId).innerHTML;
		 window.frames["print_frame"].document.title = document.title;
		 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
		 window.frames["print_frame"].window.focus();
		 window.frames["print_frame"].window.print();
		}
	</script>
</head>
<body>
	<center>
		<p align="center"><a href="javascript:printDiv('div1');"><button>Catak</button></a>
		<a href="?page=dsp19"><b>[Back]</b></a>
	</center>
	<div id="div1" class="font">
	<?php
	include ("dt/koneksi.php");
	?>
	
	<?php
	$id_dsp19 = $_GET['id_dsp19'];
	$query = mysqli_query("select * from dsp_2019 where id_dsp19='$id_dsp19'") or die(mysqli_error());
 
	$row = mysqli_fetch_array($query);
	?>
	
	<form action="" enctype="multipart/form-data" method="post" name="postform">
		<input type="hidden" name="id_dsp19" value="<?php echo $row['id_dsp19'];?>" />
			
	<table width="85%" align="center">
		<tr bgcolor="" align="center">
			<td align="center"><img src="images/logo/SMPDECES.png" height="100" width="110"></td>
			<td width="650" colspan="3" align="center" style='color:blue; font: 18px Cambria, verdana, sans-serif; font-weight: bold;'>
			<font size="4">
				<b>YAYASAN PENDIDIKAN SUMARNO<br>
			</font>
			<font size="3">
				SMP - SMK TUNAS BANGSA<br>
				DEPOK CENTRE SCHOOL (DECES)<br></b>
			</font>
			<font size="4" color="red">
				AKREDITASI "A"<br>
			</font>
			<font size="1" color="black">
				Jl. Raya H. Abdul Gani No. 75, Rt. 006 Rw. 001 Kel. Kalibaru, Kec. Cilodong Kota Depok
			</font>
			</td>
			<td align="center"><img src="images/logo/SMKTB.png" height="95" width="100"></td>
		</tr>
		</table>
		<table width="85%" align="center">
		<tr>
			<td colspan="6">
			<hr width='100%' style='border: 2px solid black;'>
			</td>
		</tr>
		
		<tr bgcolor="#0c8b74" align="center">
			<td colspan="6" style='color:white; font: 14px Cambria, verdana, sans-serif;'>BUKTI PEMBAYARAN DANA SUMBANGAN PENDIDIKAN TAHUN PELAJARAN 2019/2020</td>
		</tr>
		<!-- Batas -->
		<tr>
			<td colspan="6">
				<fieldset><legend><strong><b>KWINTANSI</b></strong></legend>
				<table align="center" width="80%">
				  <tr>
					<td align="right"><u>No. Kwitansi</u></td>
					<td colspan="4"> : <?php echo $row['id_dsp19'];?></td>
				  </tr>
				 
				 <!--Batas-->
				 <table align="center" width="90%">
				  <tr>
					<td>Telah Terima Dari</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><?php echo $row['nm_siswa'];?></td>
				  </tr>
				  <tr>
					<td>Uang Sejumlah</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4">Rp. <?php echo number_format($row['jumlah']);?>,-</td>
				  </tr>
				  <tr>
					<td>Terbilang</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><i><?php echo $row['terbilang'];?></i></td>
				  </tr>
				  <tr>
					<td>Untuk Pembayaran</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><?php echo $row['ket'];?></td>
				  </tr>
				  <tr>
					<td>Jurusan/Sekolah</td><td>:</td>
					<td bgcolor="#dad7d1" ><?php echo $row['jurusan'];?></td>
				  </tr>
				  <tr>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td></td>
					<td >Depok, <?php echo $row['tgl_pmbyrn'];?></td>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td></td>
					<td >Petugas PPDB</td>
				  </tr>
				  <tr>
					<td><br><br></td>
				   </tr>
				   <tr height='40'>
					<td></td><td></td>
					<td></td>
					<td><?php echo "<font size='3'>".$_SESSION['userid']."</font>";?>
						</td>
				  </tr>				  
				</table>
				</fieldset>	
			</td>
		</tr>
		<tr>
			<td colspan="6">Ket : <i>Biaya Pendaftaran beserta Uang DSP dan lainnya, tidak dapat dikembalikan jika sewaktu-waktu mengundurkan diri</i></td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>