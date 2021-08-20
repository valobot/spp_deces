	<table width="94%" align="">
	<?php  
		include "dt/koneksi.php";
		
		$id_sppsmk=$_GET['id_sppsmk'];
		$sql = mysqli_query("select * from spp_smk where tgl='$tgl'") or die(mysqli_error()); //memilih data
		$data = mysqli_fetch_array($sql);
	?>	
		<tr>
			<td>Cilodong, <?php echo $data['tgl'];?></td>
		</tr>
		<tr>
			<td>Mengetahui,</td>
		</tr>
		<tr>
			<td>Kepala SMK Tunas Bangsa [DECES]</td>
		</tr>
		<tr height="40">
			<td></td>
		</tr>
		<tr>
			<td>AMAD SAMRODIN, S.Kom, MM.</td>
		</tr>
	</table>