<?php  
	include "dt/koneksi.php";
	
	$id_yps =$_GET['id_yps'];
	$sql = mysqli_query("select * from pengeluaran_yps where id_yps='$id_yps'") or die(mysqli_error()); //memilih data
	$data = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php 
	if(isset($_POST['edit'])){
	$id_yps =$_POST['id_yps'];
	$tanggal =$_POST['tanggal'];
	$uraian =$_POST['uraian'];
	$keterangan =$_POST['keterangan'];
	$jumlah =$_POST['jumlah'];
	
	$hasil=mysqli_query("update pengeluaran_yps set tanggal='$tanggal', uraian='$uraian', keterangan='$keterangan', jumlah='$jumlah' where  id_yps='$id_yps'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=yps";
		</script>
		<?php
	} else {
		echo mysqli_error();
	}
}
?>
	<h1>Edit Data</h1><br/>
	<form action="" method="post">
		<table width="">
			<tr>
				<td>No</td><td>:</td>
				<td><input type="text" name="id_yps" value="<?php echo $data['id_yps']; ?>">
				</td>
			</tr>
			<tr>
				<td>Tanggal</td><td>:</td>
				<td><input type="text" name="tanggal" value="<?php echo $data['tanggal']; ?>"></td>
			</tr>
			<tr>
				<td>Uraian</td><td>:</td>
				<td><input type="text" name="uraian" value="<?php echo $data['uraian']; ?>" size="65"></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><input type="text" name="keterangan" value="<?php echo $data['keterangan']; ?>" size="65"></td>
			</tr>
			<tr>
				<td>Jumlah</td><td>:</td>
				<td><input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>"></td>
			</tr>
			<tr>
				<td colspan="3" align="center" bgcolor="">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=yps"><font size="4" color="blue"><b>[Back]</b></font></a></td>
			</tr>
		</table>
	</form>
</body>
</html>