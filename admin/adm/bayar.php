<?php
session_start();
if(!isset($_SESSION['nama']) and !isset($_SESSION['pass'] )){
?><script language=javascript>alert("Maaf Anda Harus Login, Untuk Bisa Mengakses Halaman Ini");document.location="../login.php"</script><?php
}

?>
<script>function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

</script>
<p align="center"> </p>
<form id="form2" name="form2" method="post" action="">
</form></br>
<table width="644" border="0" align="center" cellspacing="0">
<tr><td><center><fieldset><legend>Pembayaran Iuran SPP Periode Tahun <?echo $tahun_ajaran;?> Dan Bulan <?echo $bulan;?>   </legend>
<form action="" method="get" name="FCari" id="FCari">
  
   Input Nis/Nama :  <input name="txtcari" type="text" id="txtcari" required size="20" maxlength="30" value="<?php echo $_GET['txtcari']?>"> 
  <input type="submit" name="Submit" value="Validasi">
</form>
</legend>
</td></tr></table><p><br>

<table width="950" border="1" cellpadding="3" cellspacing="1" bgcolor="#DFFDD5" rules="all">

<?php
	$txtcari=$_GET['txtcari'];
	if(isset($txtcari))
	{
		$myquerycari="select * from siswa where nis='$txtcari' or nama LIKE '%$txtcari%' or kelas LIKE '%$txtcari%'  ORDER by kelas asc";
	}
	else
	{
$hal = $_GET[hal];
// jika page default nya 1
if(!isset($_GET['hal'])){
$halaman = 1;
} else {
$halaman = $_GET['hal'];
}
//tentukan jumlah data setiap halaman
$hal_maksimum =10;
// halaman di kali MAX jumlah item per halaman dikurangi MAX jumlah item per halaman
$mulai = (($halaman * $hal_maksimum) - $hal_maksimum);
// query database
		$myquery="select * from bayar,siswa where bayar.nis = siswa.nis and nama_bulan='$bulan' and siswa.tahun_ajaran='$tahun_ajaran'  LIMIT $mulai, $hal_maksimum";
		//echo $myquery;
	}	
	if($myquery){
	
	?><u><b>Daftar SPP Siswa Lunas  Bulan <?echo $bulan;?>  dan Tahun  <?echo $tahun_ajaran;?> </b></u><br><br>
	<tr bgcolor="#00FF66">
    <td>No</td>
    <td>Nis</td>
    <td>Nama</td>
    <td>Kelas</td>
    
    <td>Alamat</td>
    <td>Jenis Kelamin</td>
    <td>Tanggal Bayar</td>
    <td align="center">Status Lunas bulan (<b><?echo $bulan;?></b>)</td>
  </tr>
	<?
	$daftarsiswa=mysqli_query($myquery) or die (mysqli_error());
	while($dataku=mysqli_fetch_array($daftarsiswa))
	{
?>
    <tr bgcolor="#DFFDD5">
    <td><div align="center"><?php echo $no=$no+1; ?></td>
    <td><?php echo  $dataku['nis'];?></td>
    <td><?php echo  $dataku['nama']?></td>
    <td align="center"><?php echo  $dataku['kelas'];?></td>
    <td><?php echo  $dataku['alamat'];?></td>
    <td><?php echo  $dataku['jk'];?></td>
    <td><?php 
	$thn = $dataku['tgl_bayar'];
	$pecah = explode('-',$thn);
	
	
	echo $pecah[2]."-".$pecah[1]."-".$pecah[0];
	  ?></td>
    
    <td align="center"><?
	if($dataku['jumlah_bayar']>0){
	echo "Sudah lunas";
	}else{
	echo "Belum lunas";
	
	}
	?>
	<a onclick="PopupCenter('cetak_kwitansi.php?id=<?php echo $dataku['kd_bayar'];?>', 'myPop1',600,400);" href="javascript:void(0);" style="text-decoration:none"> | Cetak Kwitansi</a>
	</td>
  </tr>
	  
				<?php }
				
				}else{
				?>
				<u><b>Form Pembayaran SPP SMP-SMK TUNAS BANGSA </b></u><br><br>
				<tr bgcolor="#00FF66">
    <td>No</td>
    <td>Nis</td>
    <td>Nama</td>
    <td>Kelas</td>
    
    <td>Alamat</td>
    <td>Jenis Kelamin</td>
    <td>Tahun Ajaran</td>
    <td align="center">Pembayaran</td>
  </tr>
				<?
					$daftarsiswa=mysqli_query($myquerycari) or die (mysqli_error());
	while($dataku=mysqli_fetch_array($daftarsiswa))
	{
?>
    <tr bgcolor="#DFFDD5">
    <td><div align="center"><?php echo $no=$no+1; ?></td>
    <td><?php echo  $dataku['nis'];?></td>
    <td><?php echo  $dataku['nama']?></td>
    <td align="center"><?php echo  $dataku['kelas'];?></td>
    <td><?php echo  $dataku['alamat'];?></td>
    <td><?php echo  $dataku['jk'];?></td>
	<td><?php echo  $dataku['tahun_ajaran'];?></td>
	
    <td align="center"><a href="pembayaran.php?nis=<?php echo $dataku['nis'];?>"><input type="submit" value='bayar'></a></td>
  </tr>
	  
				<?php }
				
				} ?>
</tr>
</table> 
<?php
$total= mysqli_result(mysqli_query("SELECT COUNT(*) as jumlah  from bayar,siswa where bayar.nis = siswa.nis and nama_bulan='$bulan' and siswa.tahun_ajaran='$tahun_ajaran' "),0);
$jumlah_halaman = ceil($total / $hal_maksimum);
// bangun jumlah hiperlink halaman
echo "<left title='Pilih Halaman'>Halaman </br>";
// bangun Previous link
if($hal > 1){
$sebelum = ($halaman - 1);
echo "<a href=$_SERVER[PHP_SELF]?hal=$sebelum title=Sebelumnya>Prev</a>
";
}
for($i = 1; $i <= $jumlah_halaman; $i++){
if(($hal) == $i){
echo "$i ";
} else {
echo "<a href=$_SERVER[PHP_SELF]?hal=$i>$i</a> ";
}
}
// bangun Next link
if($hal < $jumlah_halaman){
$selanjutnya = ($halaman + 1);
echo "<a href=$_SERVER[PHP_SELF]?hal=$selanjutnya title=Selanjutnya>Next</a>";
}
echo "</left>";
?>
