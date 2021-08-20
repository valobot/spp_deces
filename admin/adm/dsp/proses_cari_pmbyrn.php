<html>
<head>
	<title>DSP</title>
	<script language="JavaScript">
	var gAutoPrint = true; // Tells whether to automatically call the print function

	function printSpecial()
	{
	if (document.getElementById != null)
	{
	var html = '<HTML>\n<HEAD>\n';

	if (document.getElementsByTagName != null)
	{
	var headTags = document.getElementsByTagName("head");
	if (headTags.length > 0)
	html += headTags[0].innerHTML;
	}

	html += '\n</HE>\n<BODY>\n';

	var printReadyElem = document.getElementById("printReady");

	if (printReadyElem != null)
	{
	html += printReadyElem.innerHTML;
	}
	else
	{
	alert("Could not find the printReady function");
	return;
	}

	html += '\n</BO>\n</HT>';

	var printWin = window.open("","printSpecial");
	printWin.document.open();
	printWin.document.write(html);
	printWin.document.close();
	if (gAutoPrint)
	printWin.print();
	}
	else
	{
	alert("The print ready feature is only available if you are using an browser. Please update your browswer.");
	}
	}
	</script>
</head>
<body>
	<center>
		<p align="center"><a href="javascript:void(printSpecial())"><button>Catak</button></a>
		<a href="?page=dsp"><b>[Back]</b></a>
	</center>
	<div id="printReady">
	<table align="center" width="95%">
		<tr>
			<td align="left">
				<font size="4"><b>REKAPITULASI PEMBAYARAN DANA SUMBANGAN PENDIDIKAN (DSP)<br>
				CALON SISWA/I SMP & SMK TUNAS BANGSA CILODONG (DECES)</font>
			</td>
		</tr>
	</table>
	<table border="1" width="95%" style='font-size:12.5px;'>
		<tr bgcolor="#00FF66" align="center" height="40">
			<th>No</th>
			<th>No. Kwitansi</th>
			<th>Tgl. Pembayran</th>
			<th>Nama Cln Siswa</th>
			<th>Jurusan</th>
			<th colspan="2" width="100">Jumlah</th>
			<th>Keterangan</th>
		</tr>

		<?php
		include "dt/koneksi.php";
		$jumlah='';
		
		$tgl_pmbyrn= $_POST['tgl_pmbyrn']; 
		$q = "SELECT * from dsp where tgl_pmbyrn like '%$tgl_pmbyrn%' "; 
		
		$result=mysqli_query($q) or die(mysqli_error());
		
		while($row=mysqli_fetch_array($result)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1;?></td>
				<td align="center"><?php echo $row['id_dsp'] ?></td>
				<td align="center"><?php echo $row['tgl_pmbyrn'] ?></td>
				<td><?php echo $row['nm_siswa'] ?></td>
				<td><?php echo $row['jurusan'] ?></td>
				<td>Rp. </td>
				<td width="120" align='right'><?php echo number_format($row['jumlah']) ?> ,-</td>	
				<td width="430"><?php echo $row['ket'] ?></td>
			</tr>
		<?php 
			$no++; } ?>
		<tr>
		<td colspan="5" align="right"><b>JUMLAH PEMASUKAN HARI INI</b></td>
		<td colspan="">Rp. </td>
		<td align='right'><?php $jumlahkan = "SELECT SUM(jumlah) AS total FROM dsp where tgl_pmbyrn like '%$tgl_pmbyrn%'"; 
			$hasil =@mysqli_query($jumlahkan) or die (mysqli_error());
			$row = mysqli_fetch_array($hasil); 

			echo "<b>" . number_format($row['total']) . " ,-";
			?>
		</td>
		<td><font color="white">.</font>
		</td>
	</tr>
	</table>
	<?php include "mengetahui-dsp.php"; ?>
	</div>
</body>
</html>