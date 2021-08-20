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
	<script>
		function printContent (detail)
		{
			var restorpage = document.body.innerHTML;
			var printcontent = document.getElementById(detail).innerHTML;
			
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
			
	</script>
</head>
<body>
	<center>
				<button onclick="printContent('div1')">Catak</button>
				<a href="?page=smp"><b>[Back]</b></a>
	</center>
	<div id="div1" class="font">
	<?php
	include ("../koneksi.php");
	?>
	
	<?php
	$no_pendf = $_GET['no_pendf'];
	$query = mysqli_query("select * from calonsiswa_smp where no_pendf='$no_pendf'") or die(mysqli_error());
 
	$row = mysqli_fetch_array($query);
	?>
	
	<form action="" enctype="multipart/form-data" method="post" name="postform">
	
		<input type="hidden" name="no_pendf" value="<?php echo $row['no_pendf'];?>" />
				
		
	<table width="95%" align="center">
		<tr bgcolor="" align="center">
			<td align="center"><img src="images/logo/SMKTB.png" height="100" width="110"></td>
			<td width="650" colspan="3" align="center" style='color:blue; font: 18px Cambria, verdana, sans-serif; font-weight: bold;'>
			<font size="4">
				<b>YAYASAN PENDIDIKAN SUMARNO<br>
			</font>
			<font size="3">
				SMK TUNAS BANGSA CILODONG<br>
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
		<table width="95%" align="center">
		<tr>
			<td colspan="6">
			<hr width='100%' style='border: 2px solid black;'>
			</td>
		</tr>
		
		<tr bgcolor="#0c8b74" align="center">
			<td colspan="6" style='color:white; font: 14px Cambria, verdana, sans-serif;'>BUKTI PENDAFTARAN PESERTA DIDIK BARU TAHUN PELAJARAN 2017/2018</td>
		</tr>
		<tr>
			<td colspan="6">
				<table border="1" align="center" width="100%">
				  <tr>
					<td>No. Pendaftaran</td><td>:</td>
					<td><?php echo $row['no_pendf'];?></td>
					<td align="right">Tgl. Pendaftaran</td><td>:</td>
					<td><?php echo $row['tgl_pendf'];?></td>
				  </tr>
				  <tr>
					<td>Nama Calon Peserta Didik</td><td>:</td>
					<td colspan="4"><?php echo $row['nm_siswa'];?></td>
				  </tr>
				  <tr>
					<td>Tempat, Tgl. Lahir</td><td>:</td>
					<td colspan="4"><?php echo $row['tmp_lhr'];?>, &nbsp;<?php echo $row['tgl_lhr'];?></td>
				  </tr>
				  <tr>
					<td>Jenis Kelamin</td><td>:</td>
					<td colspan="4"><?php echo $row['jk'];?></td>
				  </tr>
				  <tr>
					<td>Alamat</td><td>:</td>
					<td colspan="4"><?php echo $row['alamat'];?></td>
				  </tr>
				  <tr>
					<td>Telp/HP</td><td>:</td>
					<td colspan="4"><?php echo $row['telp'];?></td>
				  </tr>
				  <tr>
					<td>Asal Sekolah</td><td>:</td>
					<td colspan="4"><?php echo $row['asal_sekolah'];?></td>
				  </tr>
				  <tr>
					<td>Kopetensi Keahlian</td><td>:</td>
					<td colspan="4"><?php echo $row['jurusan'];?></td>
				  </tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3">TTD Pendaftar Siswa Baru</td>
			<td colspan="2" align="center">Panitia PPDB</td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr height="40">
			<td colspan="3"><p style="margin-left:35px;"><?php echo $row['pendaftar'];?></p></td>
			<td colspan="2" align="center"><font size='5'><?php echo "<font size='5'>".$_SESSION['nama']."</font>";?>
			</td>
		</tr>
		
		<!-- Batas -->
		<tr>
			<td colspan="8"><?php include "rincian_smk_smp.php";?></td>
		</tr>
		<tr>
			<td colspan="6">
				<fieldset><legend><strong><b>KWINTANSI</b></strong></legend>
				<table align="center" width="90%">
				  <tr>
					<td align="right"><u>KWITANSI</u></td>
					
					<td align="right"><u>No. Kwitansi</u></td>
					<td colspan="4"> : <?php echo $row['no_pendf'];?></td>
				  </tr>
				 
				 <!--Batas-->
				 <table align="center" width="90%">
				  <tr>
					<td>Telah Terima Dari</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><?php echo $row['nm_siswa'];?></td>
				  </tr>
				  <tr>
					<td>Uang Sejumlah</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><i>Dua Ratus Ribu Rupiah</i></td>
				  </tr>
				  <tr>
					<td>Untuk Pembayaran</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4"><?php echo $row['ket'];?></td>
				  </tr>
				  <tr>
					<td>Total</td><td>:</td>
					<td bgcolor="#dad7d1" colspan="4">Rp. <?php echo $row['biaya'];?>'-</td>
				  </tr>
				  <tr>
					<td></td><td>:</td>
					<td bgcolor="#dad7d1">Kopetensi Keahlian :</td>
					<td bgcolor="#dad7d1" colspan=""><?php echo $row['jurusan'];?></td>
				  </tr>
				  <tr>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td></td>
					<td >Depok, <?php echo $row['tgl_pendf'];?></td>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td></td>
					<td >Petugas PSB</td>
				  </tr>
				  <tr>
					<td><br><br></td>
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