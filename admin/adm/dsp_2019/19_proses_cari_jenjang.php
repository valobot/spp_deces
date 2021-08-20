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
	<title>P cari Jenjang</title>
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
<table width="97%" border='0'>
<center>
		<a href="javascript:printDiv('div1');"><b> [Cetak]</b></a>
		<a href="?page=dsp19">[BACK]</b></a><br>
	</center>
	<div id="div1" class="font">
 <tr>
	<td width='900'><center>
	<fieldset><legend align="center"><b>Daftar DSP Calon Siswa Perjenjang</a></legend>
	
	<table width="95%" border="1" align="center" cellspacing="0">
		<tr bgcolor="#00FF66" align="center" height="35">
			<th>No</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Cln Siswa</th>
			<th>Jenjang</th>
			<th>Jurusan</th>
			<th width='120'>Jumlah</th>
			<th>Terbilang</th>
			<th>Keterangan</th>
		</tr>
		<?php 
		include "dt/koneksi.php";
		
		$jenjang= $_POST['jenjang']; 
		$query="select * from dsp_2019 where jenjang like '%$jenjang%' ";
		
		$result=mysqli_query($query) or die(mysqli_error());
		while($data=mysqli_fetch_array($result)){
	?>
	<tr align="" bgcolor="#DFFDD5">
		<td align="center"><?php echo $c=$c+1 ?></td>
		<td align="center"><?php echo $data['tgl_pmbyrn'] ?></td>
		<td><?php echo $data['nm_siswa'] ?></td>
		<td><?php echo $data['jenjang'] ?></td>
		<td><?php echo $data['jurusan'] ?></td>
		<td>Rp. <?php echo number_format($data['jumlah']);?>,-</td>
		<td><?php echo $data['terbilang'] ?></td>
		<td><?php echo $data['ket'] ?></td>
	</tr>
	<?php 
	$no++; 
	}
	?>
	<!--
	<tr>
		<td colspan="3" align="right"><b>Jumlah Pemasukan Hari Ini</b></td>
		<td colspan="">Rp. </td>
		<td align='right'><?php $jumlahkan = "SELECT SUM(jumlah) AS total FROM dsp_2019 where jumlah like '%$jumlah%'"; 
			$hasil =@mysqli_query($jumlahkan) or die (mysqli_error());
			$data = mysqli_fetch_array($hasil); 

			echo "<b>" . number_format($data['total']) . ",- </b>";
			?>
		</td>
		<td><font color="white">.</font></td>
	</tr>
	-->
	</table>
		</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>		
