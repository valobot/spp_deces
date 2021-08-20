<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>SPP SMP-SMK</title>
	<link rel="stylesheet" href="css/stylehu.css" type="text/css"/>
	<script language='JavaScript1.2'>
		function disableselect(e){
		return false
		}

		function reEnable(){
		return true
		}

		document.onselectstart=new Function (&quot;return false&quot;)

		//if NS6
		if (window.sidebar){
		document.onmousedown=disableselect
		document.onclick=reEnable
		}
	</script>
	<script language='JavaScript'>curPage=1;
		document.oncontextmenu = function(){return false}
		if(document.layers) {
		window.captureEvents(Event.MOUSEDOWN);
		window.onmousedown = function(e){
		if(e.target==document)return false;
		}
		}
		else {
		document.onmousedown = function(){return false}
		}
	</script>
</head>
<body background="admin/images/admin.jpg">
<div class="table1">
	<form action="" method="post">
		<table align="center">
			<tr>
				<td align="center"><font size="6"><b>LOGIN</b></font></td>
			</tr>
			<tr>
				<td align="center">
					<a href="admin/index.php"><img src="admin/images/lock.png" width="150" height="160"></img><br>
					<div class="text">Silahkan Klik Untuk Login
					</div></a>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
