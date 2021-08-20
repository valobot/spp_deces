<?php
include "dt/koneksi.php";

if(isset($_POST['tambah'])){
	$nis = @$_POST['nis'];
	$nama = @$_POST['nama'];
	$id_kelas = @$_POST['id_kelas'];
	$id_jrsn = @$_POST['id_jrsn'];
	$jk = @$_POST['jk'];
	$agama = @$_POST['agama'];
	$tmp_lhr = @$_POST['tmp_lhr'];
	$tgl_lhr = @$_POST['tgl_lhr'];
	$telp = @$_POST['telp'];
	$nm_ayah = @$_POST['nm_ayah'];
	$nm_ibu = @$_POST['nm_ibu'];
	$pekerjaan_ayah = @$_POST['pekerjaan_ayah'];
	$pekerjaan_ibu = @$_POST['pekerjaan_ibu'];
	$hp = @$_POST['hp'];
	$alamat = @$_POST['alamat'];
	$tahun_ajaran = @$_POST['tahun_ajaran'];
		
	$hasil=mysqli_query("insert into siswa values ('', '$nis','$nama','$id_kelas','$id_jrsn','$jk','$agama','$tmp_lhr','$tgl_lhr','$telp','$nm_ayah','$nm_ibu','$pekerjaan_ayah','$pekerjaan_ibu','$hp','$alamat','$tahun_ajaran')");
	if ($hasil) 
	
	header("location:?page=sis"); 
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Siswa</title>
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
<form action="" enctype="multipart/form-data" method="post" name="postform">
<div align="center"><center>
  <table width='600'><tr><td>
	<fieldset ><legend>INPUT DATA SISWA</legend>
		<table border='0' width='550'>
			<tr>
				<td width='160'>NIS</td><td>:</td>
				<td><input type=text name=nis></td>
			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type=text name=nama size='50'></td>
			</tr>
			<tr>
				<td>Kelas</td><td>:</td>
				<td><select name="id_kelas">
					<option>-Pilih-</option>
					<?php
					include "dt/koneksi.php";
					$query = mysqli_query("select * from kelas");
					while($row = mysqli_fetch_array($query)){?>
					<option value="<?php echo $row['id_kelas'];?>"><?php echo $row['nm_kelas'];?></option>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Jurusan</td><td>:</td>
				<td><select name="id_jrsn">
					<option>-Pilih-</option>
					<?php
					include "dt/koneksi.php";
					$query = mysqli_query("select * from jurusan");
					while($row = mysqli_fetch_array($query)){?>
					<option value="<?php echo $row['id_jrsn'];?>"><?php echo $row['nm_jurusan'];?></option>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td><td>:</td>
				<td><input type='radio' name='jk' value='Laki-laki' required>Laki-laki <input type='radio' name='jk' value='Perempuan' required>Perempuan
				</td>
			</tr>
			<tr>
				<td>Agama</td><td>:</td>
				<td><select name='agama' required>
					<option value='Islam'>Islam</option>
					<option value='Budha'>Budha</option>
					<option value='Hindu'>Hindu</option>
					<option value='Katholik'>Katholik</option>
					<option value='Kristen'>Kristen</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir </td><td>:</td>
				<td><input type='text' name='tmp_lhr' required> Tgl.lahir : <input type='text' id='tgl' name='tgl_lhr' size='15' required></td>
			</tr>
			<tr>
				<td>Telp/HP Siswa</td><td>:</td>
				<td><input type=text name=telp size='50'></td>
			</tr>
			<tr>
				<td>Nama Ayah</td><td>:</td>
				<td><input type=text name=nm_ayah size='50'></td>
			</tr>
			<tr>
				<td>Nama Ibu</td><td>:</td>
				<td><input type=text name=nm_ibu size='50'></td>
			</tr>
			<tr>
				<td>Pekerjaan Ayah</td><td>:</td>
				<td><input type=text name=pekerjaan_ayah size='50'></td>
			</tr>
			<tr>
				<td>Pekerjaan Ibu</td><td>:</td>
				<td><input type=text name=pekerjaan_ibu size='50'></td>
			</tr>
			<tr>
				<td>Telp/HP Ortu</td><td>:</td>
				<td><input type=text name=hp size='50'></td>
			</tr>
			<tr>
				<td>Alamat</td><td>:</td>
				<td><textarea name="alamat" cols="38" rows="2"/></textarea></td>
			</tr>
			<tr>
				<td>Tahun Ajaran</td><td>:</td>
				<td><select name='tahun_ajaran' required>
						<option>-Pilih-</option>
						<option value='2016-2017'>2016-2017</option>
						<option value='2017-2018'>2017-2018</option>
						<option value='2018-2019'>2018-2019</option>
						<option value='2019-2020'>2019-2020</option>
						<option value='2020-2021'>2020-2021</option>
						<option value='2021-2022'>2021-2022</option>
					</select>
				</td>
			</tr>
		<tr>
		  <td colspan="3" align="center" bgcolor="yellow"><input type="submit" name="tambah"  value="Proses" />&nbsp;
		  <a href="?page=sis"><b>[Back]</b></a></td>
		</tr>
	</table>	  
	</form>	
	</fieldset>
    </td>
  </tr>
 </table>
</body>
</html>
