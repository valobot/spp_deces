<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>bayar</title>
	<link rel="stylesheet" type="text/css" href="css-tgl/ui.all.css" />
    <script src="js-tgl/jquery-1.8.0.min.js"></script>
    <script src="js-tgl/ui.core.js"></script>
    <script src="js-tgl/ui.datepicker.js"></script>
    <script src="js-tgl/ui.datepicker-id.js"></script>
	<script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $("#tgl").datepicker({
          changeMonth : true,
          changeYear : true,
          yearRange : '-34:+5'
        });
      });
    </script>
    
    <script language='javascript'>
     function validAngka(a)
     {
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
    }
    </script>
</head>
<body>
	<?php
		include "dt/koneksi.php";
			
		$nis= $_POST['nis']; 
		$query=("SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON siswa.id_jrsn=jurusan.id_jrsn where nis like '%$nis%'");
					
		$result=mysqli_query($query) or die(mysqli_error());
		while($row=mysqli_fetch_array($result)){
		
	?>

<form action="?page=prosppsmk" method="POST">
<div align="center">
  <table width='600'><tr><td>
	<fieldset ><legend>INPUT PEMBAYARAN SPP SMK</legend>
		<table border='0' width='600'>
			
			<tr>
				<td>Nama Siswa</td><td>:</td>
				<td>
					<?php echo $row['nama']; ?>
					<input size='5' align='center' type='text' name='id' value="<?php echo $row['id']; ?>">
				</td>
			</tr>
			<tr>
				<td>Kelas</td><td>:</td>
				<td>
					<?php echo $row['nm_kelas']; ?>
					<input size='5' type='text' name='id_kelas' value="<?php echo $row['id_kelas']; ?>">
				</td>
			</tr>
			<tr>
				<td>Jurusan</td><td>:</td>
				<td>
					<?php echo $row['nm_jurusan']; ?>
					<input size='5' type='text' name='id_jrsn' value="<?php echo $row['id_jrsn']; ?>">
				</td>
			</tr>
			<tr>
				<td>Jenis Pembayaran</td><td>:</td>
				<td><select name='jenis_bayar' required>
						<option value="">-** Pilih **-</option>
						<option value="SPP Januari">SPP Januari</option>
						<option value="SPP Februari">SPP Februari</option>
						<option value="SPP Maret">SPP Maret</option>
						<option value="SPP April">SPP April</option>
						<option value="SPP Mei">SPP Mei</option>
						<option value="SPP Juni">SPP Juni</option>
						<option value="SPP Juli">SPP Juli</option>
						<option value="SPP Agustus">SPP Agustus</option>
						<option value="SPP September">SPP September</option>
						<option value="SPP Oktober">SPP Oktober</option>
						<option value="SPP November">SPP November</option>
						<option value="SPP Desember">SPP Desember</option>
						<option value="MID Smt Ganjil">MID Smt Ganjil</option>
						<option value="Smt Ganjil">Smt Ganjil</option>
						<option value="MID Smt Genap">MID Smt Genap</option>
						<option value="Smt Genap">Smt Genap</option>
						<option value="Daftar Ulang">Daftar Ulang</option>
						<option value="Prakerin">Prakerin</option>
						<option value="DSP">DSP</option>
						<option value="Ujian">Ujian</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Harga</td><td>:</td>
				<td><select name='harga' required>
						<option value="">-** Pilih **-</option>
						<option value="250000">Rp. 250.000</option>
						<option value="475000">Rp. 475.000</option>
						<option value="500000">Rp. 500.000</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Dibayar</td><td>:</td>
				<td><input type=text name=jumlah_bayar></td>
			</tr>
			<tr>
				<td>Terbilang</td><td>:</td>
				<td><input type=text name='terbilang' size='65'></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><textarea name=ket cols='41' rows='1' required></textarea></td>
			</tr>
			<tr><td>
			<tr>
				<td></td>
				<td colspan='3'><input type=submit value='Simpan' name='simpan'><button><a href="?page=sppsmk"><button>Batal</button></a></td>
			</tr>
			<?php 
			$no++; } ?>
		</table>
	 </fieldset>
    </td>
  </tr>
 </table>
 </form>
</body>
</html>		
