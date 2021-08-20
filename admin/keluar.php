<?php
  session_start();
  session_destroy();
  echo "<center>Anda telah sukses keluar dari sistem ini<b>[LOGOUT]<b>";
  echo "<center><a href=../index.php><b>[LOGIN]</a><b>";
?>
