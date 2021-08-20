<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['nama']) and !isset($_SESSION['pass'] )){
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
		<a href="javascript:printDiv('div1');"><b> [Cetak]</b></a>
		<a href="?page=sis"><b>[Back]</b></a>
	</center>
	<div id="div1" class="font">
	<?php
	include ("../koneksi.php");
	?>
	
	<?php
	$tgl_byr = $_GET['tgl_byr'];
	$query = mysqli_query("select * from bayar INNER JOIN siswa ON bayar.id=siswa.id INNER JOIN kelas ON bayar.id_kelas=kelas.id_kelas INNER JOIN jurusan ON bayar.id_jrsn=jurusan.id_jrsn order by id_byr desc") or die(mysqli_error());
 
	$row = mysqli_fetch_array($query);
	?>
	
	<form action="" enctype="multipart/form-data" method="post" name="postform">
	
		<input type="hidden" name="id_byr" value="<?php echo $row['id_byr'];?>" />
				
		
	<table width="85%" align="center">
		<tr bgcolor="" align="center">
			<td align="center"><img src="images/logo/logo.png" height="100" width="110"></td>
			<td width="650" colspan="3" align="center" style='color:blue; font: 18px Cambria, verdana, sans-serif; font-weight: bold;'>
			<font size="4">
				<b>YAYASAN PENDIDIKAN SUMARNO<br>
			</font>
			<font size="3">
				DEPOK CENTRE SCHOOL (DECES)<br></b>
			</font>
			<font size="2" color="red">
				Ijin Pendirian : 421.1/07-Disdik/2015<br>
			</font>
			<font size="1" color="black">
				Jl. Raya H. Abdul Gahni No. 75, Rt. 006 Rw. 001 Kel. Kalibaru, Kec. Cilodong Kota Depok
			</font>
			</td>
			<td align="center"><img src="images/logo/widiwidya.png" height="95" width="100"></td>
		</tr>
		</table>
		<table width="85%" align="center">
		<tr>
			<td colspan="6">
			<hr width='100%' style='border: 2px solid black;'>
			</td>
		</tr>
		
		<tr bgcolor="#0c8b74" align="center">
			<td colspan="6" style='color:white; font: 14px Cambria, verdana, sans-serif;'>BUKTI PEMBAYARAN SPP SMP-SMK Tunas Bangsa</td>
		</tr>
		<!-- Batas -->
		<tr>
			<td colspan="6">
				<fieldset><legend><strong><b>KWINTANSI</b></strong></legend>
				<table align="center" width="80%">
				  <tr>
					<td align="right"></td>
					
					<td align="right"><u>No. Kwitansi</u></td>
					<td colspan="4"> : <?php echo $row['id_byr'];?></td>
				  </tr>
				 
				 <!--Batas-->
				 <table align="center" width="90%">
				  <tr>
					<td>Telah Terima Dari</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><?php echo $row['nama'];?>
					</td>
				  </tr>
				  <tr>
					<td>Kelas/Jurusan</td><td>:</td>
					<td bgcolor="#dad7d1" ><?php echo $row['nm_kelas'];?> &nbsp; <?php echo $row['nm_jurusan'];?></td>
				  </tr>
				  <tr>
					<td>Untuk Pembayaran</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><?php echo $row['jenis_bayar'];?>
					</td>
				  </tr>
				  <tr>
					<td>Uang Sejumlah</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4">Rp. <?php echo number_format($row['jumlah_bayar'])?> ,-</td>
				  </tr>
				  <tr>
					<td>Keterangan</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><?php echo $row['ket'];?></td>
				  </tr>
				  <tr>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td></td>
					<td >Depok, <?php echo $row['tgl_byr'];?></td>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td></td>
					<td >Petugas TU</td>
				  </tr>
				  <tr>
					<td><br><br></td>
				   </tr>
				   <tr height='40'>
					<td></td><td></td>
					<td></td>
					<td><font size='4'><?php echo "<font size='4'>".$_SESSION['nama']."</font>";?>
						</td>
				  </tr>				  
				</table>
				</fieldset>	
			</td>
		</tr>
		<tr>
			<td colspan="6">Ket : <i>Uang yang sudah dibayarkan, tidak dapat dikembalikan.</i></td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>