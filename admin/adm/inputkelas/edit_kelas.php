<?php  
	include "dt/koneksi.php";
	
	$id_kelas =$_GET['id_kelas'];
	$sql = mysqli_query("select * from kelas where id_kelas = '$id_kelas'") or die(mysqli_error()); //memilih data
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
	$id_kelas =$_POST['id_kelas'];
	$nm_kelas =$_POST['nm_kelas'];
	
	$hasil=mysqli_query("update kelas set nm_kelas='$nm_kelas' where  id_kelas='$id_kelas'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=kls";
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
				<td><input type="text" name="id_kelas" value="<?php echo $data['id_kelas']; ?>">
				</td>
			</tr>
			<tr>
				<td>Nama Kelas</td><td>:</td>
				<td><input type="text" name="nm_kelas" value="<?php echo $data['nm_kelas']; ?>"></td>
			</tr>
			<tr>
				<td colspan="3" align="center" bgcolor="yellow">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=kls"><font size="4" color="blue"><b>[Back]</b></font></a></td>
			</tr>
		</table>
	</form>
</body>
</html>