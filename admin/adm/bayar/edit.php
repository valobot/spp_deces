<?php  
	include ('../koneksi.php');
	
	$no_pendf = @$_GET['no_pendf'];
	$sql = mysqli_query("select * from calonsiswa_smp where no_pendf = '$no_pendf'") or die(mysqli_error()); //memilih data
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
	$no_pendf = @$_POST['no_pendf'];
	$tgl_pendf = @$_POST['tgl_pendf'];
	$nm_siswa = @$_POST['nm_siswa'];
	$tmp_lhr = @$_POST['tmp_lhr'];
	$tgl_lhr = @$_POST['tgl_lhr'];
	$jk = @$_POST['jk'];
	$alamat = @$_POST['alamat'];
	$telp = @$_POST['telp'];
	$asal_sekolah = @$_POST['asal_sekolah'];
	$jurusan = @$_POST['jurusan'];
	$biaya = @$_POST['biaya'];
	$pendaftar = @$_POST['pendaftar'];
	$ket = @$_POST['ket'];	
	
	$hasil=mysqli_query("update calonsiswa_smp set no_pendf='$no_pendf', tgl_pendf='$tgl_pendf', nm_siswa='$nm_siswa', tmp_lhr='$tmp_lhr', tgl_lhr='$tgl_lhr', jk='$jk', alamat='$alamat', telp='$telp', asal_sekolah='$asal_sekolah', jurusan='$jurusan', biaya='$biaya', pendaftar='$pendaftar', ket='$ket' where  no_pendf='$no_pendf'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=smp";
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
				<td bgcolor="#57e7a5"><input type="text" name="no_pendf" value="<?php echo $data['no_pendf']; ?>" size="15"/></td>
			</tr>
			<tr>
				<td>Tgl. Pendf</td><td>:</td>
				<td bgcolor="#57e7a5"><input type="text" name="tgl_pendf" value="<?php echo $data['tgl_pendf']; ?>" size="15"/></td>
			</tr>
			<tr>
				<td>Nama Siswa</td><td>:</td>
				<td><input type="text" name="nm_siswa" value="<?php echo $data['nm_siswa']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Tmp. Lahir</td><td>:</td>
				<td><input type="text" name="tmp_lhr" value="<?php echo $data['tmp_lhr']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Tgl. Lahir</td><td>:</td>
				<td><input type="text" name="tgl_lhr" value="<?php echo $data['tgl_lhr']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Jns Kelamin</td><td>:</td>
				<td><input type="text" name="jk" value="<?php echo $data['jk']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Alamat</td><td>:</td>
				<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Telp/HP</td><td>:</td>
				<td><input type="text" name="telp" value="<?php echo $data['telp']; ?>" size="15"/></td>
			</tr>
			<tr>
				<td>Asal Sekolah</td><td>:</td>
				<td><input type="text" name="asal_sekolah" value="<?php echo $data['asal_sekolah']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Sekolah</td><td>:</td>
				<td bgcolor="#57e7a5"><input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Biaya</td><td>:</td>
				<td>Rp. <input type="" name="biaya" value="<?php echo $data['biaya']; ?>" size="7"/>,-</td>
			</tr>
			<tr>
				<td>Pendaftar</td><td>:</td>
				<td><input type="text" name="pendaftar" value="<?php echo $data['pendaftar']; ?>" size="50"/></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><textarea name="ket" cols="45" rows="2"><?php echo $data['ket']; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="3" align="center">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=smp"><font size="4" color="blue"><button><b>[Back]</b></button></font></a></td>
			</tr>
		</table>
	</form>
	
	</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>