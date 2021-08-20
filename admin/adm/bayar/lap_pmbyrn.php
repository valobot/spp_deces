<html>
<head>
	<title>Pemb_SPP</title>	
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
	<center>
		<a href="javascript:printDiv('div1');"><b> [Cetak]</b></a>
		<a href="?page=spp"><b>[Back]</b></a><br>
	</center>
	<div id="div1" class="font">
	<font size="4"><b>REKAPITULASI PEMBAYARAN SUMBANGAN PENYELENGGARAAN PENDIDIKAN<br> SISWA/I SMP & SMK TUNAS BANGSA DECES<br></font>
	<table border="1" width="94%" align="left">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th>No</th>
			<th width="90">No. Kwitansi</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Siswa/i</th>
			<th>Kelas/Jurusan</th>
			<th>Jenis Pembayaran</th>
			<th width='100'>Harga</th>
			<th colspan="2" width='100'>Dibayar</th>
			<th width='230'>Keterangan</th>
		</tr>

		<?php
		include "../koneksi.php";
		$jumlah_bayar='';
		
		$tgl_byr= $_POST['tgl_byr']; 
		$q = "SELECT * from bayar INNER JOIN siswa ON bayar.id=siswa.id INNER JOIN kelas ON bayar.id_kelas=kelas.id_kelas INNER JOIN jurusan ON bayar.id_jrsn=jurusan.id_jrsn where tgl_byr like '%$tgl_byr%' "; 
		
		$result=mysqli_query($q) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1;?></td>
				<td align="center"><?php echo $data['id_byr'] ?></td>
				<td align="center"><?php echo $data['tgl_byr'] ?></td>
				<td><?php echo $data['nama'] ?></td>
				<td><?php echo $data['nm_kelas'] ?>
					<?php echo $data['nm_jurusan'] ?></td>
				<td><?php echo $data['jenis_bayar'] ?></td>
				<td>Rp. <?php echo number_format($data['harga'])?>,-</td>
				<td width="10">Rp.</td>
				<td align='right'><?php echo number_format($data['jumlah_bayar'])?>,-</td>
				<td><?php echo $data['ket'] ?></td>
			</tr>
		<?php 
			$no++; } ?>
		<tr>
		<td colspan="7" align="right"><b>TOTAL</b></td>
		<td width="10">Rp.</td>
		<td align='right'><?php $jumlahkan = "SELECT SUM(jumlah_bayar) AS total FROM bayar where tgl_byr like '%$tgl_byr%'"; 
			$hasil =@mysqli_query($jumlahkan) or die (mysqli_error());
			$data = mysqli_fetch_array($hasil); 

			echo "<b>" . number_format($data['total']) . ",- </b>";
			?>
		</td>
		<td>
		</td>
	</tr>
	</table>
	<table width="94%" align="center">
		
			<tr>
				<td align="center">Mengetahui,</td>
				<td></td>
				<td align="center">Cilodong, 
					<?php $q = "SELECT * FROM bayar where tgl_byr"; 
					$hasil =@mysqli_query($q) or die (mysqli_error());
					$data = mysqli_fetch_array($hasil); 

					echo "<b>" . ($data['tgl_byr']) . " </b>";
					?>
				</td>
			</tr>
		<tr align="center">
			<td>Kepala SMK Tunas Bangsa [DECES]</td><td></td><td>Kepala SMP Tunas Bangsa [DECES]</td>
		</tr>
		<tr height="40">
			<td></td>
		</tr>
		<tr align="center">
			<td>SYARIF HIDAYATULLAH, S.T</td><td>Menyetujui,</td><td>SUPRIYATI, S.Pd</td>
		</tr>
		<tr align="center">
			<td></td><td>Manager Yayasan Pendidikan Sumarno</td><td></td>
		</tr>
		<tr height="40">
			<td></td>
		</tr>
		<tr align="center">
			<td></td><td>YANFA DU'AIN SUMARNO</td><td></td>
		</tr>
	</table>
	</div>
</body>
</html>