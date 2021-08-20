<?php
include'dt/koneksi.php';
if(isset($_POST['simpan']));
$id_kelas=$_POST['id_kelas'];
$nm_kelas=$_POST['nm_kelas'];

$a="insert into kelas(id_kelas,nm_kelas) values ('$id_kelas','$nm_kelas')";
$yes = mysqli_query($a);

//echo $a;
if($yes){
?>
<script >
alert("Kelas dengan ID <?echo $id_kelas; ?> ini berhasil ditambahkan");
document.location='?page=kls';
</script>
<?

}
else{
?>
<script >
alert("Kelas dengan ID No. <?echo $id_kelas; ?> telah ada");
document.location='?page=kls';
</script>
<?
//header("location:?page=kls");
}
?>
