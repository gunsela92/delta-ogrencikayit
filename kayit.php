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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO kayit (id, kullanici_adi, sifre, eposta, kayit_tarihi) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['kullanici_adi'], "text"),
                       GetSQLValueString($_POST['sifre'], "text"),
                       GetSQLValueString($_POST['eposta'], "text"),
                       GetSQLValueString($_POST['kayit_tarihi'], "date"));

  mysql_select_db($database_uye, $uye);
  $Result1 = mysql_query($insertSQL, $uye) or die(mysql_error());

  $insertGoTo = "giris.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
<style type="text/css">
body,td,th {
	font-size: 20px;
	color: #000;
}
body {
	background-color: #999;
}
</style>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Kullanıcı adı :</td>
      <td><input type="text" name="kullanici_adi" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Şifre :</td>
      <td><input type="password" name="sifre" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Eposta :</td>
      <td><input type="text" name="eposta" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="hidden" name="id" id="id">
      <input type="hidden" name="kayit_tarihi" id="kayit_tarihi"></td>
      <td><input type="submit" value="Kayıt ol"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>