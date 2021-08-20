<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id=$_POST['id'];
$tanggal= date("Y-m-d");
$uraian=$_POST['uraian'];
$keterangan=$_POST['keterangan'];
$jumlah=$_POST['jumlah'];


$a="insert into pengeluaran_sklh(id,tanggal,uraian,keterangan,jumlah) values ('$id','$tanggal','$uraian','$keterangan','$jumlah')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
	header('location:?page=sklh');
	}
?>
