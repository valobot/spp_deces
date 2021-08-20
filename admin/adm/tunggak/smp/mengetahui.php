	<table width="94%" align="">
	<?php  
		include "dt/koneksi.php";
		
		$id_sppsmp=$_GET['id_sppsmp'];
		$sql = mysql_query("select * from spp_smp where tgl='$tgl'") or die(mysql_error()); //memilih data
		$data = mysql_fetch_array($sql);
	?>	
		<tr>
			<td></td><td></td>
			<td align="">Cilodong, <?php echo $data['tgl'];?></td>
		</tr>
		<tr>
			<td></td><td></td>
			<td>Mengetahui,</td>
		</tr>
		<tr>
			<td></td><td></td>
			<td>Kepala SMP Tunas Bangsa [DECES]</td>
		</tr>
		<tr height="40">
			<td></td>
		</tr>
		<tr>
			<td></td><td></td>
			<td>SUPRIYATI, S.Pd</td>
		</tr>
	</table>