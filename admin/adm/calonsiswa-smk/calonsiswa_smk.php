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
	<title>Calon Siswa</title>
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

<form action="?page=prossmk" method="POST">
<div align="center"><center>
  <table width='600'><tr><td>
	<fieldset ><legend>INPUT DATA CALON SISWA SMK TEKNOLOGI</legend>
		<table border='0' width='600'>
			<tr>
				<td width='160'>No. Pendf</td><td>:</td>
				<td><input type=number name=no_pendf></td>
			</tr>
			<tr>
				<td>Tgl. Pendf</td><td>:</td>
				<td><input type=text name=tgl_pendf size='20' placeholder='dd-mm-yyyy' ></td>
			</tr>
			<tr>
				<td>Nama Calon Siswa</td><td>:</td>
				<td><input type=text name=nm_siswa size='50' required></td>
			</tr>
			<tr>
				<td>Tempat Lahir </td><td>:</td>
				<td><input type='text' name='tmp_lhr' required> Tgl.lahir : <input type='text' id='tgl' name='tgl_lhr' size='15' required></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td><td>:</td>
				<td><input type='radio' name='jk' value='Laki-laki' required>Laki-laki <input type='radio' name='jk' value='Perempuan' required>Perempuan
				</td>
			</tr>
			<tr>
				<td>Alamat</td><td>:</td>
				<td><textarea name=alamat cols='38' rows='2' required></textarea></td>
			</tr>
			<tr>
				<td>Telp/HP</td><td>:</td>
				<td><input type=text name=telp size='20' required></td>
			</tr>
			<tr>
				<td>Asal Sekolah</td><td>:</td>
				<td><input type=text name=asal_sekolah size='20' required></td>
			</tr>
			<tr>
				<td>Jurusan</td><td>:</td>
				<td><select name='jurusan' required>
						<option value="" >-Pilih Jurusan-</option>
						<option value="TKJ">TKJ</option>
						<option value="TKR">TKR</option>
						<option value="Akutansi">Akuntansi</option>
						<option value="Multimedia">Multimedia</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Biaya</td><td>:</td>
				<td><input type=text name=biaya value="200.000"></td>
			</tr>
			<tr>
				<td>Pendaftar</td><td>:</td>
				<td><input type=text name=pendaftar size='20'></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><input type=text name=ket value="Pendaftaran Peserta Didik baru Tahun 2017-2018" size='50'></td>
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
 

<table width="85%" border='0'>
 <tr>
	<td width='400'><center>
	<fieldset><legend><strong><b>Tabel  Data Calon Siswa SMK Teknologi</b></strong></legend>
	<table width="1300" border="1" align="center" cellspacing="0">
		<p style="margin-top:5px; margin-button:5px;" align="right">
			<form action="?page=proscari" method="POST" name="form1">
				Input : No. Pendaftaran
				<input name="no_pendf" type="text" id="cari" size="20" maxlength="30">	 
				<input type="submit" name="Submit" value="Tampilkan">
			</form>
		</p>
		<tr bgcolor="#00FF66" align="center" height="35">
			<th>No</th>
			<th>No. Pendf</th>
			<th>Nama Cln Siswa</th>
			<th>Gender</th>
			<th>Alamat</th>
			<th>Telp</th>
			<th>Sekolah</th>
			<th width='100'>Biaya</th>
			<th width='100'>Aksi</th>
		</tr>
		<?php 
		include "dt/koneksi.php";
		
		$batas=10; 
		$halaman=$_GET['halaman'];
		$posisi=null;
		if(empty($halaman)){
			$posisi=0;
			$halaman=1;
		}else{
			$posisi=($halaman-1)* $batas;
		}
		$query="select * from calonsiswa_smk order by no_pendf desc limit $posisi,$batas";
		
		$result=mysqli_query($query) or die(mysqli_error());
		$no=1;
		while($data=mysqli_fetch_array($result)){
	?>
	<tr align="" bgcolor="#DFFDD5">
		<td align="center"><?php echo $c=$c+1 ?></td>
		<td align="center"><?php echo $data['no_pendf'] ?></td>
		<td><?php echo $data['nm_siswa'] ?></td>
		<td><?php echo $data['jk'] ?></td>
		<td><?php echo $data['alamat'] ?></td>
		<td><?php echo $data['telp'] ?></td>
		<td><?php echo $data['jurusan'] ?></td>
		<td>Rp. <?php echo $data['biaya'] ?> ,-</td>
		
		<td align="center">
			<a href="?page=editsmk&&no_pendf=<?php echo $data['no_pendf']; ?>"> <img src="images/button-edit.gif" class="preview" title="Edit" width="20" height="20"></img></a> |
					
			<a href="?page=delsmk&&no_pendf=<?php echo $data['no_pendf'];?>" onClick="return confirm('Apakah Anda yakin akan menghapus Data ini ?...')"><img src="images/button-cross.gif" class="preview" title="Hapus" width="20" height="20"></img></a> |
			
			<a href="?page=detailsmk&&no_pendf=<?php echo $data['no_pendf']; ?>"><img src="images/button-view.gif" class="preview" title="Detail" width="20" height="20"></img>
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
		$sql_paging = mysqli_query("select no_pendf from calonsiswa_smk");
		$jmldata = mysqli_num_rows($sql_paging);
		$jumlah_halaman = ceil($jmldata / $batas);
		
		echo "Halaman :";
		for($i = 1; $i <= $jumlah_halaman; $i++)
			if($i != $halaman) {
				echo "<a href=?page=smk&&halaman=$i>&nbsp; $i &nbsp;</a><b>|</b>"; 
			} else {
				echo "<b> $i &nbsp; |</b>";
			}
		?>
		<br>
		Jumlah Calon Siswa Saat ini : <?php echo $jmldata;?> Siswa.
		</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>		
