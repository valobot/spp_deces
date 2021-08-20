<?php
	error_reporting(0);
	$page=$_GET['page'];
	switch($page)
	{
		case "1";
		include "home.php";
		break;
		case "2";
		include "home_adm.php";
		break;
		
		/**Menu Master Input*/
		case "kls"; include "adm/inputkelas/kelas.php"; break;
		case "proskls"; include "adm/inputkelas/proses_kelas.php"; break;
		case "editkls"; include "adm/inputkelas/edit_kelas.php"; break;
		case "delkls"; include "adm/inputkelas/hapus.php"; break;
		
		case "jrsn"; include "adm/inputjrsn/jurusan.php"; break;
		case "prosjrsn"; include "adm/inputjrsn/proses_jurusan.php"; break;
		case "editjrsn"; include "adm/inputjrsn/edit_jurusan.php"; break;
		case "deljrsn"; include "adm/inputjrsn/hapus.php"; break;
		
		case "sis"; include "adm/siswa/siswa.php"; break;
		case "addsis"; include "adm/siswa/add_siswa.php"; break;
		case "editsis"; include "adm/siswa/edit_siswa.php"; break;
		case "delsis"; include "adm/siswa/hapus.php"; break;
		case "proscrsiswa"; include "adm/siswa/proses_cari_siswa.php"; break;
		case "proscrnama"; include "adm/siswa/proses_cari_nama.php"; break;
		case "proscrjrsn"; include "adm/siswa/proses_cari_jurusan.php"; break;
		
		/**Master Pembayaran DSP*/
		case "dsp"; include "adm/dsp/dsp.php"; break;
		case "prosdsp"; include "adm/dsp/proses_add.php"; break;	
		case "editdsp"; include "adm/dsp/edit.php"; break;	
		case "detdsp"; include "adm/dsp/detail_dsp_cetak.php"; break;	
		case "prospmyrn"; include "adm/dsp/proses_cari_pmbyrn.php"; break;	
		case "cari_jrsan"; include "adm/dsp/proses_cari_jurusan.php"; break;	
		case "searchlap"; include "adm/dsp/search_laporan.php"; break;	
		case "lapperiode_dsp"; include "adm/dsp/lap_periode_dsp.php"; break;	
		case "ddcs"; include "adm/dsp/detail_pmbyrn_dsp.php"; break;
		
		/**DSP-2018*/
		case "dsp18"; include "adm/dsp_2018/18_dsp.php"; break;
		case "prosdsp18"; include "adm/dsp_2018/18_proses_add.php"; break;	
		case "editdsp18"; include "adm/dsp_2018/18_edit.php"; break;	
		case "proseditdsp18"; include "adm/dsp_2018/18_proses_edit.php"; break;	
		case "detdsp18"; include "adm/dsp_2018/18_detail_dsp_cetak.php"; break;	
		case "prospmyrn18"; include "adm/dsp_2018/18_proses_cari_pmbyrn.php"; break;	
		case "cari_jrsan18"; include "adm/dsp_2018/18_proses_cari_jurusan.php"; break;	
		case "searchlap18"; include "adm/dsp_2018/18_search_laporan.php"; break;	
		case "lapperiode_dsp18"; include "adm/dsp_2018/18_lap_periode_dsp.php"; break;	
		case "ddcs18"; include "adm/dsp_2018/18_detail_pmbyrn_dsp.php"; break;	
		
		/**DSP-2019*/
		case "dsp19"; include "adm/dsp_2019/19_dsp.php"; break;
		case "prosdsp19"; include "adm/dsp_2019/19_proses_add.php"; break;	
		case "editdsp19"; include "adm/dsp_2019/19_edit.php"; break;	
		case "proseditdsp19"; include "adm/dsp_2019/19_proses_edit.php"; break;	
		case "detdsp19"; include "adm/dsp_2019/19_detail_dsp_cetak.php"; break;	
		case "prospmyrn19"; include "adm/dsp_2019/19_proses_cari_pmbyrn.php"; break;	
		case "cari_jjg19"; include "adm/dsp_2019/19_proses_cari_jenjang.php"; break;	
		case "searchlap19"; include "adm/dsp_2019/19_search_laporan.php"; break;	
		case "lapperiode_dsp19"; include "adm/dsp_2019/19_lap_periode_dsp.php"; break;	
		case "ddcs19"; include "adm/dsp_2019/19_detail_pmbyrn_dsp.php"; break;	
		
		/**Pembayaran SPP*/
		case "spp"; include "adm/bayar/bayar.php"; break;
		case "prosspp"; include "adm/bayar/proses_add_byr.php"; break;
		case "lapsearch"; include "adm/bayar/search_laporan.php"; break;
		case "lapspp"; include "adm/bayar/lap_pmbyrn.php"; break;
		case "ctkkwitansi"; include "adm/bayar/cetak_kwitansi.php"; break;
		case "del"; include "adm/bayar/hapus.php"; break;
		
		/**Pembayaran SPP-SMP*/		
		case "sppsmp"; include "adm/spp/smp/bayar_smp.php"; break;
		case "formsppsmp"; include "adm/spp/smp/form_sppsmp.php"; break;
		case "prosppsmp"; include "adm/spp/smp/proses_add_spp.php"; break;
		case "kwitansismp"; include "adm/spp/smp/kwitansi.php"; break;
		case "edtsppsmp"; include "adm/spp/smp/edit_sppsmp.php"; break;
		case "lapsearch"; include "adm/bayar/search_laporan.php"; break;
		case "lapspp"; include "adm/bayar/lap_pmbyrn.php"; break;
		case "detailsppsmp"; include "adm/spp/smp/detail_pmbyrn_sppsmp.php"; break;
		case "delsppsmp"; include "adm/spp/smp/hapus.php"; break;
		
		/**Pembayaran SPP-SMK */
		case "sppsmk"; include "adm/spp/smk/bayar_smk.php"; break;		
		case "formsppsmk"; include "adm/spp/smk/form_sppsmk.php"; break;
		case "prosppsmk"; include "adm/spp/smk/proses_add_sppsmk.php"; break;
		case "kwitansismk"; include "adm/spp/smk/kwitansi_smk.php"; break;
		case "edtsppsmk"; include "adm/spp/smk/edit_sppsmk.php"; break;
		case "delsppsmk"; include "adm/spp/smk/hapus.php"; break;
		case "detailsppsmk"; include "adm/spp/smk/detail_pmbyrn_sppsmk.php"; break;
		
		/**Tunggakan SMP */
		case "tungsmp"; include "adm/tunggak/smp/tung_smp.php"; break;		
		case "tungformsmk"; include "adm/tunggak/smk/tung_formsmk.php"; break;
		case "prostungsmk"; include "adm/tunggak/smk/tung_proses_addsmk.php"; break;
		case "tungeditsmk"; include "adm/tunggak/smk/tung_editsmk.php"; break;
		case "tungdelsmk"; include "adm/tunggak/smk/tung_hapus.php"; break;
		case "tung_carismk"; include "adm/tunggak/smk/tung_search_smk.php"; break;
		case "tung_periodesmk"; include "adm/tunggak/smk/tungsmk_lap_periode.php"; break;
		case "tung_detailsmk"; include "adm/tunggak/smk/detail_tungsmk.php"; break;
		/**Tunggakan SMK */
		case "tungsmk"; include "adm/tunggak/smk/tung_smk.php"; break;		
		case "tungformsmk"; include "adm/tunggak/smk/tung_formsmk.php"; break;
		case "prostungsmk"; include "adm/tunggak/smk/tung_proses_addsmk.php"; break;
		case "tungeditsmk"; include "adm/tunggak/smk/tung_editsmk.php"; break;
		case "tungdelsmk"; include "adm/tunggak/smk/tung_hapus.php"; break;
		case "tung_carismk"; include "adm/tunggak/smk/tung_search_smk.php"; break;
		case "tung_periodesmk"; include "adm/tunggak/smk/tungsmk_lap_periode.php"; break;
		case "tung_detailsmk"; include "adm/tunggak/smk/detail_tungsmk.php"; break;
		case "jenis_tungsmk"; include "adm/tunggak/smk/jenis_tungsmk.php"; break;
		
		
		/**Calon Siswa SMP*/
		case "clnsmp"; include "adm/calonsiswa-smp/calonsiswa_smp.php"; break;
		case "prossmp"; include "adm/calonsiswa-smp/proses_add.php"; break;
		case "proscari"; include "adm/calonsiswa-smp/proses_cari.php"; break;
		case "detailsmp"; include "adm/calonsiswa-smp/detail_cs_cari.php"; break;
		case "edit"; include "adm/calonsiswa-smp/edit.php"; break;
		case "prosedit"; include "adm/calonsiswa-smp/pros_edit.php"; break;
		case "del"; include "adm/calonsiswa-smp/hapus.php"; break;
		
		/**Calon Siswa Tek*/
		case "smk"; include "adm/calonsiswa-smk/calonsiswa_smk.php"; break;
		case "prossmk"; include "adm/calonsiswa-smk/proses_add.php"; break;
		case "proscari"; include "adm/calonsiswa-smk/proses_cari.php"; break;
		case "detailsmk"; include "adm/calonsiswa-smk/detail_cs_cari.php"; break;
		case "editsmk"; include "adm/calonsiswa-smk/edit.php"; break;
		case "delsmk"; include "adm/calonsiswa-smk/hapus.php"; break;
		
		/**Calon Siswa Kes*/
		case "kes"; include "adm/calonsiswa-kes/calonsiswa_kes.php"; break;
		case "proskes"; include "adm/calonsiswa-kes/proses_add.php"; break;
		case "proscari"; include "adm/calonsiswa-kes/proses_cari.php"; break;
		case "detailkes"; include "adm/calonsiswa-kes/detail_cs_cari.php"; break;
		case "editkes"; include "adm/calonsiswa-kes/edit.php"; break;
		case "delkes"; include "adm/calonsiswa-kes/hapus.php"; break;
		
		/**Laporan*/
		case "des"; include "adm/calonsiswa-kes/hapus.php"; break;
				
		/**SPP-SMP*/
		case "lapsppsmp"; include "adm/spp/smp/search_sppsmp.php"; break;
		case "laporan_sppsmp"; include "adm/spp/smp/lap_pmbyrn_sppsmp.php"; break;
		case "lap_priode_smp"; include "adm/spp/smp/lap_periode_smp.php"; break;
		
		/**SPP-SMK*/
		case "l_sppsmk"; include "adm/spp/smk/search_sppsmk.php"; break;
		case "laporan_sppsmk"; include "adm/spp/smk/lap_pmbyrn_sppsmk.php"; break;
		case "lap_priode_smk"; include "adm/spp/smk/lap_periode_smk.php"; break;
		
		/**Pengeluaran*/
		/**Sekolah*/
		case "sklh"; include "adm/pengeluaran/sklh/peng_sklh.php"; break;
		case "tmbh_pengeluaran"; include "adm/pengeluaran/sklh/proses_add.php"; break;
		case "editsklh"; include "adm/pengeluaran/sklh/edit.php"; break;
		case "lapsklh"; include "adm/pengeluaran/sklh/search_lap_sklh.php"; break;
		case "proslap"; include "adm/pengeluaran/sklh/proses_lap_sklh.php"; break;
		case "delsklh"; include "adm/pengeluaran/sklh/hapus.php"; break;
		
		/**Yayasan*/
		case "yps"; include "adm/pengeluaran/yps/peng_yps.php"; break;
		case "tmbh_yps"; include "adm/pengeluaran/yps/proses_add.php"; break;
		case "eyps"; include "adm/pengeluaran/yps/edit_yps.php"; break;
		
		default;
		include "home.php";
		break;
	}
?>