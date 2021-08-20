<?
include "../koneksi.php";

$a = mysqli_query("delete  from set_periode where id_periode='$_GET[id]'");

//echo "delete from set_periode where id_periode='$_GET[id]'";
header("location:?page=msetper");
?>