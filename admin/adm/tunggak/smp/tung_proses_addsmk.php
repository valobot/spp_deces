<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_tungsmk=$_POST['id_tungsmk'];
$tgl= date("Y-m-d");
$id=$_POST['id'];
$id_kelas=$_POST['id_kelas'];
$id_jrsn=$_POST['id_jrsn'];
$jenis_tunggak=$_POST['jenis_tunggak'];
$jumlah=$_POST['jumlah'];
$ket=$_POST['ket'];

$a="insert into tgsmk(id_tungsmk,tgl,id,id_kelas,id_jrsn,jenis_tunggak,jumlah,ket) values ('$id_tungsmk','$tgl','$id','$id_kelas','$id_jrsn','$jenis_tunggak','$jumlah','$ket')";
$yes = mysql_query($a);

//echo $a;
if($yes){
?>
<script >
//alert("Siswa dengan ID <?echo $id_sppsmk; ?> berhasil ditambahkan");
document.location='?page=tungsmk';
</script>
<?php

}
else{
?>
<script >
alert("Siswa untuk id <?echo $id_tungsmk; ?> telah ada");
document.location='?page=tungsmk';
</script>
<?
}
?>
