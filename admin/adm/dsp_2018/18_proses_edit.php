<?php
include "dt/koneksi.php";

	$id_dsp18 =$_POST['id_dsp18'];
	$kwitansi =$_POST['kwitansi'];
	$tgl_pmbyrn =$_POST['tgl_pmbyrn'];
	$nm_siswa =$_POST['nm_siswa'];
	$jurusan = $_POST['jurusan'];
	$jumlah = $_POST['jumlah'];
	$terbilang = $_POST['terbilang'];
	$ket = $_POST['ket'];
	
	$query= mysqli_query("UPDATE dsp_2018 SET kwitansi='$kwitansi', tgl_pmbyrn='$tgl_pmbyrn', nm_siswa='$nm_siswa', jurusan='$jurusan', jumlah='$jumlah', terbilang='$terbilang', ket='$ket' WHERE id_dsp18='$id_dsp18'");
	
	header("location:?page=dsp18"); 
?>
