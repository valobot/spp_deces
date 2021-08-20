<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_sppsmk=$_POST['id_sppsmk'];
$tgl= date("Y-m-d");
$id=$_POST['id'];
$id_kelas=$_POST['id_kelas'];
$id_jrsn=$_POST['id_jrsn'];
$jenis_bayar=$_POST['jenis_bayar'];
$harga=$_POST['harga'];
$jumlah_bayar=$_POST['jumlah_bayar'];
$terbilang=$_POST['terbilang'];
$ket=$_POST['ket'];

$a="insert into spp_smk(id_sppsmk,tgl,id,id_kelas,id_jrsn,jenis_bayar,harga,jumlah_bayar,terbilang,ket) values ('$id_sppsmk','$tgl','$id','$id_kelas','$id_jrsn','$jenis_bayar','$harga','$jumlah_bayar','$terbilang','$ket')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
//alert("Siswa dengan ID <?echo $id_sppsmk; ?> berhasil ditambahkan");
document.location='?page=sppsmk';
</script>
<?php

}
else{
?>
<script >
alert("Siswa untuk id <?echo $id_sppsmk; ?> telah ada");
document.location='?page=sppsmk';
</script>
<?
}
?>
