<?php  
	include "dt/koneksi.php";
	
	$id_jrsn =$_GET['id_jrsn'];
	$sql = mysqli_query("select * from jurusan where id_jrsn='$id_jrsn'") or die(mysqli_error()); //memilih data
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
	$id_jrsn =$_POST['id_jrsn'];
	$nm_jurusan =$_POST['nm_jurusan'];
	
	$hasil=mysqli_query("update jurusan set nm_jurusan='$nm_jurusan' where  id_jrsn='$id_jrsn'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=jrsn";
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
				<td><input type="text" name="id_jrsn" value="<?php echo $data['id_jrsn']; ?>">
				</td>
			</tr>
			<tr>
				<td>Nama Kelas</td><td>:</td>
				<td><input type="text" name="nm_jurusan" value="<?php echo $data['nm_jurusan']; ?>"></td>
			</tr>
			<tr>
				<td colspan="3" align="center" bgcolor="yellow">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=jrsn"><font size="4" color="blue"><b>[Back]</b></font></a></td>
			</tr>
		</table>
	</form>
</body>
</html>