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
		<a href="?page=sppsmk"><b>[Back]</b></a>
	</center>
	<div id="printReady" class="font">
	<?php
	include ("dt/koneksi.php");
	?>
	
	<?php
	$id_sppsmk = $_GET['id_sppsmk'];
	$query = mysqli_query("select * from spp_smk INNER JOIN siswa ON spp_smk.id=siswa.id INNER JOIN kelas ON spp_smk.id_kelas=kelas.id_kelas INNER JOIN jurusan ON spp_smk.id_jrsn=jurusan.id_jrsn where id_sppsmk='$id_sppsmk'") or die(mysqli_error());
 
	$row = mysqli_fetch_array($query);
	?>
	
	<form action="" enctype="multipart/form-data" method="post" name="postform">
	
		<input type="hidden" name="id_sppsmp" value="<?php echo $row['id_sppsmp'];?>" />
				
		
	<table width="85%" align="center">
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
				Jl. Raya H. Abdul Gahni No. 75, Rt. 006 Rw. 001 Kel. Kalibaru, Kec. Cilodong Kota Depok, Telp:. (021) 8755777/8754863
			</font>
			</td>
			<td align="center"><img src="images/logo/widiwidya.png" height="95" width="100"></td>
		</tr>
		</table>
	<table width="97%" align="center">
		<tr>
			<td colspan="6">
			<hr width='100%' style='border: 2px solid black;'>
			</td>
		</tr>
		
		<tr bgcolor="#0c8b74" align="center">
			<td colspan="6" style='color:white; font: 14px Cambria, verdana, sans-serif;'>BUKTI PEMBAYARAN SPP </td>
		</tr>
		<!-- Batas -->
		<tr>
			<td colspan="6">
				<fieldset><legend><strong><b>KWINTANSI</b></strong></legend>
				<table align="center" width="97%">
				  <tr>
					<td></td><td></td>
					<td><p style='margin-left:200px;'><u>No. Kwitansi</u> :<?php echo $row['id_sppsmk'];?></p></td>
				  </tr>
				 
				 <!--Batas-->
				 <tr>
					<td>Telah Terima Dari</td><td>:</td>
					<td bgcolor="#dad7d1"><?php echo $row['nama'];?></td>
				  </tr>
				  <tr>
					<td>Kelas</td><td>:</td>
					<td bgcolor="#dad7d1"><?php echo $row['nm_kelas'];?> - <?php echo $row['nm_jurusan'];?></td>
				  </tr>
				  <tr>
					<td>Uang Sejumlah</td><td>:</td>
					<td bgcolor="#dad7d1">Rp. <?php echo number_format($row['jumlah_bayar']);?>,-</td>
				  </tr>
				  <tr>
					<td>Terbilang</td><td>:</td>
					<td bgcolor="#dad7d1"><i><?php echo $row['terbilang'];?></i></td>
				  </tr>
				  <tr>
					<td>Untuk Pembayaran</td><td>:</td>
					<td bgcolor="#dad7d1"><?php echo $row['jenis_bayar'];?></td>
				  </tr>
				  <tr>
					<td>Keterangan</td><td>:</td>
					<td bgcolor="#dad7d1"><?php echo $row['ket'];?></td>
				  </tr>
				  <tr>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td><p style='margin-left:150px;'>Cilodong, <?php echo $row['tgl'];?></p></td>
				  </tr>
				  <tr>
					<td></td><td></td>
					<td><p style='margin-left:150px;'>Staff TU</p></td>
				  </tr>
				  <tr>
					<td><br><br></td><td></td><td></td>
				   </tr>
				   <tr height='40'>
					<td></td><td></td>
					<td><p style='margin-left:150px;'><?php echo "<font size='3'>".$_SESSION['userid']."</font>";?>
						</p></td>
				  </tr>	
				</table>
				</fieldset>	
			</td>
		</tr>
		<tr>
			<td colspan="6">Ket : <i>Uang yang telah dibayarkan, tidak dapat dikembalikan.</i></td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>