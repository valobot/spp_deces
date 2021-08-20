<?php
	include "dt/koneksi.php";
	$id_tungsmk = $_GET['id_tungsmk'];
	$myquery =  "delete from tgsmk where id_tungsmk ='$id_tungsmk' limit 1"; 
	$hapus = mysql_query($myquery) or die ("gagal menghapus"); 
	header ("location:?page=tungsmk");
 ?>
