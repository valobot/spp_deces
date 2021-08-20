<html>
<head>
	<title>Proses cari Siswa</title>
	<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
	<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
	<script type="text/javascript">
		function printDiv(elementId) {
		 var a = document.getElementById('printing-css').value;
		 var b = document.getElementById(elementId).innerHTML;
		 window.frames["print_frame"].document.title = document.title;
		 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
		 window.frames["print_frame"].window.focus();
		 window.frames["print_frame"].window.print();
		}
	</script>
</head>
<body>
	<?php
		include "dt/koneksi.php";
		
		$nama= $_POST['nama']; 
		$query=("SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON siswa.id_jrsn=jurusan.id_jrsn where nama like '%$nama%'");
		
		$result=mysqli_query($query) or die(mysqli_error());
		while($row=mysqli_fetch_array($result)){
		?>
	<table width='87%'>
	<tr align="center">
		<td colspan="3">
			<a href="?page=sis"><button>[Back]</button></a>
			<a href="?page=editsis&&nis=<?php echo $row['nis']; ?>"> <button>[Edit]</button></a>
			<a href="javascript:printDiv('div1');"><button>[Cetak]</button></a>
		</td>
	</tr>
	<tr><td>
	<div id="div1" class="font">
	<fieldset><legend align="center"><b>DETAIL SISWA/I SMP-SMK TB DECES</b></legend>
	<table width="87%">
		<tr>
			<td valign="top" align="center">
				<table>
					<tr>
						<td>Nis</td><td>:<td>
						<td><?php echo $row['nis'] ?></td>
					</tr>
					<tr>
						<td>Nama Siswa</td><td>:<td>
						<td><?php echo $row['nama'] ?></td>
					</tr>
					<tr>
						<td>Kelas</td><td>:<td>
						<td><?php echo $row['nm_kelas'] ?></td>
					</tr>
					<tr>
						<td>Jurusan</td><td>:<td>
						<td><?php echo $row['nm_jurusan'] ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td><td>:<td>
						<td><?php echo $row['jk'] ?></td>
					</tr>
					<tr>
						<td>Agama</td><td>:<td>
						<td><?php echo $row['agama'] ?></td>
					</tr>
					<tr>
						<td>Tempat, Tgl Lahir</td><td>:<td>
						<td><?php echo $row['tmp_lhr'];?>, <?php echo $row['tgl_lhr'];?></td>
					</tr>
					<tr>
						<td>Telephon/HP Siswa</td><td>:<td>
						<td><?php echo $row['telp'];?></td>
					</tr>
					<tr>
						<td>Tahun Ajaran</td><td>:<td>
						<td><?php echo $row['tahun_ajaran'];?></td>
					</tr>
					<tr>
						<td>Alamat</td><td>:<td>
						<td><?php echo $row['alamat'];?></td>
					</tr>
				</table>
			</td>
			<td valign="top" align="center" >
				<table>
					<tr>
						<td>Nama Ayah</td><td>:<td>
						<td><?php echo $row['nm_ayah'] ?></td>
					</tr>
					<tr>
						<td>Nama Ibu</td><td>:<td>
						<td><?php echo $row['nm_ibu'] ?></td>
					</tr>
					<tr>
						<td>Pekerjaan Ayah</td><td>:<td>
						<td><?php echo $row['pekerjaan_ayah'] ?></td>
					</tr>
					<tr>
						<td>Pekerjaan Ibu</td><td>:<td>
						<td><?php echo $row['pekerjaan_ibu'] ?></td>
					</tr>
					<tr>
						<td>Telephon/HP Orang Tua</td><td>:<td>
						<td><?php echo $row['hp'];?></td>
					</tr>
				</table>
			</td>
		</tr>			
		<?php 
			$no++; } ?>
	</table>
		</fieldset>		
	   </td>
	  </tr>
	</table>
	</div>
</body>
</html>