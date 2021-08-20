<?php
include'../koneksi.php';
if(isset($_POST['simpan']));
$id_byr=$_POST['id_byr'];
$tgl_byr= date("Y-m-d");
$id=$_POST['id'];
$id_kelas=$_POST['id_kelas'];
$id_jrsn=$_POST['id_jrsn'];
$jenis_bayar=$_POST['jenis_bayar'];
$harga=$_POST['harga'];
$jumlah_bayar=$_POST['jumlah_bayar'];
$ket=$_POST['ket'];

$a="insert into bayar(id_byr,tgl_byr,id,id_kelas,id_jrsn,jenis_bayar,harga,jumlah_bayar,ket) values ('$id_byr','$tgl_byr','$id','$id_kelas','$id_jrsn','$jenis_bayar','$harga','$jumlah_bayar','$ket')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
alert("Siswa dengan ID <?echo $id_dsp; ?> berhasil ditambahkan");
document.location='?page=spp';
</script>
<?

}
else{
?>
<script >
alert("Siswa untuk id <?echo $id_dsp; ?> telah ada");
document.location='?page=spp';
</script>
<?
}
?>
