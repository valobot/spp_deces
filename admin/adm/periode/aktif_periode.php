<?
include "../koneksi.php";

	$id  	= strip_tags($_GET['id']);
	
	$cekaktif = mysqli_query("select * from set_periode where aktivasi='Ya'");
	$hit = mysqli_num_rows($cekaktif);
	if($hit==1){
	$t = mysqli_fetch_array($cekaktif);
	
	//echo $t['id_periode'];
	if($t){
		$a = mysqli_query('UPDATE set_periode
SET aktivasi="Tidak"
WHERE id_periode='.$t['id_periode'].' ');	
	}
	//$upd = mysqli_query("Update * from set_tahun_buku where tb_set_aktif='Ya'");
	}
	$query = sprintf("UPDATE set_periode
SET aktivasi='Ya'
WHERE id_periode='%s'", 
			mysqli_escape_string($id)
		);
		
	$sql = mysqli_query($query);
	header("location:?page=msetper");
?>