<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['nama']) and !isset($_SESSION['pass'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}
?>

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

<form action="?page=prosspp" method="POST">
<div align="center">
  <table width='600'><tr><td>
	<fieldset ><legend>INPUT PEMBAYARAN SPP</legend>
		<table border='0' width='600'>
			<tr>
				<td>Nama Siswa</td><td>:</td>
				<td><select name="id">
					<option>-** Pilih **-</option>
					<?php
					include "../koneksi.php";
					$query = mysqli_query("select * from siswa");
					while($row = mysqli_fetch_array($query)){?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['nama'];?></option>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Kelas</td><td>:</td>
				<td><select name="id_kelas">
					<option>-** Pilih **-</option>
					<?php
					include "../koneksi.php";
					$query = mysqli_query("select * from kelas");
					while($row = mysqli_fetch_array($query)){?>
					<option value="<?php echo $row['id_kelas'];?>"><?php echo $row['nm_kelas'];?></option>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Jurusan</td><td>:</td>
				<td><select name="id_jrsn">
					<option>-** Pilih **-</option>
					<?php
					include "../koneksi.php";
					$query = mysqli_query("select * from jurusan");
					while($row = mysqli_fetch_array($query)){?>
					<option value="<?php echo $row['id_jrsn'];?>"><?php echo $row['nm_jurusan'];?></option>
					<?php } ?>
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
						<option value="475000">475000</option>
						<option value="500000">500000</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Dibayar</td><td>:</td>
				<td><input type=text name=jumlah_bayar></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><textarea name=ket cols='41' rows='1' required></textarea></td>
			</tr>
			<tr><td>
			<tr>
				<td></td>
				<td colspan='3'><input type=submit value='Simpan' name='simpan'> <input type=reset value=Batal name=batal></td>
			</tr>
		</table>
	 </fieldset>
    </td>
  </tr>
 </table>
 </form>
 

<table width="97%" border='0'>
 <tr>
	<td><center>
	<fieldset><legend><strong><b>Data Pembayaran Siswa </b></strong></legend>
	<table width="96%" border="1" align="center" cellspacing="0">
		<p style="margin-top:5px; margin-button:5px;" align="right">
			<form action="?page=ctkkwitansi" method="POST" name="form1">
				Input : Tgl. Pembayaran
				<input name="tgl_byr" type="text" id="cari" size="20" maxlength="30">
				&nbsp; sampai
				<input name="tgl_byr" type="text" id="cari" size="20" maxlength="30">	 
				<input type="submit" name="Submit" value="Tampilkan">
			</form>
		</p>
		<tr bgcolor="#00FF66" align="center" height="35">
			<th>No</th>
			<th>No. Kwitansi</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Siswa/i</th>
			<th>Kelas/Jurusan</th>
			<th>Jenis Pembayaran</th>
			<th width='100'>Harga</th>
			<th width='100'>Dibayar</th>
			<th>Keterangan</th>
			<th width='85'>Aksi</th>
		</tr>
		<?php 
		include "../koneksi.php";
		
		$batas=10; 
		$halaman=$_GET['halaman'];
		$posisi=null;
		if(empty($halaman)){
			$posisi=0;
			$halaman=1;
		}else{
			$posisi=($halaman-1)* $batas;
		}
		$query="select * from bayar INNER JOIN siswa ON bayar.id=siswa.id INNER JOIN kelas ON bayar.id_kelas=kelas.id_kelas INNER JOIN jurusan ON bayar.id_jrsn=jurusan.id_jrsn order by id_byr desc limit $posisi,$batas";
		
		$result=mysqli_query($query) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
	?>
	<tr align="" bgcolor="#DFFDD5">
		<td align="center"><?php echo $c=$c+1 ?></td>
		<td align="center"><?php echo $data['id_byr'] ?></td>
		<td align="center"><?php echo $data['tgl_byr'] ?></td>
		<td><?php echo $data['nama'] ?></td>
		<td><?php echo $data['nm_kelas'] ?>
			<?php echo $data['nm_jurusan'] ?></td>
		<td><?php echo $data['jenis_bayar'] ?></td>
		<td>Rp. <?php echo number_format($data['harga'])?>,-</td>
		<td>Rp. <?php echo number_format($data['jumlah_bayar'])?>,-</td>
		<td><?php echo $data['ket'] ?></td>
		
		<td align="center">
			<a href="?page=editspp&&id_byr=<?php echo $data['id_byr']; ?>"> <img src="images/button-edit.gif" class="preview" title="Edit" width="20" height="20"></img></a> |
					
			<a href="?page=del&&id_byr=<?php echo $data['id_byr'];?>" onClick="return confirm('Apakah Anda yakin akan menghapus Data ini ?...')"><img src="images/button-cross.gif" class="preview" title="Hapus" width="20" height="20"></img></a> |
			
			<a href="?page=ctkkwitansi&&id_byr=<?php echo $data['id_byr']; ?>"><img src="images/printer1.png" class="preview" title="Print" width="20" height="25"></img>
		</td>
	</tr>
	<?php 
	$no++; 
	}
	?>
	</table>
	<br>
	<?php		
	//=============PAGING ========================
		$sql_paging = mysqli_query("select id_byr from bayar");
		$jmldata = mysqli_num_rows($sql_paging);
		$jumlah_halaman = ceil($jmldata / $batas);
		
		echo "Halaman :";
		for($i = 1; $i <= $jumlah_halaman; $i++)
			if($i != $halaman) {
				echo "<a href=?page=spp&&halaman=$i>&nbsp; $i &nbsp;</a><b>|</b>"; 
			} else {
				echo "<b> $i &nbsp; |</b>";
			}
		?>
		<br>
		Jumlah Siswa/i yang telah membayar Saat ini : <?php echo $jmldata;?> Siswa.
		</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>		
