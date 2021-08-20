	<table width="95%" align="center" style='font-size:12.5px;'>
	<?php  
		include "dt/koneksi.php";
		
		$id_dsp=$_GET['id_dsp'];
		$sql = mysqli_query("select * from dsp where tgl_pmbyrn='$tgl_pmbyrn'") or die(mysqli_error()); //memilih data
		$data = mysqli_fetch_array($sql);
	?>	
		<tr>
			<td align="center">Mengetahui,</td>
			<td></td>
			<td align="center">Cilodong, <?php echo $data['tgl_pmbyrn'];?></td>
		</tr>
		<tr align="center">
			<td>Kepala SMK Tunas Bangsa [DECES]</td><td></td><td>Staff TU</td>
		</tr>
		<tr height="40">
			<td></td>
		</tr>
		<tr align="center">
			<td>AMAD SAMRODIN, S.Kom, M.M</td><td><!--Menyetujui--></td><td>SANTI PURNAMASARI, Amd</td>
		</tr>
		<tr align="center">
			<td></td><td><!--Manager Yayasan Pendidikan Sumarno--></td><td></td>
		</tr>
		<tr height="40">
			<td></td>
		</tr>
		<tr align="center">
			<td></td><td><!--YANFA DU'AIN SUMARNO--></td><td></td>
		</tr>
	</table>