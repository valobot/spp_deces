<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_yps=$_POST['id_yps'];
$tanggal= date("Y-m-d");
$uraian=$_POST['uraian'];
$keterangan=$_POST['keterangan'];
$jumlah=$_POST['jumlah'];


$a="insert into pengeluaran_yps(id_yps,tanggal,uraian,keterangan,jumlah) values ('$id_yps','$tanggal','$uraian','$keterangan','$jumlah')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
	header('location:?page=yps');
	}
?>
