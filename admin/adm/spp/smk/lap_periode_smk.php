<html>
<head>
	<title>Periode</title>
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
		<a href="?page=sppsmk"><b>[Back]</b></a><br>
	</center>
	<div id="div1" class="font">
	<font size="4"><b>REKAPITULASI PEMBAYARAN SUMBANGAN PENYELENGGARAAN PENDIDIKAN<br> SISWA/I SMK TUNAS BANGSA CILODONG (DECES)<br></font>		
	<table border="1" width="95%" align="center">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th>No</th>
			<th width="70">No. Kwitansi</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Siswa/i</th>
			<th width='150'>Kelas/Jurusan</th>
			<th width='120'>Jenis Pembayaran</th>
			<th width='120'>Harga</th>
			<th colspan="2" width='120'>Dibayar</th>
			<th width='200'>Keterangan</th>
		</tr>
			<?php
			include "dt/koneksi.php";
			
			
			$dari= $_POST['dari'];
			$sampai= $_POST['sampai'];
			$q = "SELECT * from spp_smk INNER JOIN siswa ON spp_smk.id=siswa.id INNER JOIN kelas ON spp_smk.id_kelas=kelas.id_kelas INNER JOIN jurusan ON spp_smk.id_jrsn=jurusan.id_jrsn where tgl between '$dari' and '$sampai' order by id_sppsmk asc ";
			
			$result=mysqli_query($q) or die (mysqli_error());
			while($data=mysqli_fetch_object($result)) {
			?>
			
			<tr>
				<td align="center"><?php echo $c=$c+1;?></td>
				<td align="center"><?php echo $data -> id_sppsmk;?></td>
				<td align="center"><?php echo $data -> tgl;?></td>
				<td align=""><?php echo $data -> nama;?></td>
				<td align="left"><?php echo $data -> nm_kelas;?> / <?php echo $data -> nm_jurusan;?></td>
				<td><?php echo $data -> jenis_bayar ;?></td>
				<td>Rp. <?php echo number_format ($data -> harga) ;?>,-</td>
				<td width="10">Rp.</td>
				<td align='right'><?php echo number_format ($data -> jumlah_bayar) ;?>,-</td>
				<td align="center"><?php echo $data -> ket;?></td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td colspan="7" align="right"><b>Jumlah Pemasukan Periode</b></td>
				<td colspan="">Rp. </td>
				<td align='right'><?php $jumlahkan = "SELECT SUM(jumlah_bayar) AS total FROM spp_smk where tgl between '$dari' and '$sampai'"; 
					$hasil =@mysqli_query($jumlahkan) or die (mysqli_error());
					$data = mysqli_fetch_array($hasil); 

					echo "<b>" . number_format($data['total']) . ",- </b>";
					?>
				</td>
				<td><font color="white">.</font></td>
			</tr>
		</table>
	</div>
</body>
</html>

