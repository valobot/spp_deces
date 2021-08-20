<html>
<head>
	<title>Lap Sklh</title>
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
		<a href="?page=lapsklh"><b>[Back]</b></a>
	</center>
	<div id="printReady" class="font">
	<table align="center" width="87%">
		<tr>
			<td align="left">
				<font size="4"><b>LAPORAN PENGELUARAN SEKOLAH SMP-SMK TUNAS BANGSA DEPOK<br></font>
			</td>
		</tr>
	</table>
	<table border="1" width="87%">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th width="40">No.</th>
			<th width="120">Tgl. Pengeluaran</th>
			<th>URAIAN</th>
			<th>KETERANGAN</th>
			<th colspan="2">JUMLAH</th>
		</tr>

		<?php
		include "dt/koneksi.php";
		$jumlah='';
		$total1='';
		
		$tanggal= $_POST['tanggal']; 
		$q = "SELECT * from pengeluaran_sklh where tanggal like '%$tanggal%' "; 
		
		$result=mysqli_query($q) or die(mysqli_error());
		while($row=mysqli_fetch_array($result)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1 ?></td>
				<td align="center"><?php echo $row['tanggal'] ?></td>
				<td><?php echo $row['uraian'] ?></td>
				<td><?php echo $row['keterangan'] ?></td>
				<td width="20">Rp.</td>
				<td width="130" align=right><?php echo number_format($row['jumlah'])?>,-</td>
			</tr>
		<?php 
			$no++; } ?>
		<tr>
		<td colspan="4" align="right"><b>TOTAL</b></td>
		<td colspan="">Rp. </td>
		<td align='right'><?php $jumlahkan = "SELECT SUM(jumlah) AS total1 FROM pengeluaran_sklh where tanggal like '%$tanggal%'"; 
			$hasil =@mysqli_query($jumlahkan) or die (mysqli_error());
			$row = mysqli_fetch_array($hasil); 
			
			$total_pengeluaran_sklh = $row['total1'];

			echo "<b>" . number_format($row['total1']) . ",- </b>";
			?>
		</td>
	</tr>
	</table>
	<table>
	</table>
	<!--Batas-->
	<br>
	<table align="center" width="87%">
		<tr>
			<td align="left">
				<font size="4"><b>LAPORAN PENGELUARAN YAYASAN PENDIDIKAN SUMARNO<br></font>
			</td>
		</tr>
	</table>
	<table border="1" width="87%">
		<tr bgcolor="#00FF66" align="center" height="40">
			<th width="40">No.</th>
			<th width="120">Tgl. Pengeluaran</th>
			<th>URAIAN</th>
			<th>KETERANGAN</th>
			<th colspan="2">JUMLAH</th>
		</tr>

		<?php
		include "dt/koneksi.php";
		$jumlah='';
		$total1='';
		$subtotal='$total1+$total';
		
		$tanggal= $_POST['tanggal']; 
		$q = "SELECT * from pengeluaran_yps where tanggal like '%$tanggal%' "; 
		
		$result=mysqli_query($q) or die(mysqli_error());
		while($row=mysqli_fetch_array($result)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1 ?></td>
				<td align="center"><?php echo $row['tanggal'] ?></td>
				<td><?php echo $row['uraian'] ?></td>
				<td><?php echo $row['keterangan'] ?></td>
				<td width="20">Rp.</td>
				<td width="130" align=right><?php echo number_format($row['jumlah'])?>,-</td>
			</tr>
		<?php 
			$no++; } ?>
		<tr>
			<td colspan="4" align="right"><b>TOTAL</b></td>
			<td colspan="">Rp. </td>
			<td align='right'><?php $jumlahkan = "SELECT SUM(jumlah) AS total1 FROM pengeluaran_yps where tanggal like '%$tanggal%'"; 
				$hasil =@mysqli_query($jumlahkan) or die (mysqli_error());
				$row = mysqli_fetch_array($hasil); 
				
				$total_pengeluaran_yps = $row['total1'];

				echo "<b>" . number_format($row['total1']) . ",- </b>";
				?>
			</td>
		</tr>
		<tr>
			<td colspan="4" align="right"><b>SUBTOTAL</b></td>
			<td colspan="">Rp. </td>
			<td align='right'><?php $jumlahkan="SELECT SUM(total+total1) AS subtotal FROM pengeluaran_sklh, pengeluaran_yps"; 
				$hasil =@mysqli_query($jumlahkan) or die (mysqli_error());
				$row = mysqli_fetch_array($hasil); 

				echo "<b>" . number_format($total_pengeluaran_sklh + $total_pengeluaran_yps) . ",- </b>";
				?>
			</td>
		</tr>		
	</table>
	<?php include "mengetahui_pengeluaran.php"; ?>
	</div>
</body>
</html>