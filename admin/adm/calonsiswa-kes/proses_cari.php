<html>
<head>
	<title>Calon Siswa</title>
</head>
<body>
	<table align="center" width="97%">
		<tr>
			<td align="left">
				<font size="4"><b>DATA CALON SISWA<br></font>
			</td>
		</tr>
	</table>
	<table border="1" width="97%">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th>No</th>
			<th>No. Pendf</th>
			<th>Nama Cln Siswa</th>
			<th>Gender</th>
			<th>Alamat</th>
			<th>Telp</th>
			<th>Jurusan</th>
			<th>Biaya</th>
			<th width='60'>Aksi</th>
		</tr>

		<?php
		include "dt/koneksi.php";
		
		$no_pendf= $_POST['no_pendf']; 
		$q = "SELECT * from calonsiswa_kes where no_pendf like '%$no_pendf%' "; 
		
		$result=mysqli_query($q) or die(mysqli_error());
		
		while($row=mysqli_fetch_array($result)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1;?></td>
				<td align="center"><?php echo $row['no_pendf'] ?></td>
				<td><?php echo $row['nm_siswa'] ?></td>
				<td><?php echo $row['jk'] ?></td>
				<td><?php echo $row['alamat'] ?></td>
				<td><?php echo $row['telp'] ?></td>
				<td><?php echo $row['jurusan'] ?></td>
				<td>Rp. <?php echo $row['biaya'] ?> ,-</td>		
				
				<td align="center">					
					<a href="?page=detailkes&&no_pendf=<?php echo $row['no_pendf']; ?>"><img src="images/button-view.gif" class="preview" title="Detail" width="20" height="20"></img></a>
				</td>
			</tr>
		<?php
		$no++;
		}
		?>
	</table>
</body>
</html>