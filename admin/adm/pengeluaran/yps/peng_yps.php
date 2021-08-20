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
	<title>Pengeluaran yps</title>
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

<form action="?page=tmbh_yps" method="POST">
<div align="center"><center>
  <table width='600'><tr><td>
	<fieldset ><legend>INPUT DATA PENGELUARAN YAYASAN</legend>
		<table border='0' width='600'>
			<tr>
				<td>Uraian</td><td>:</td>
				<td><textarea name=uraian cols='41' rows='1' ></textarea></td>
			</tr>
			<tr>
				<td>Keterangan</td><td>:</td>
				<td><textarea name=keterangan cols='41' rows='1' required></textarea></td>
			</tr>
			<tr>
				<td>Jumlah</td><td>:</td>
				<td><input type=text name=jumlah></td>
			</tr>
			
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
 

<table width="1000" border='0'>
 <tr>
	<td width='400'><center>
	<fieldset><legend align='center'><strong><b>DATA PENGELUARAN YAYASAN PENDIDIKAN SUMARNO</b></strong></legend>
	<table width="1000" border="1" align="center" cellspacing="0">
		<tr bgcolor="#00FF66" align="center" height="35">
			<th width="40">No</th>
			<th width="120">Tgl. Pengeluaran</th>
			<th>Uraian</th>
			<th>Keterangan</th>
			<th colspan="2">Jumlah</th>
			<th width='80'>Aksi</th>
		</tr>
		<?php 
		include "dt/koneksi.php";
		
		$batas=20; 
		$halaman=$_GET['halaman'];
		$posisi=null;
		if(empty($halaman)){
			$posisi=0;
			$halaman=1;
		}else{
			$posisi=($halaman-1)* $batas;
		}
		$query="select * from pengeluaran_yps order by id_yps desc limit $posisi,$batas";
		
		$result=mysqli_query($query) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
	?>
	<tr align="" bgcolor="#DFFDD5">
		<td align="center"><?php echo $c=$c+1 ?></td>
		<td align="center"><?php echo $data['tanggal'] ?></td>
		<td><?php echo $data['uraian'] ?></td>
		<td><?php echo $data['keterangan'] ?></td>
		<td width="20">Rp.</td>
		<td width="100" align=right><?php echo number_format($data['jumlah'])?>,-</td>
		
		<td align="center">
			<a href="?page=eyps&&id_yps=<?php echo $data['id_yps']; ?>"> <img src="images/button-edit.gif" class="preview" title="Edit" width="20" height="20"></img></a> |
					
			<a href="?page=delyps&&id=<?php echo $data['id'];?>" onClick="return confirm('Apakah Anda yakin akan menghapus Data ini ?...')"><img src="images/button-cross.gif" class="preview" title="Hapus" width="20" height="20"></img></a>
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
		$sql_paging = mysqli_query("select id_yps from pengeluaran_yps");
		$jmldata = mysqli_num_rows($sql_paging);
		$jumlah_halaman = ceil($jmldata / $batas);
		
		echo "Halaman :";
		for($i = 1; $i <= $jumlah_halaman; $i++)
			if($i != $halaman) {
				echo "<a href=?page=yps&&halaman=$i>&nbsp; $i &nbsp;</a><b>|</b>"; 
			} else {
				echo "<b> $i &nbsp; |</b>";
			}
		?>
		<br>
		Jumlah Data : <?php echo $jmldata;?>.
		</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>		
