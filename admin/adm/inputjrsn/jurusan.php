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
	<title>jrsn</title>
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

<form action="?page=prosjrsn" method="POST">
<div align="center"><center>
  <table width='500'><tr><td>
	<fieldset ><legend>INPUT JURUSAN</legend>
		<table border='0' width='450'>
			<tr>
				<td>No Urut</td><td>:</td>
				<td><input type=text name=id_jrsn size='45' required></td>
			</tr>
			<tr>
				<td>Nama Jurusan</td><td>:</td>
				<td><input type=text name=nm_jurusan size='45' required></td>
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
 

<table width="550" border='0'>
 <tr>
	<td width='400'><center>
	<fieldset><legend><strong><b>Tabel Jurusan SMP-SMK TB DECES</b></strong></legend>
	<table width="400" border="1" align="center" cellspacing="0">
		<tr bgcolor="#00FF66" align="center" height="35">
			<th>No</th>
			<th>Nama Jurusan</th>
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
		$query="select * from jurusan order by nm_jurusan asc limit $posisi,$batas";
		
		$result=mysqli_query($query) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
	?>
	<tr align="" bgcolor="#DFFDD5">
		<td><?php echo $data['id_jrsn'] ?></td>
		<td><?php echo $data['nm_jurusan'] ?></td>
		
		<td align="center">
			<a href="?page=editjrsn&&id_jrsn=<?php echo $data['id_jrsn']; ?>"> <img src="images/button-edit.gif" class="preview" title="Edit" width="20" height="20"></img></a> |
					
			<a href="?page=deljrsn&&id_jrsn=<?php echo $data['id_jrsn'];?>" onClick="return confirm('Apakah Anda yakin akan menghapus Data ini ?...')"><img src="images/button-cross.gif" class="preview" title="Hapus" width="20" height="20"></img></a> 
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
		$sql_paging = mysqli_query("select id_jrsn from jurusan");
		$jmldata = mysqli_num_rows($sql_paging);
		$jumlah_halaman = ceil($jmldata / $batas);
		
		echo "Halaman :";
		for($i = 1; $i <= $jumlah_halaman; $i++)
			if($i != $halaman) {
				echo "<a href=?page=jrsn&&halaman=$i>&nbsp; $i &nbsp;</a><b>|</b>"; 
			} else {
				echo "<b> $i &nbsp; |</b>";
			}
		?>
		<br>
		Jumlah Data Jurusan SMP-SMK TB Deces : <?php echo $jmldata;?> .
		</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>		
