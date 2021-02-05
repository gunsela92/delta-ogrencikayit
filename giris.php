<?php require_once('Connections/uye.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['kullanici_adi'])) {
  $loginUsername=$_POST['kullanici_adi'];
  $password=$_POST['sifre'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "giris_basarili.php";
  $MM_redirectLoginFailed = "hata.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_uye, $uye);
  
  $LoginRS__query=sprintf("SELECT kullanici_adi, sifre FROM kayit WHERE kullanici_adi=%s AND sifre=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $uye) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
<style type="text/css">
body,td,th {
	font-size: 18px;
}
body {
	background-color: #999;
}
</style>
</head>

<body>
&nbsp;
<p>&nbsp;</p>
<p>&nbsp;</p>
<form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
  <table width="500" border="1" align="center">
    <tr>
      <td colspan="3"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KULLANICI GİRİŞİ </strong></td>
    </tr>
    <tr>
      <td width="107">Kullanıcı adı</td>
      <td width="4">:</td>
      <td width="367"><input type="text" name="kullanici_adi" id="kullanici_adi"></td>
    </tr>
    <tr>
      <td>Şifre</td>
      <td>:</td>
      <td><input type="password" name="sifre" id="sifre"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Giriş"></td>
    </tr>
  </table>
</form>
</body>
</html>