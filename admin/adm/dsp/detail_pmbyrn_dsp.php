<html>
<head>
	<title>DSP</title>	
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
		<a href="?page=dsp"><b>[Back]</b></a><br>
	</center>
	<div id="div1" class="font">
	<font size="4"><b>DETAIL PEMBAYARAN DSP PER-SISWA<br>SISWA/I SMP-SMK TUNAS BANGSA DECES<br></font>
	<table border="1" width="94%" align="left">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th>No</th>
			<th>No Kwitansi</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Siswa/i</th>
			<th>Jenjang Pend.</th>
			<th>Jumlah</th>
			<th width='230'>Keterangan</th>
		</tr>

		<?php
		include "dt/koneksi.php";
		$jumlah_bayar='';
		
		$nm_siswa= $_POST['nm_siswa']; 
		$q = "SELECT * from dsp where nm_siswa like '%$nm_siswa%' "; 
		
		$result=mysqli_query($q) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1;?></td>
				<td align="center"><?php echo $data['id_dsp'] ?></td>
				<td align="center"><?php echo $data['tgl_pmbyrn'] ?></td>
				<td><?php echo $data['nm_siswa'] ?></td>
				<td align="center"><?php echo $data['jurusan'] ?></td>
				<td align="center">Rp. &nbsp; <?php echo number_format($data['jumlah'])?>,-</td>
				<td><?php echo $data['ket'] ?></td>
			</tr>
		<?php 
		$no++; } ?>
	</table>
	</div>
</body>
</html>