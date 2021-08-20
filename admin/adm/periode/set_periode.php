<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['nama']) and !isset($_SESSION['pass'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>SMP-SMK TB</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link id="theme" rel="stylesheet" type="text/css" href="style.css" title="theme" />
	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="js/custom.js"></script>
	<script type="text/javascript" language="javascript" src="js/addon.js"></script>
</head>
<body> 
  <div> 
      <div> <center><br>
		<table border='0'  width='500'>
			<tr>
				<td>
					 <fieldset>
					<legend><b> Set Periode Bayar</b> </legend>
					
					<??>
					<form action="" method='post'>
					
					<table border="0" width='100%'><tr><td>
					Tahun Ajaran </td><td>: 
					<input type='text' name='tahun_ajaran_awal' value='<?echo $d['periode_tahun_ajaran'];?>' size='5' placeholder='ex:2016' required> / <input type='text' name='tahun_ajaran_akhir' value='' size='5' required placeholder='ex:2017'> </td></tr>
					<tr><td>
					Semester Aktif </td><td>: <input type='radio' name='semester_aktif' value='Ganjil' required>
					Ganjil<input type='radio' name='semester_aktif' value='Genap'   required> Genap
					</td></tr>
					<tr><td>
					Nominal SPP  </td><td>:
					<input type='text' name='nominal_spp' >	
					</td>
					
					<tr><td>Seragam
					 </td><td>: 
					<input type='text' name='seragam'  required> </td></tr>
					<tr><td>
					Peralatan Paket </td><td>: 
					<input type='text' name='peralatan_paket' required> </td></tr>
					<tr><td>
					Perlengkapan </td><td>: 
					<input type='text' name='perlengkapan'  required> </td></tr>
					<tr><td>
					Uang Kegiatan </td><td>: 
					<input type='text' name='uang_kegiatan'  required> </td></tr>
					<tr><td></td><td><input type='submit' name='set' value='Simpan'></td></tr>
					</table>
					</form>
				  </fieldset>
                <br>  
				
				<?php
				  if(isset($_POST['set'])){
				  
				 $thn =  $_POST['tahun_ajaran_awal']."/".$_POST['tahun_ajaran_akhir'];
				// echo $thn;
				 $nml =  $_POST['nominal_spp'];
				 $stmaktif =  $_POST['semester_aktif'];
				 $seragam =  $_POST['seragam'];
				 $peralatan_paket =  $_POST['peralatan_paket'];
				 $perlengkapan =  $_POST['perlengkapan'];
				 $uang_kegiatan =  $_POST['uang_kegiatan'];
				  $update =  mysqli_query("
				  
				  
				  insert into set_periode(periode_tahun_ajaran,nominal_spp,semester_aktif,seragam,peralatan_paket,perlengkapan,uang_kegiatan,aktivasi) 
				  values ('$thn','$nml','$stmaktif','$seragam','$peralatan_paket','$perlengkapan','$uang_kegiatan','Tidak')");
				  if( $update){
				  ?>
				  <script >
				  alert("berhasil ditambah");
				  document.location='?page=msetper';
				  </script>
				  <?
				  }
				  }
				  ?>
				</td>
			</tr>
		</table>
		<table border='1' width='90%' bgcolor='#fff' >
			<tr bgcolor='#ccc' height='40' align='center'>
				<td>No.</td>
				<td>Tahun Ajaran</td>
				<td>SPP</td>
				<td>Semester Aktif</td>
				<td>Seragam</td>
				<td>Peralatan Paket</td>
				<td>Perlengkapan</td>
				<td>Uang Kegiatan</td>
				<td>Aktivasi</td>
				<td>Aksi</td>
			</tr>
             <?php
				$myquery=mysqli_query("select * from set_periode");
				$no =1;
				 while($dataku=mysqli_fetch_array($myquery))
					{
					echo	"<tr><td align='center'>$no</td><td>$dataku[periode_tahun_ajaran]</td><td>$dataku[nominal_spp]</td><td>$dataku[semester_aktif]</td><td>$dataku[peralatan_paket]</td><td>$dataku[seragam]</td><td>$dataku[perlengkapan]</td><td>$dataku[uang_kegiatan]</td><td>";
					echo $dataku['aktivasi'];
					echo"</td>";
					?>
					<td><div align="center"><a href="?page=editper&&id=<?php echo  $dataku['id_periode']?>"><img src="images/button-edit.gif" width="20" height="20" border="0" title=Edit /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='?page=mdel&&id=<?php echo  $dataku['id_periode']?>';}"><img src="images/button-cross.gif" width="20" height="20" border="0" title=Hapus /></a>
									
					</div></td>
					
					</tr>
					<?
					echo"</tr>";
					$no++;
					}
				 ?>
		</table>
	</div> 
    </div>  
    <div class="clear"></div> 
</body>
</html>
