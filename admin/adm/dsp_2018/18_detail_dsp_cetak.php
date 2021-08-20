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
	<script language="JavaScript">
	var gAutoPrint = true; // Tells whether to automatically call the print function

	function printSpecial()
	{
	if (document.getElementById != null)
	{
	var html = '<HTML>\n<HEAD>\n';

	if (document.getElementsByTagName != null)
	{
	var headTags = document.getElementsByTagName("head");
	if (headTags.length > 0)
	html += headTags[0].innerHTML;
	}

	html += '\n</HE>\n<BODY>\n';

	var printReadyElem = document.getElementById("printReady");

	if (printReadyElem != null)
	{
	html += printReadyElem.innerHTML;
	}
	else
	{
	alert("Could not find the printReady function");
	return;
	}

	html += '\n</BO>\n</HT>';

	var printWin = window.open("","printSpecial");
	printWin.document.open();
	printWin.document.write(html);
	printWin.document.close();
	if (gAutoPrint)
	printWin.print();
	}
	else
	{
	alert("The print ready feature is only available if you are using an browser. Please update your browswer.");
	}
	}
	</script>
</head>
<body>
	<center>
		<p align="center"><a href="javascript:void(printSpecial())"><button>Catak</button></a>
		<a href="?page=dsp"><b>[Back]</b></a>
	</center>
	<div id="printReady" class="font">
	<?php
	include ("dt/koneksi.php");
	?>
	
	<?php
	$id_dsp = $_GET['id_dsp'];
	$query = mysqli_query("select * from dsp where id_dsp='$id_dsp'") or die(mysqli_error());
 
	$row = mysqli_fetch_array($query);
	?>
	
	<form action="" enctype="multipart/form-data" method="post" name="postform">
	
		<input type="hidden" name="id_dsp" value="<?php echo $row['id_dsp'];?>" />
				
		
	<table width="85%" align="center">
		<tr bgcolor="" align="center">
			<td align="center"><img src="images/logo/SMPDECES.png" height="100" width="110"></td>
			<td width="650" colspan="3" align="center" style='color:blue; font: 18px Cambria, verdana, sans-serif; font-weight: bold;'>
			<font size="4">
				<b>YAYASAN PENDIDIKAN SUMARNO<br>
			</font>
			<font size="3">
				SMP - SMK TUNAS BANGSA CILODONG<br>
				DEPOK CENTRE SCHOOL (DECES)<br></b>
			</font>
			<font size="2" color="red">
				Ijin Pendirian : 421.1/07-Disdik/2015<br>
			</font>
			<font size="1" color="black">
				Jl. Raya H. Abdul Gahni No. 75, Rt. 006 Rw. 001 Kel. Kalibaru, Kec. Cilodong Kota Depok
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
			<td colspan="6" style='color:white; font: 14px Cambria, verdana, sans-serif;'>BUKTI PEMBAYARAN DANA SUMBANGAN PENDIDIKAN TAHUN PELAJARAN 2017/2018</td>
		</tr>
		<!-- Batas -->
		<tr>
			<td colspan="6">
				<fieldset><legend><strong><b>KWINTANSI</b></strong></legend>
				<table align="center" width="80%">
				  <tr>
					<td align="right"><u>No. Kwitansi</u></td>
					<td colspan="4"> : <?php echo $row['id_dsp'];?></td>
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