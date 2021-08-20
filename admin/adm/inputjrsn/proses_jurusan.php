<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_jrsn=$_POST['id_jrsn'];
$nm_jurusan=$_POST['nm_jurusan'];

$a="insert into jurusan(id_jrsn,nm_jurusan) values ('$id_jrsn','$nm_jurusan')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
alert("Jurusan dengan ID <?echo $id_jrsn; ?> ini berhasil ditambahkan");
document.location='?page=jrsn';
</script>
<?

}
else{
?>
<script >
alert("Jurusan dengan ID No. <?echo $id_jrsn; ?> telah ada");
document.location='?page=jrsn';
</script>
<?
}
?>
