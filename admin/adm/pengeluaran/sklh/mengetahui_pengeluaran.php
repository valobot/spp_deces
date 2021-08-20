	<table width="94%" align="center">
	<?php  
		include "dt/koneksi.php";
		
		$id=$_GET['id'];
		$sql = mysqli_query("select * from pengeluaran_sklh where tanggal='$tanggal'") or die(mysqli_error()); //memilih data
		$data = mysqli_fetch_array($sql);
	?>	
		<tr height="10">
			<td></td>
		</tr>
		<tr>
			<td align="center">Mengetahui,</td>
			<td></td>
			<td align="center">Cilodong, <?php echo $data['tanggal'];?></td>
		</tr>
		<tr align="center">
			<td>Kepala SMK Tunas Bangsa [DECES]</td><td></td><td>Kepala SMP Tunas Bangsa [DECES]</td>
		</tr>
		<tr height="50">
			<td></td>
		</tr>
		<tr align="center">
			<td>AMAD SAMRODIN, S.Kom, MM.</td><td></td><td>SUPRIYATI, S.Pd</td>
		</tr>
		</tr>
	</table>