<html>
<head>
	<title>Edit DSP 2019-2020</title>
</head>
<body>
	<?php 
		include "dt/koneksi.php";
		$query=mysqli_query("SELECT * FROM dsp_2019 WHERE id_dsp19='".$_GET['id_dsp19']."'");
		$data=mysqli_fetch_array($query); 
	?>
	<form action="?page=proseditdsp19" enctype="multipart/form-data" method="post" name="postform">
	<input type="hidden" name="id_dsp19" value="<?php echo $data['id_dsp19'];?>" />
	
	<table width='80%'><tr><td>
	<fieldset ><legend style='color:blue; font: 18px Cambria, verdana, sans-serif; font-weight: bold; margin-left:20px;'>DSP 2019-2020</legend>
	<table width="75%" align="center">
		<tr>
			<td width="110">No. Kwitansi</td><td>:</td>
			<td><input type="text" name="kwitansi" value="<?php echo $data['kwitansi']; ?>" size="15"/></td>
		</tr>
		<tr>
			<td>Tgl. Pembayaran</td><td>:</td>
			<td><input type="text" name="tgl_pmbyrn" value="<?php echo $data['tgl_pmbyrn']; ?>" size="15"/></td>
		</tr>
		<tr>
			<td>Nama Siswa</td><td>:</td>
			<td><input type="text" name="nm_siswa" value="<?php echo $data['nm_siswa']; ?>" size="50"/></td>
		</tr>
		<tr>
			<td>Jenjang</td><td>:</td>
			<td><input type="text" name="jenjang" value="<?php echo $data['jenjang']; ?>" size="50"/></td>
		</tr>
		<tr>
			<td>Jurusan</td><td>:</td>
			<td><input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" size="50"/></td>
		</tr>
		<tr>
			<td>Jumlah</td><td>:</td>
			<td><input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>" size="15"/></td>
		</tr>
		<tr>
			<td>Terbilang</td><td>:</td>
			<td><input type="text" name="terbilang" value="<?php echo $data['terbilang']; ?>" size="50"/></td>
		</tr>
		<tr>
			<td>Keterangan</td><td>:</td>
			<td><textarea name="ket" cols="45" rows="2"><?php echo $data['ket']; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="submit"  value="Update">
				<a href="?page=dsp19"><font size="4" color="blue" style="border: 2px double gray; background:white;"> &nbsp; Back &nbsp;</font></a></td>
		</tr>
	</table>
	</fieldset>
    </td>
  </tr>
 </table>
	</form>
</body>
</html>
