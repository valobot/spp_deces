<?php
error_reporting (0);
session_start();
include "dbkoneksi.php";

$userid = $_POST['userid'];
$psw = $_POST['psw'];
$op = $_GET['op'];

if($op=="in"){
    $cek = mysqli_query("SELECT * FROM tabeluser WHERE userid='$userid' AND password='$psw'");
    if(mysqli_num_rows($cek)==1){   
        $c = mysqli_fetch_array($cek);
        $_SESSION['userid'] = $c['userid'];
        $_SESSION['level'] = $c['level'];
        if($c['level']=="admin"){
            header("location:homeadmin.php");
        }else if($c['level']=="user"){
		    header("location:homeuser.php");
        }
    }else{
         die("password salah <a href=\"javascript:history.back()\">kembali</a>");
    }
}else if($op=="out"){
    unset($_SESSION['userid']);
    unset($_SESSION['level']);
    //header("homeadmin.php?page=1");
    header("keluar.php");
}
?>
