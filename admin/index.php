<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Halaman Login</title>
	<link rel="stylesheet" href="../css/stylelogin.css" type="text/css" media="all" />
</head>
<body>
<form action="logout.php?op=in" method="post" name="login">
<table width="368" height="182" border="0">
  <tr>
    <td colspan="3" align="center">
		<font size="4" color="#091e32" face="Snap inc">LOGIN</font>
	</td>
  </tr>
<tr>
    <td width="94"><font color="#091e32" face="Snap inc">Username</font></td>
	<td width="15">:</td>
    <td width="253"><input type="text" name="userid"></td>
  </tr>
  <tr>
    <td><font color="#091e32" face="Snap inc">Password</font></td>
	<td>:</td>
    <td><input type="password" name="psw"></td>
  </tr>
  <tr>
	<td></td><td></td>
    <td colspan="3" align="center"><input type=submit name=login Value=LOGIN></td>
  </tr>
</table>
</form>
</body>
</html>
