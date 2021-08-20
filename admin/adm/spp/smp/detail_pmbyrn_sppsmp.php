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
		<a href="javascript:printDiv('div1');"><b>[Cetak]</b></a>
		<a href="?page=sppsmk"><b>[Back]</b></a><br>
	</center>
	<div id="div1" class="font">
	<font size="4"><b>DETAIL PEMBAYARAN SPP PER-SISWA<br>SISWA/I SMP TUNAS BANGSA DECES<br></font>
	<table border="1" width="94%" align="left">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th>No</th>
			<th width="50">No. Kwitansi</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Siswa/i</th>
			<th>Kelas/Jurusan</th>
			<th>Jenis Pembayaran</th>
			<th width='100'>Harga</th>
			<th colspan="2" width='100'>Dibayar</th>
			<th width='230'>Keterangan</th>
		</tr>

		<?php
		include "dt/koneksi.php";
		$jumlah_bayar='';
		
		$nama= $_POST['nama']; 
		$q = "SELECT * from spp_smp INNER JOIN siswa ON spp_smp.id=siswa.id INNER JOIN kelas ON spp_smp.id_kelas=kelas.id_kelas INNER JOIN jurusan ON spp_smp.id_jrsn=jurusan.id_jrsn where nama like '%$nama%' order by id_sppsmp asc "; 
		
		$result=mysqli_query($q) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1;?></td>
				<td align="center"><?php echo $data['id_sppsmp'] ?></td>
				<td align="center"><?php echo $data['tgl'] ?></td>
				<td><?php echo $data['nama'] ?></td>
				<td align="center"><?php echo $data['nm_kelas'] ?>
					/ <?php echo $data['nm_jurusan'] ?></td>
				<td><?php echo $data['jenis_bayar'] ?></td>
				<td>Rp. <?php echo number_format($data['harga'])?>,-</td>
				<td width="10">Rp.</td>
				<td align='right'><?php echo number_format($data['jumlah_bayar'])?>,-</td>
				<td><?php echo $data['ket'] ?></td>
			</tr>
		<?php 
		$no++; } ?>
	</table>
	</div>
</body>
</html>