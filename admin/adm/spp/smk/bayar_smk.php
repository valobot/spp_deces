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
<table width="97%" border='0' cellspacing='10'>
	<tr>
		<td>
			<form action="?page=detailsppsmk" method="POST" name="form1">
			<button>Detail Pembayaran</button><br>
			Input : Nama Siswa/i
				<input name="nama" type="text" id="cari" size="40" placeholder='Masukkan Nama  Siswa'>
				<input type="submit" name="Submit" value="Tampilkan">
			</form>
		</td>	
		<td>
			<form action="?page=formsppsmk" method="POST" name="form1">
				<button>Tambah Pembayaran </button><br>
				Input NIS:
				<input name="nis" type="text" id="cari" size="30" placeholder='Nomor Induk Siswa'>
				<input type="submit" name="Submit" value="Ok">
			</form>
		</td>
	</tr>	
</table> 

<table width="97%" border='0'>
 <tr>
	<td>
	<fieldset><legend align="center" font size="4"><strong><b>Data Pembayaran Siswa SMK</b></strong></legend>
	<table width="96%" border="1" align="center" cellspacing="0">
		<tr bgcolor="#00FF66" align="center" height="35">
			<th>No</th>
			<th>No. Kwitansi</th>
			<th>Tgl. Pembyrn</th>
			<th>Nama Siswa/i</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Jenis Pembayaran</th>
			<th width='100'>Harga</th>
			<th width='100'>Dibayar</th>
			<th>Keterangan</th>
			<th width='85'>Aksi</th>
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
		$query="select * from spp_smk INNER JOIN siswa ON spp_smk.id=siswa.id INNER JOIN kelas ON spp_smk.id_kelas=kelas.id_kelas INNER JOIN jurusan ON spp_smk.id_jrsn=jurusan.id_jrsn order by id_sppsmk desc limit $posisi,$batas";
		
		$result=mysqli_query($query) or die(mysqli_error());
		
		while($data=mysqli_fetch_array($result)){
	?>
	<tr align="" bgcolor="#DFFDD5">
		<td align="center"><?php echo $c=$c+1 ?></td>
		<td align="center"><?php echo $data['id_sppsmk'] ?>
		<td align="center"><?php echo $data['tgl'] ?></td>
		<td><?php echo $data['nama'] ?></td>
		<td><?php echo $data['nm_kelas'] ?>
		<td><?php echo $data['nm_jurusan'] ?>
		<td><?php echo $data['jenis_bayar'] ?></td>
		<td>Rp. <?php echo number_format($data['harga'])?>,-</td>
		<td>Rp. <?php echo number_format($data['jumlah_bayar'])?>,-</td>
		<td><?php echo $data['ket'] ?></td>
		
		<td align="center">
			<a href="?page=edtsppsmk&&id_sppsmk=<?php echo $data['id_sppsmk']; ?>"> <img src="images/button-edit.gif" class="preview" title="Edit" width="20" height="20"></img></a> |
		<!--			
			<a href="?page=del&&id_sppsmk=<?php echo $data['id_sppsmk'];?>" onClick="return confirm('Apakah Anda yakin akan menghapus Data ini ?...')"><img src="images/button-cross.gif" class="preview" title="Hapus" width="20" height="20"></img></a> |
		-->	
			<a href="?page=kwitansismk&&id_sppsmk=<?php echo $data['id_sppsmk']; ?>"><img src="images/printer1.png" class="preview" title="Print" width="20" height="25"></img>
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
		$sql_paging = mysqli_query("select id_sppsmk from spp_smk");
		$jmldata = mysqli_num_rows($sql_paging);
		$jumlah_halaman = ceil($jmldata / $batas);
		
		echo "Halaman :";
		for($i = 1; $i <= $jumlah_halaman; $i++)
			if($i != $halaman) {
				echo "<a href=?page=sppsmk&&halaman=$i>&nbsp; $i &nbsp;</a><b>|</b>"; 
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
