<?php
session_start();
include "../koneksi.php";
if(!isset($_SESSION['nama']) and !isset($_SESSION['pass'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>SMP-SMK TUNAS BANGSA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link id="theme" rel="stylesheet" type="text/css" href="style.css" title="theme" />
	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="js/custom.js"></script>
</head>
<body> 
    <div> 
        <div> <center><br>
			<table border='0'  width='400'>
				<tr><td>
					 <fieldset>
					<legend><b> Set Periode Bayar</b> </legend>
					<?
					
					$q=mysqli_query("select * from set_periode where id_periode = '$_GET[id]'");
					$d = mysqli_fetch_array($q);
					
					$tahunajaran = $d['periode_tahun_ajaran'];
					$pecah = explode('/',$tahunajaran);
										
					
					?>
					
					<form action="" method='post'>
					<input type='hidden' name='id' value="<?echo $_GET['id'];?>">
					<table border="0" width='100%'><tr><td>
					Tahun Ajaran </td><td>: 
					<input type='text' name='tahun_ajaran_awal' value='<?echo $pecah[0];?>' size='5' placeholder='ex:2013' required> / <input type='text' name='tahun_ajaran_akhir'  value='<?echo $pecah[1];?>' size='5' required placeholder='ex:2014'> </td></tr>
					<tr><td>
					Semester Aktif </td><td>: <input type='radio' name='semester_aktif' value='Ganjil' <?if($d['semester_aktif']=="Ganjil"){echo"checked";}?> required>
					Ganjil<input type='radio' name='semester_aktif' value='Genap' <?if($d['semester_aktif']=="Genap"){echo"checked";}?>    required> Genap
					</td></tr>
					<tr><td>
					Nominal SPP  </td><td>:
					<input type='text' name='nominal_spp'  value='<?echo $d['nominal_spp'];?>' >	
					</td>
					
					<tr><td>Seragam
					 </td><td>: 
					<input type='text' name='seragam' value='<?echo $d['seragam'];?>' required> </td></tr>
					<tr><td>
					Peralatan Paket </td><td>: 
					<input type='text' name='peralatan_paket' value='<?echo $d['peralatan_paket'];?>' required> </td></tr>
					<tr><td>
					Perlengkapan </td><td>: 
					<input type='text' name='perlengkapan' value='<?echo $d['perlengkapan'];?>' required> </td></tr>
					<tr><td>
					Uang Kegiatan </td><td>: 
					<input type='text' name='uang_kegiatan' value='<?echo $d['uang_kegiatan'];?>'  required> </td></tr>
					<tr><td></td><td><input type='submit' name='set' value='Simpan'></td></tr>
					</table>
					</form>
				  </fieldset>
                  
				
				<?
				  if(isset($_POST['set'])){
				  
				 $thn =  $_POST['tahun_ajaran_awal']."/".$_POST['tahun_ajaran_akhir'];
				 $nml =  $_POST['nominal_spp'];
				 $stmaktif =  $_POST['semester_aktif'];
				 $seragam =  $_POST['seragam'];
				 $peralatan_paket =  $_POST['peralatan_paket'];
				 $perlengkapan =  $_POST['perlengkapan'];
				 $uang_kegiatan =  $_POST['uang_kegiatan'];
				  $update =  mysqli_query("
				  
				  UPDATE set_periode SET periode_tahun_ajaran='$thn',nominal_spp='$nml',semester_aktif='$stmaktif',seragam='$seragam',peralatan_paket='$peralatan_paket',perlengkapan='$perlengkapan',uang_kegiatan='$uang_kegiatan' WHERE id_periode='$_POST[id]' 
				  
				  ");
				  if( $update){
				  ?>
				  <script >
				  document.location='?page=msetper';
				  </script>
				  <?
				  }
				  }
				  ?>
					</td></tr>
				</table>
			<p><br>						
		 </div>  
    <div class="clear"></div> 
</body>
</html>
