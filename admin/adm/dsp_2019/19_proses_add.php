<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_dsp19=$_POST['id_dsp19'];
$kwitansi=$_POST['kwitansi'];
$tgl_pmbyrn=$_POST['tgl_pmbyrn'];
$nm_siswa=$_POST['nm_siswa'];
$jenjang=$_POST['jenjang'];
$jurusan=$_POST['jurusan'];
$jumlah=$_POST['jumlah'];
$terbilang=$_POST['terbilang'];
$ket=$_POST['ket'];


$a="insert into dsp_2019(id_dsp19,kwitansi,tgl_pmbyrn,nm_siswa,jenjang,jurusan,jumlah,terbilang,ket) values ('$id_dsp19','$kwitansi','$tgl_pmbyrn','$nm_siswa','$jenjang','$jurusan','$jumlah','$terbilang','$ket')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
alert("Siswa untuk id_dsp19 <?echo $id_dsp19; ?> berhasil ditambahkan");
document.location='?page=dsp19';
</script>
<?

}
else{
?>
<script >
alert("Siswa untuk id_dsp19 <?echo $id_dsp19; ?> telah ada");
document.location='?page=dsp19';
</script>
<?
///header("location:indatasiswa.php");
}
?>
