<?php  
	include "dt/koneksi.php";
	
	$nis=$_GET['nis'];
	$sql = mysqli_query("select * from siswa where nis='$nis'") or die(mysqli_error()); //memilih data
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
	$id=$_POST['id'];
	$nis=$_POST['nis'];
	$nama =$_POST['nama'];
	$id_kelas =$_POST['id_kelas'];
	$id_jrsn =$_POST['id_jrsn'];
	$jk =$_POST['jk'];
	$agama =$_POST['agama'];
	$tmp_lhr =$_POST['tmp_lhr'];
	$tgl_lhr =$_POST['tgl_lhr'];
	$telp =$_POST['telp'];
	$nm_ayah =$_POST['nm_ayah'];
	$nm_ibu =$_POST['nm_ibu'];
	$pekerjaan_ayah =$_POST['pekerjaan_ayah'];
	$pekerjaan_ibu =$_POST['pekerjaan_ibu'];
	$hp =$_POST['hp'];
	$alamat =$_POST['alamat'];
	$tahun_ajaran =$_POST['tahun_ajaran'];
	
	$hasil=mysqli_query("update siswa set nama='$nama', id_kelas='$id_kelas', id_jrsn='$id_jrsn', jk='$jk', agama='$agama', tmp_lhr='$tmp_lhr', tgl_lhr='$tgl_lhr', telp='$telp', nm_ayah='$nm_ayah', nm_ibu='$nm_ibu',pekerjaan_ayah='$pekerjaan_ayah', pekerjaan_ibu='$pekerjaan_ibu', hp='$hp', alamat='$alamat', tahun_ajaran='$tahun_ajaran' where  nis='$nis'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=sis";
		</script>
		<?php
	} else {
		echo mysqli_error();
	}
}
?>
<form action="" method="post">
	<table width='800'><tr><td>
	<fieldset ><legend align="center">EDIT DATA SISWA</legend>
		<table border='0' width='750'>
			<tr>
				<td>NIS</td><td>:</td>
				<td><input type="text" name="nis" value="<?php echo $data['nis']; ?>">
				</td>
				
				<td>Tlp/HP Siswa</td><td>:</td>
				<td><input type="text" name="telp" value="<?php echo $data['telp']; ?>">
				</td>
			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
				
				<td>Nama Ayah</td><td>:</td>
				<td><input type="text" name="nm_ayah" value="<?php echo $data['nm_ayah']; ?>">
				</td>
			</tr>
			<tr>
				<td>Kelas</td><td>:</td>
				<td><select name="id_kelas"> 
					<option value=0 selected>-Pilih-</option> 
					<?php 
						include "dt/koneksi.php";
					
						$q=mysqli_query("SELECT * FROM kelas ORDER BY id_kelas"); 
						 if ($data[id_kelas]==0){
							echo "<option value=0 selected>-Pilih Kelas -</option>";
						  } 
						while ($row1 = mysqli_fetch_array($q)){
							if ($data[id_kelas]==$row1[id_kelas]){
							  echo "<option value=$row1[id_kelas] selected>$row1[nm_kelas]</option>";
							}
							else{
							  echo "<option value=$row1[id_kelas]>$row1[nm_kelas]</option>";
							}
						  }
					?> 
				  </select>
				
				<td>Nama Ibu</td><td>:</td>
				<td><input type="text" name="nm_ibu" value="<?php echo $data['nm_ibu']; ?>">
				</td>
			</tr>
			<tr>
				<td>Jurusan</td><td>:</td>
				<td><select name="id_jrsn"> 
					<option value=0 selected>-Pilih-</option> 
					<?php 
						include "dt/koneksi.php";
					
						$q=mysqli_query("SELECT * FROM jurusan ORDER BY id_jrsn"); 
						 if ($data[id_jrsn]==0){
							echo "<option value=0 selected>-Pilih jurusan -</option>";
						  } 
						while ($row1 = mysqli_fetch_array($q)){
							if ($data[id_jrsn]==$row1[id_jrsn]){
							  echo "<option value=$row1[id_jrsn] selected>$row1[nm_jurusan]</option>";
							}
							else{
							  echo "<option value=$row1[id_jrsn]>$row1[nm_jurusan]</option>";
							}
						  }
					?> 
				  </select>
				</td>
		
				<td>Pekerjaan Ayah</td><td>:</td>
				<td><input type="text" name="pekerjaan_ayah" value="<?php echo $data['pekerjaan_ayah']; ?>">
				</td>
			</tr>
			<tr>
				<td>Jen Kel</td><td>:</td>
				<td><input type="text" name="jk" value="<?php echo $data['jk']; ?>">
				</td>
				
				<td>Pekerjaan Ibu</td><td>:</td>
				<td><input type="text" name="pekerjaan_ibu" value="<?php echo $data['pekerjaan_ibu']; ?>">
				</td>
			</tr>
			<tr>
				<td>Agama</td><td>:</td>
				<td><input type="text" name="agama" value="<?php echo $data['agama']; ?>">
				</td>
				
				<td>Telp Ortu</td><td>:</td>
				<td><input type="text" name="hp" value="<?php echo $data['hp']; ?>">
				</td>
			</tr>
			<tr>
				<td>Alamat</td><td>:</td>
				<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>">
				</td>
				
				<td>Tahun Ajaran</td><td>:</td>
				<td><input type="text" name="tahun_ajaran" value="<?php echo $data['tahun_ajaran']; ?>">
				</td>
			</tr>
			<tr>
				<td>Tmpt & Tgl. Lhr</td><td>:</td>
				<td><input type="text" name="tmp_lhr" value="<?php echo $data['tmp_lhr']; ?>">,<input type="text" name="tgl_lhr" value="<?php echo $data['tgl_lhr']; ?>">
				</td>
			</tr>
			
			<tr>
				<td colspan="6" align="center" bgcolor="yellow">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=sis"><font size="4" color="blue"><b>[Back]</b></font></a></td>
			</tr>
		</table>
	</form>
	</fieldset>
    </td>
  </tr>
 </table>
</body>
</html>