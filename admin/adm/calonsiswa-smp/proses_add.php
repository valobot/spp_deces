<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$no_pendf=$_POST['no_pendf'];
$tgl_pendf=$_POST['tgl_pendf'];
$nm_siswa=$_POST['nm_siswa'];
$tmp_lhr=$_POST['tmp_lhr'];
$tgl_lhr=$_POST['tgl_lhr'];
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$asal_sekolah=$_POST['asal_sekolah'];
$jurusan=$_POST['jurusan'];
$biaya=$_POST['biaya'];
$pendaftar=$_POST['pendaftar'];
$ket=$_POST['ket'];


$a="insert into calonsiswa_smp(no_pendf,tgl_pendf,nm_siswa,tmp_lhr,tgl_lhr,jk,alamat,telp,asal_sekolah,jurusan,biaya,pendaftar,ket) values ('$no_pendf','$tgl_pendf','$nm_siswa','$tmp_lhr','$tgl_lhr','$jk','$alamat','$telp','$asal_sekolah','$jurusan','$biaya','$pendaftar','$ket')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
alert("Siswa untuk no_pendf <?echo $no_pendf; ?> berhasil ditambahkan");
document.location='?page=clnsmp';
</script>
<?

}
else{
?>
<script >
alert("Siswa untuk no_pendf <?echo $no_pendf; ?> telah ada");
document.location='?page=clnsmp';
</script>
<?
///header("location:indatasiswa.php");
}
?>
