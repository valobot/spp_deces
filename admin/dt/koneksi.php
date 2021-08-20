<?php
//variabel database
$nama_host="localhost";
$user_db="root";
$password_db="";
$nama_db="spp_deces";

error_reporting(0);
//koneksi database
$koneksi=mysqli_connect($nama_host,$user_db,$password_db);

//bila terkoneksi
if($koneksi){
//pilih database
mysqli_select_db($nama_db);
}else{
echo "Database tidak terkoneksi";
}


 $sql = mysqli_query("SELECT * from set_periode where aktivasi = 'Ya'");
					 $hit = mysqli_num_rows($sql);
					// echo $hit;
					if($hit<>0){
while($data = mysqli_fetch_array($sql))
			{
			$tahun_ajaran = $data['periode_tahun_ajaran'];
			$nominal_spp = $data['nominal_spp'];
			$semester_aktif = $data['semester_aktif'];
			$seragam = $data['seragam'];
			$peralatan_paket = $data['peralatan_paket'];
			$perlengkapan = $data['perlengkapan'];
			$uang_kegiatan = $data['uang_kegiatan'];
			
			}		
	$total = $seragam + $peralatan_paket + $perlengkapan + $uang_kegiatan;			
					}
					
					$bulan_aktif = date('m');
					
if ($bulan_aktif=='01'){
$bulan ="Januari";
}else if($bulan_aktif=='02'){
$bulan = "Februari";
}else if($bulan_aktif=='03'){
$bulan = "Maret";
}else if($bulan_aktif=='04'){
$bulan = "April";
}else if($bulan_aktif=='05'){
$bulan = "Mei";
}else if($bulan_aktif=='06'){
$bulan = "Juni";
}else if($bulan_aktif=='07'){
$bulan = "Juli";
}else if($bulan_aktif=='08'){
$bulan = "Agustus";
}else if($bulan_aktif=='09'){
$bulan = "September";
}else if($bulan_aktif=='10'){
$bulan = "Oktober";
}else if($bulan_aktif=='11'){
$bulan = "November";
}else if($bulan_aktif=='12'){
$bulan = "Desember";
}
?>
