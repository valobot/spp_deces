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
 <table width='99%'><tr><td>
  <fieldset ><legend>DATA SISWA/I SMP-SMK TB DECES</legend>
  <table width='99%'>
	<tr>
		<td><a href="?page=addsis"><button>Tambah Siswa</button></a></td>
		<td align="right">
			<form action="?page=proscrnama" method="POST" name="form1">
					Input : Nama Siswa
					<input name="nama" type="text" id="cari" size="20" maxlength="30">
					<input type="submit" name="Submit" value="Tampilkan">
			</form>
		</td>
		<td align="right">
			<form action="?page=proscrsiswa" method="POST" name="form1">
					Input : Nomor Induk Siswa (NIS)
					<input name="nis" type="text" id="cari" size="20" maxlength="30">
					<input type="submit" name="Submit" value="Tampilkan">
			</form>
		</td>
	</tr>
  </table>
  <table border="1" width="98%" align="center">
	<tr bgcolor="#99CCFF">
		<th>No</th>
		<th>Nis</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Jurusan</th>
		<th>Gender</th>
		<th>Agama</th>
		<th>Tmpt & Tgl. Lahir</th>
		<th>Tlp/Hp Siswa</th>
		<!--
		<th>Nama Ayah</th>
		<th>Nama Ibu</th>
		<th>Pekerjaan Ayah</th>
		<th>Pekerjaan Ibu</th>
		-->
		<th>Tlp/Hp Ortu</th>
		<th>Alamat</th>
		<th>Tahun Ajaran</th>
		<!--<th width='80'>Aksi</th>-->
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
		
		$query=mysqli_query("SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON siswa.id_jrsn=jurusan.id_jrsn order by nama asc limit $posisi,$batas");
		
		while($row=mysqli_fetch_array($query)){
		?>
			<tr>
				<td align="center"><?php echo $c=$c+1;?>
				<td><?php echo $row['nis']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['nm_kelas']; ?></td>
				<td><?php echo $row['nm_jurusan']; ?></td>
				<td><?php echo $row['jk'];?></td>
				<td><?php echo $row['agama'];?></td>
				<td><?php echo $row['tmp_lhr'];?>, <?php echo $row['tgl_lhr'];?></td>
				<td><?php echo $row['telp'];?></td>
			<!--
				<td><?php echo $row['nm_ayah'];?></td>
				<td><?php echo $row['nm_ibu'];?></td>
				<td><?php echo $row['pekerjaan_ayah'];?></td>
				<td><?php echo $row['pekerjaan_ibu'];?></td>
			-->
				<td><?php echo $row['hp'];?></td>
				<td><?php echo $row['alamat'];?></td>
				<td><?php echo $row['tahun_ajaran'];?></td>
				<!--
				<td align="center">
				
					<a href="?page=editsis&&nis=<?php echo $row['nis']; ?>"> <img src="images/button-edit.gif" class="preview" title="Edit" width="18" height="20"></img></a> &nbsp; | &nbsp;
							
					<a href="?page=delsis&&nis=<?php echo $row['nis'];?>" onClick="return confirm('Apakah Anda yakin akan menghapus Data ini ?...')"><img src="images/button-cross.gif" class="preview" title="Hapus" width="18" height="23"></img></a>
					
					<a href="?page=detailsis&&nis=<?php echo $row['nis']; ?>"><img src="images/button-view.gif" class="preview" title="Detail" width="18" height="20"></img>
					
				</td>
				-->
			</tr>
		<?php
		}
		?>
	</table>
	<br>
	<?php		
	//=============PAGING ========================
		$sql_paging = mysqli_query("select id from siswa");
		$jmldata = mysqli_num_rows($sql_paging);
		$jumlah_halaman = ceil($jmldata / $batas);
		
		echo "Halaman :";
		for($i = 1; $i <= $jumlah_halaman; $i++)
			if($i != $halaman) {
				echo "<a href=?page=sis&&halaman=$i>&nbsp; $i &nbsp;</a><b>|</b>"; 
			} else {
				echo "<b> $i &nbsp; |</b>";
			}
		?>
		<br>
		Jumlah Siswa SMP-SMK TB Deces : <?php echo $jmldata;?>
	</fieldset>		
	   </td>
	  </tr>
	</table>
</body>
</html>