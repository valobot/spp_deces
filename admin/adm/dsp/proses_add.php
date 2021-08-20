<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_dsp=$_POST['id_dsp'];
$tgl_pmbyrn=$_POST['tgl_pmbyrn'];
$nm_siswa=$_POST['nm_siswa'];
$jurusan=$_POST['jurusan'];
$jumlah=$_POST['jumlah'];
$terbilang=$_POST['terbilang'];
$ket=$_POST['ket'];


$a="insert into dsp(id_dsp,tgl_pmbyrn,nm_siswa,jurusan,jumlah,terbilang,ket) values ('$id_dsp','$tgl_pmbyrn','$nm_siswa','$jurusan','$jumlah','$terbilang','$ket')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
alert("Siswa untuk id_dsp <?echo $id_dsp; ?> berhasil ditambahkan");
document.location='?page=dsp';
</script>
<?

}
else{
?>
<script >
alert("Siswa untuk id_dsp <?echo $id_dsp; ?> telah ada");
document.location='?page=dsp';
</script>
<?
///header("location:indatasiswa.php");
}
?>
