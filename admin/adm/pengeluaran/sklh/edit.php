<?php  
	include "dt/koneksi.php";
	
	$id =$_GET['id'];
	$sql = mysqli_query("select * from pengeluaran_sklh where id='$id'") or die(mysqli_error()); //memilih data
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
	$id =$_POST['id'];
	$tanggal =$_POST['tanggal'];
	$uraian =$_POST['uraian'];
	$keterangan =$_POST['keterangan'];
	$jumlah =$_POST['jumlah'];
	
	$hasil=mysqli_query("update pengeluaran_sklh set tanggal='$tanggal', uraian='$uraian', keterangan='$keterangan', jumlah='$jumlah' where  id='$id'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=sklh";
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
				<td><input type="text" name="id" value="<?php echo $data['id']; ?>">
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
				<a href="?page=sklh"><font size="4" color="blue"><b>[Back]</b></font></a></td>
			</tr>
		</table>
	</form>
</body>
</html>