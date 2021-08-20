<?php
include "dt/koneksi.php";

	$id_dsp19 =$_POST['id_dsp19'];
	$kwitansi =$_POST['kwitansi'];
	$tgl_pmbyrn =$_POST['tgl_pmbyrn'];
	$nm_siswa =$_POST['nm_siswa'];
	$jenjang = $_POST['jenjang'];
	$jurusan = $_POST['jurusan'];
	$jumlah = $_POST['jumlah'];
	$terbilang = $_POST['terbilang'];
	$ket = $_POST['ket'];
	
	$query= mysqli_query("UPDATE dsp_2019 SET kwitansi='$kwitansi', tgl_pmbyrn='$tgl_pmbyrn', nm_siswa='$nm_siswa', jenjang='$jenjang', jurusan='$jurusan', jumlah='$jumlah', terbilang='$terbilang', ket='$ket' WHERE id_dsp19='$id_dsp19'");
	
	header("location:?page=dsp19"); 
?>
