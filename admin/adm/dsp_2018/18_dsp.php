<?php
session_start();
include "dt/koneksi.php";
if(!isset($_SESSION['userid']) and !isset($_SESSION['psw'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>DSP</title>
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

<form action="?page=prosdsp18" method="POST">
<div align="center"><center>
  <table width='600'><tr><td>
	<fieldset ><legend>INPUT DATA DSP 2018/2019</legend>
		<table border='0' width='600'>
			<tr>
				<td width='160'>No. Kwitansi</td><td>:</td>
				<td><input type=text name=kwitansi></td>
			</tr>
			<tr>
				<td>Tgl. Pembayaran</td><td>:</td>
				<td><input type=text id='tgl' name=tgl_pmbyrn size='15' placeholder='dd-mm-yyyy' ></td>
			</tr>
			<tr>
				<td>Nama Calon Siswa</td><td>:</td>
				<td><input type=text name=nm_siswa size='45' required></td>
			</tr>
			<tr>
				<td>Jurusan/Sekolah</td><td>:</td>
				<td><select name='jurusan' required>
						<option value="">-- Pilih --</option>
						<option value="SMP">SMP</option>
						<option value="SMK-TKJ">SMK-TKJ</option>
						<option value="SMK-MULTIMEDIA">SMK-MULTIMEDIA</option>
						<option value="SMK-KEPERAWATAN">SMK-KEPERAWATAN</option>
						<option value="SMK-FARMASI">SMK-FARMASI</option>
						<option value="SMK-ANALIS KESEHATAN">SMK-ANKES</option>
						<option value="SMK-AKUNTANSI">SMK-AKUNTANSI</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah</td><td>:</td>
				<td><input type=text name=jumlah></td>
			</tr>
			<tr>
				<td>Terbilang</td><td>:</td>
				<td><input type=text name=terbilang size='45'></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><textarea name=ket cols='41' rows='1' required></textarea></td>
			</tr>
			<tr><td>
			<tr>
				<td></td>
				<td colspan='3'><input type=submit value=Simpan name=simpan> <input type=reset value=Batal name=batal></td>
			</tr>
		</table>
	 </fieldset>
    </td>
  </tr>
 </table>
 </form>
 

<table width="97%" border='0'>
 <tr>
	<td width='900'><center>
	<fieldset><legend><strong><b>Tabel DSP Calon Siswa 2018-2019</b></strong></legend>
	<table width="95%" border="1" align="center" cellspacing="0">
		<p style="margin-top:5px; margin-button:5px;" align="left">
			<form action="?page=ddcs18" method="POST" name="form1">
				Input : Calon Siswa/i
				<input name="nm_siswa" type="text" id="cari" size="35" placeholder='Masukkan Nama Calon Siswa'>	 
				<input type="submit" name="Submit" value="Tampilkan">
			</form>
		</p>		
		<tr bgcolor="#00FF66" align="center" height="35">
			<th>No</th>
			<th>No. Kwitansi</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Cln Siswa</th>
			<th>Jurusan/Sekolah</th>
			<th width='120'>Jumlah</th>
			<th>Terbilang</th>
			<th>Keterangan</th>
			<th width='100'>Aksi</th>
		</tr>
		<?php 
		include "dt/koneksi.php";
		
		$batas=30; 
		$halaman=$_GET['halaman'];
		$posisi=null;
		if(empty($halaman)){
			$posisi=0;
			$halaman=1;
		}else{
			$posisi=($halaman-1)* $batas;
		}
		$query="select * from dsp_2018 order by id_dsp18 desc limit $posisi,$batas";
		
		$result=mysqli_query($query) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
	?>
	<tr align="" bgcolor="#DFFDD5">
		<td align="center"><?php echo $c=$c+1 ?></td>
		<td align="center"><?php echo $data['kwitansi'] ?></td>
		<td align="center"><?php echo $data['tgl_pmbyrn'] ?></td>
		<td><?php echo $data['nm_siswa'] ?></td>
		<td><?php echo $data['jurusan'] ?></td>
		<td>Rp. <?php echo number_format($data['jumlah']);?>,-</td>
		<td><?php echo $data['terbilang'] ?></td>
		<td><?php echo $data['ket'] ?></td>
		
		<td align="center">
			<a href="?page=editdsp18&&id_dsp18=<?php echo $data['id_dsp18']; ?>"> <img src="images/button-edit.gif" class="preview" title="Edit" width="20" height="20"></img></a> |
			<!--		
			<a href="?page=del&&id_dsp18=<?php echo $data['id_dsp18'];?>" onClick="return confirm('Apakah Anda yakin akan menghapus Data ini ?...')"><img src="images/button-cross.gif" class="preview" title="Hapus" width="20" height="20"></img></a> |
			-->
			<a href="?page=detdsp18&&id_dsp18=<?php echo $data['id_dsp18']; ?>"><img src="images/printer1.png" class="preview" title="Print" width="20" height="25"></img>
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
		$sql_paging = mysqli_query("select id_dsp18 from dsp_2018");
		$jmldata = mysqli_num_rows($sql_paging);
		$jumlah_halaman = ceil($jmldata / $batas);
		
		echo "Halaman :";
		for($i = 1; $i <= $jumlah_halaman; $i++)
			if($i != $halaman) {
				echo "<a href=?page=dsp18&&halaman=$i>&nbsp; $i &nbsp;</a><b>|</b>"; 
			} else {
				echo "<b> $i &nbsp; |</b>";
			}
		?>
		<br>
		Jumlah Calon Siswa Yang telah membayar Saat ini : <?php echo $jmldata;?> Siswa.
		</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>		
