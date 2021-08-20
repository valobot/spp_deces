<?php  
	include ('dt/koneksi.php');
	
	$id_dsp = @$_GET['id_dsp'];
	$sql = mysqli_query("select * from dsp where id_dsp = '$id_dsp'") or die(mysqli_error()); //memilih data
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
	$id_dsp = @$_POST['id_dsp'];
	$tgl_pmbyrn = @$_POST['tgl_pmbyrn'];
	$nm_siswa = @$_POST['nm_siswa'];
	$jurusan = @$_POST['jurusan'];
	$jumlah = @$_POST['jumlah'];
	$terbilang = @$_POST['terbilang'];
	$ket = @$_POST['ket'];	
	
	$hasil=mysqli_query("update dsp set id_dsp='$id_dsp', tgl_pmbyrn='$tgl_pmbyrn', nm_siswa='$nm_siswa', jurusan='$jurusan', jumlah='$jumlah', terbilang='$terbilang', ket='$ket' where  id_dsp='$id_dsp'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=dsp";
		</script>
		<?php
	} else {
		echo mysqli_error();
	}
}
?>
  <table width='70%'  bgcolor="#57e7a5"><tr><td>
    <fieldset ><legend><h2>EDIT DATA</h2></legend>
  
	<form action="" method="post">
		<table width="" align="center">
			<tr>
				<td width="110">No. Pendf</td><td>:</td>
				<td bgcolor="#57e7a5"><input type="text" name="id_dsp" value="<?php echo $data['id_dsp']; ?>" size="15"/></td>
			</tr>
			<tr>
				<td>Tgl. Pembayaran</td><td>:</td>
				<td bgcolor="#57e7a5"><input type="text" name="tgl_pmbyrn" value="<?php echo $data['tgl_pmbyrn']; ?>" size="15"/></td>
			</tr>
			<tr>
				<td>Nama Siswa</td><td>:</td>
				<td><input type="text" name="nm_siswa" value="<?php echo $data['nm_siswa']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Jurusan</td><td>:</td>
				<td><input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Jumlah</td><td>:</td>
				<td><input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>" size="15"/></td>
			</tr>
			<tr>
				<td>Terbilang</td><td>:</td>
				<td><input type="text" name="terbilang" value="<?php echo $data['terbilang']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><textarea name="ket" cols="45" rows="2"><?php echo $data['ket']; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="3" align="center">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=dsp"><font size="4" color="blue" style="border: 2px double gray; background:white;"> &nbsp; Back &nbsp;</font></a></td>
			</tr>
		</table>
	</form>
	
	</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>