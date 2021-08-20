<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
	<title></title>
	<script type="text/javascript">
		window.setTimeout("waktu()",1000);
		function waktu (){
		var jam = new Date();
		setTimeout("waktu()",1000);
		document.getElementById("waktuku").innerHTML
		= jam.getHours()+":"+jam.getMinutes()+":"+jam.getSeconds();
		}
	</script>
</head>
<body>
	<table>
		<tr>
			<td valign="top" align="center">
				<img src="images/home.png" height="280" width="280">					
			</td>
			<td valign="top"><h2 align="center">SMK TUNAS BANGSA DEPOK</h2>
			  <p align="center"><strong>Sistem Admnistrasi Sekolah (<span class="style1">DECES</span>)</strong></p>
			  <hr />
			  SAS (Sistem Administrasi Sekolah) ini merupakan sebuah aplikasi berbasis web yang dikembangkan oleh A. Samrodin, S.Kom, M.Kom. Aplikasi sekolah ini dibuat dengan tujuan untuk mengelola data akademik sekolah, khususnya pengelolaan Administrasi Keuangan (Pembayaran SPP) bagi siswa.</p>
			  <p align="justify">Dalam Aplikasi SAS ini terdapat proses pengolahan data Pembayaran dimulai dari data Colan Siswa, data mata pelajaran, data Penggajian Guru dan pengolahan lainnya. Beberapa proses pengolahan data dalam Sistem Administrasi Sekolah (SAS) sederhana ini adalah:</p>
			  <ul>
				<li>Data Calon Siswa</li>
				<li>Data Siswa</li>
				<li>Data Biaya</li>
				<li>Data Pembayaran</li>
				<li>Data Pengeluaran</li>
				<li>Laporan Siswa</li>
				<li>Laporan Pemasukan</li>
				<li>Laporan Pengeluaran</li>
			  </ul>
			  <p align="justify">Semoga Bermanfaat bagi petugas Tata Usaha, Petugas Administrasi.<br>
			  Kami masih banyak membutuhkan penyempurnaan sehingga hasil pengembangan dapat lebih sempurna dan komentar silahkan dikirim ke email.</p>
			  <p>Developer,</p>
			  <p><img src="images/icon/ttd.png" width="80" height="90"></img></p>
			  <p><strong>S E M</strong><br />
			    Email : sam@rejocomputer.com, &nbsp;Samrodin.a@gmail.com <br>
				Website : <a href="http://www.rejocomputer.com" target="_blank">sem</a><br />
			   <p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right">
				<!-- Jam -->
				<script> 
				var tod=new Date(); var weekday=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"); 
				var monthname=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
				var y = tod.getFullYear();  var m = tod.getMonth(); var d = tod.getDate(); var dow = tod.getDay(); 
				var dispTime = " " + weekday[dow] + ", " + d + " " + monthname[m] + " " + y + " "; if (dow==0) 
				dispTime= "<font color=red>" + dispTime + "</font>"; else if (dow==5) dispTime= "<font color=green>" + 
				dispTime + "</font>"; else dispTime= "<font color=black>" + dispTime + "</font>";  document.write(dispTime); 
				</script>
				
				<div class="date">
					<div id="waktuku"></div>
				</div>
					<!-- END Jam -->
			</td>
			<td>&nbsp; &nbsp; &nbsp; &nbsp;</td>
		</tr>
	</table>
</body>
</html>