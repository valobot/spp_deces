<?php
session_start();

if(!isset($_SESSION['userid'])){
    die("Anda belum login");
}

//cek level user
if($_SESSION['level']!="admin"){
    die("Anda bukan admin");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>SMP-SMK TUNAS BANGSA</title>
    <link rel="stylesheet" type="text/css" href="css_admin/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/menu.css"/>
	<!--and css-->
	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="js/custom.js"></script>
	<script type="text/javascript" language="javascript" src="js/addon.js"></script>
</head>
<body>
	<body background="images/bg.jpg">
	<table border="1" width=90% align="center" bgcolor="#afe3f8">
		<tr bgcolor="#afe3f8">
			<td valign="top" colspan="2">
				<center>
					<?php include ("header_adm.php"); ?>
				</center>
			</td>
		</tr>
		<tr bgcolor="#afe3f8"><td colspan="2" align="left">	
			<?php echo "<font size='5'>Selamat Datang... ".$_SESSION['userid']."</font>";?>
			</td>
		</tr>
		<center>
		<tr background="images/menu.jpg" height="45" bgcolor="#afe3f8">
			<td width="850" colspan="2" class="menu">
				<?php include ("menu.php"); ?>
			</td>
		</tr>
		<tr >
			<td class="isi" valign="top" bgcolor="#afe3f8">
				<center>
					<?php include ("content.php"); ?>
				</center><br>
			</td>
		</tr>
		<tr bgcolor="#afe3f8">
			<td class="footer" colspan="4" bgcolor="#9ACD32">&nbsp:
			<font size="3" face="" style='padding-right:95px;'>Copyright @ 2016 by : Sem.</font> </td>
		</tr>	
	</table>
	</center>
</body>
</html>
