<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_dsp18=$_POST['id_dsp18'];
$kwitansi=$_POST['kwitansi'];
$tgl_pmbyrn=$_POST['tgl_pmbyrn'];
$nm_siswa=$_POST['nm_siswa'];
$jurusan=$_POST['jurusan'];
$jumlah=$_POST['jumlah'];
$terbilang=$_POST['terbilang'];
$ket=$_POST['ket'];


$a="insert into dsp_2018(id_dsp18,kwitansi,tgl_pmbyrn,nm_siswa,jurusan,jumlah,terbilang,ket) values ('$id_dsp18','$kwitansi','$tgl_pmbyrn','$nm_siswa','$jurusan','$jumlah','$terbilang','$ket')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
alert("Siswa untuk id_dsp18 <?echo $id_dsp18; ?> berhasil ditambahkan");
document.location='?page=dsp18';
</script>
<?

}
else{
?>
<script >
alert("Siswa untuk id_dsp18 <?echo $id_dsp18; ?> telah ada");
document.location='?page=dsp18';
</script>
<?
///header("location:indatasiswa.php");
}
?>
