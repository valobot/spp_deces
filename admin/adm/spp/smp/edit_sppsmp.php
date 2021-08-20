<?php  
	include "dt/koneksi.php";
	
	$id_sppsmp=$_GET['id_sppsmp'];
	$sql = mysqli_query("select * from spp_smp where id_sppsmp='$id_sppsmp'") or die(mysqli_error()); //memilih data
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
	$id_sppsmp=$_POST['id_sppsmp'];
	$tgl=$_POST['tgl'];
	$id =$_POST['id'];
	$id_kelas =$_POST['id_kelas'];
	$id_jrsn =$_POST['id_jrsn'];
	$jenis_bayar =$_POST['jenis_bayar'];
	$harga =$_POST['harga'];
	$jumlah_bayar =$_POST['jumlah_bayar'];
	$total =$_POST['total'];
	$terbilang =$_POST['terbilang'];
	$ket =$_POST['ket'];
	
	$hasil=mysqli_query("update spp_smp set tgl='$tgl', id='$id', id_kelas='$id_kelas', id_jrsn='$id_jrsn', jenis_bayar='$jenis_bayar', harga='$harga', jumlah_bayar='$jumlah_bayar', total='$total', terbilang='$terbilang', ket='$ket' where id_sppsmp='$id_sppsmp'");
	if ($hasil) {
		?>
		<script type="text/javascript">
		
		window.location.href="?page=sppsmp";
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
				<td>No. Kwitansi</td><td>:</td>
				<td><input type="text" name="id_sppsmp" value="<?php echo $data['id_sppsmp']; ?>">
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
						
							$q=mysqli_query("SELECT * FROM siswa ORDER BY id"); 
							 if ($data[id]==0){
								echo "<option value=0 selected>-Pilih Kelas -</option>";
							  } 
							while ($row1 = mysqli_fetch_array($q)){
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
				</td>
			</tr>
			<tr>
				<td>Jenis Pembayaran</td><td>:</td>
				<td><input type="text" name="jenis_bayar" value="<?php echo $data['jenis_bayar']; ?>">
				</td>
			</tr>
			<tr>
				<td>Harga</td><td>:</td>
				<td><input type='text' name='harga' value="<?php echo $data['harga']; ?>"></td>
			</tr>
			<tr>
				<td>Dibayar</td><td>:</td>
				<td><input type='text' name='jumlah_bayar' value="<?php echo $data['jumlah_bayar']; ?>"></td>
			</tr>
			<tr>
				<td>Terbilang</td><td>:</td>
				<td><input type=text name='terbilang' size='65' value="<?php echo $data['terbilang']; ?>"></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><input type='text' name='ket' value="<?php echo $data['ket']; ?>"></td>
			</tr>
			<tr>
				<td colspan="6" align="center" bgcolor="yellow">
				<input type="submit" name="edit"  value="Update">
				<a href="?page=sppsmp"><font size="4" color="blue"><b>[Back]</b></font></a></td>
			</tr>
		</table>
	</form>
	</fieldset>
    </td>
  </tr>
 </table>
</body>
</html>