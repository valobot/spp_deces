<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_sppsmp=$_POST['id_sppsmp'];
$tgl= date("Y-m-d");
$id=$_POST['id'];
$id_kelas=$_POST['id_kelas'];
$jenis_bayar=$_POST['jenis_bayar'];
$harga=$_POST['harga'];
$jumlah_bayar=$_POST['jumlah_bayar'];
$terbilang=$_POST['terbilang'];
$ket=$_POST['ket'];

$a="insert into spp_smp(id_sppsmp,tgl,id,id_kelas,jenis_bayar,harga,jumlah_bayar,terbilang,ket) values ('$id_sppsmp','$tgl','$id','$id_kelas','$jenis_bayar','$harga','$jumlah_bayar','$terbilang','$ket')";
$yes = mysql_query($a);

//echo $a;
if($yes){
?>
<script >
//alert("Siswa dengan ID <?echo $id_sppsmp; ?> berhasil ditambahkan");
document.location='?page=sppsmp';
</script>
<?php

}
else{
?>
<script >
alert("Siswa untuk id <?echo $id_sppsmp; ?> telah ada");
document.location='?page=sppsmp';
</script>
<?
}
?>
