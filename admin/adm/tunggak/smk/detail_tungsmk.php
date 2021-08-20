<html>
<head>
	<title>tunggakan</title>
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
		<a href="?page=tungsmk"><b>[Back]</b></a><br>
	</center>
	<div id="div1" class="font">
	<font size="4"><b>DATA TUNGGAKAN<br> SISWA/I SMK TUNAS BANGSA (DECES)<br></font>		
	<table border="1" width="95%" align="center">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th>No</th>
			<th>Tgl. Tunggakan</th>
			<th>Nama Siswa/i</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Jenis Tunggakan</th>
			<th>Keterangan</th>
			<th width='100'>Jumlah</th>
		</tr>
			<?php
			include "dt/koneksi.php";
			
			
			$nama= $_POST['nama'];
			$q = "SELECT * from tgsmk INNER JOIN siswa ON tgsmk.id=siswa.id INNER JOIN kelas ON tgsmk.id_kelas=kelas.id_kelas INNER JOIN jurusan ON tgsmk.id_jrsn=jurusan.id_jrsn where nama like '%$nama%'";

			$result=mysql_query($q) or die(mysql_error());		
			while($data=mysql_fetch_array($result)){
			?>
			
			<tr>
				<td align="center"><?php echo $c=$c+1;?></td>
				<td width='100' align="center"><?php echo $data['tgl'] ?></td>
				<td align=""><?php echo $data ['nama']?></td>
				<td width='50' align="center"><?php echo $data ['nm_kelas']?></td>
				<td align="left"><?php echo $data ['nm_jurusan']?></td>
				<td><?php echo $data ['jenis_tunggak'] ?></td>
				<td width='300' align="left"><?php echo $data ['ket']?></td>
				<td width='130' align='right'>Rp. <?php echo number_format ($data ['jumlah']) ;?>,-</td>
			</tr>			
			<?php
			}
			?>
			<tr>
				<td colspan="7" align="right"><b>Jumlah Tunggakan</b></td>
				<td width='130' align='right'>Rp. 
					<?php $jumlahkan = "SELECT SUM(jumlah) AS subtotal FROM tgsmk where id like '%$nama%'"; 
					$hasil =mysql_query($jumlahkan) or die (mysql_error());
					$data = mysql_fetch_array($hasil); 

					echo "<b>" .number_format($data['subtotal']). ",- </b>";
					?>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>

