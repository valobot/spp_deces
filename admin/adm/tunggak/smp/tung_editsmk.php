<?php  
	include "dt/koneksi.php";
	
	$id_tungsmk=$_GET['id_tungsmk'];
	$sql = mysql_query("select * from tgsmk where id_tungsmk='$id_tungsmk'") or die(mysql_error()); //memilih data
	$data = mysql_fetch_array($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Tunggakan</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php 
	if(isset($_POST['edit'])){
	$id_tungsmk=$_POST['id_tungsmk'];
	$tgl=$_POST['tgl'];
	$id =$_POST['id'];
	$id_kelas =$_POST['id_kelas'];
	$id_jrsn =$_POST['id_jrsn'];
	$jenis_tunggak =$_POST['jenis_tunggak'];
	$jumlah =$_POST['jumlah'];
	$ket =$_POST['ket'];
	
	$hasil=mysql_query("update tgsmk set id='$id', id_kelas='$id_kelas', id_jrsn='$id_jrsn', jenis_tunggak='$jenis_tunggak', jumlah='$jumlah', ket='$ket' where id_tungsmk='$id_tungsmk'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=tungsmk";
		</script>
		<?php
	} else {
		echo mysql_error();
	}
}
?>
<form action="" method="post">
	<table width='900'><tr><td>
	<fieldset ><legend align="center">EDIT DATA SISWA</legend>
		<table border='0' width='850'>
			<tr>
				<td>No. Kode</td><td>:</td>
				<td><input type="text" name="id_tungsmk" value="<?php echo $data['id_tungsmk']; ?>">
				</td>
			</tr>
			<tr>
				<td>Tanggal</td><td>:</td>
				<td><input type="text" name="tgl" value="<?php echo $data['tgl']; ?>">
				</td>
			</tr>
			<tr>
				<td>Nama Siswa</td><td>:</td>
				<td><select name="id"> 
						<option value=0 selected>-Pilih-</option> 
						<?php 
							include "dt/koneksi.php";
						
							$q=mysql_query("SELECT * FROM siswa ORDER BY id"); 
							 if ($data[id]==0){
								echo "<option value=0 selected>-Pilih Kelas -</option>";
							  } 
							while ($row1 = mysql_fetch_array($q)){
								if ($data[id]==$row1[id]){
								  echo "<option value=$row1[id] selected>$row1[nama]</option>";
								}
								else{
								  echo "<option value=$row1[id]>$row1[nama]</option>";
								}
							  }
						?> 
					  </select>
				</td>
			</tr>
			<tr>
				<td>Kelas</td><td>:</td>
				<td><select name="id_kelas"> 
					<option value=0 selected>-Pilih-</option> 
					<?php 
						include "dt/koneksi.php";
					
						$q=mysql_query("SELECT * FROM kelas ORDER BY id_kelas"); 
						 if ($data[id_kelas]==0){
							echo "<option value=0 selected>-Pilih Kelas -</option>";
						  } 
						while ($row1 = mysql_fetch_array($q)){
							if ($data[id_kelas]==$row1[id_kelas]){
							  echo "<option value=$row1[id_kelas] selected>$row1[nm_kelas]</option>";
							}
							else{
							  echo "<option value=$row1[id_kelas]>$row1[nm_kelas]</option>";
							}
						  }
					?> 
				  </select>
				</td>
			</tr>
			<tr>
				<td>Jurusan</td><td>:</td>
				<td><select name="id_jrsn"> 
					<option value=0 selected>-Pilih-</option> 
					<?php 
						include "dt/koneksi.php";
					
						$q=mysql_query("SELECT * FROM jurusan ORDER BY id_jrsn"); 
						 if ($data[id_jrsn]==0){
							echo "<option value=0 selected>-Pilih jurusan -</option>";
						  } 
						while ($row1 = mysql_fetch_array($q)){
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
			</tr>
			<tr>
				<td>Jenis Tunggakan</td><td>:</td>
				<td><input type="text" name="jenis_tunggak" value="<?php echo $data['jenis_tunggak']; ?>">
				</td>
			</tr>
			<tr>
				<td>jumlah</td><td>:</td>
				<td><input type='text' name='jumlah' value="<?php echo $data['jumlah']; ?>"></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><input type='text' size='65' name='ket' value="<?php echo $data['ket']; ?>"></td>
			</tr>
			<tr>
				<td colspan="6" align="center" bgcolor="yellow">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=tungsmk"><font size="4" color="blue"><b>[Back]</b></font></a></td>
			</tr>
		</table>
	</form>
	</fieldset>
    </td>
  </tr>
 </table>
</body>
</html>