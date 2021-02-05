<?php require_once('Connections/uye_dil.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "giris.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO ogrenci_bilgi_dil (id, ogrenci_adisoyadi, ogrenci_tc, ogrenci_dogumt, ogrenci_tel, ogrenci_okul, ogrenci_sinif, cinsiyet, eposta, veli_adisoyadi, veli_tc, veli_tel, veli2_adisoyadi, veli2_tel, ogrenci_seans, adres, burs, kayit_tutari, pesinat, aciklama, kayit_tarihi) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['ogrenci_adisoyadi'], "text"),
                       GetSQLValueString($_POST['ogrenci_tc'], "text"),
                       GetSQLValueString($_POST['ogrenci_dogumt'], "date"),
                       GetSQLValueString($_POST['ogrenci_tel'], "text"),
                       GetSQLValueString($_POST['ogrenci_okul'], "text"),
                       GetSQLValueString($_POST['ogrenci_sinif'], "text"),
                       GetSQLValueString($_POST['cinsiyet'], "text"),
                       GetSQLValueString($_POST['eposta'], "text"),
                       GetSQLValueString($_POST['veli_adisoyadi'], "text"),
                       GetSQLValueString($_POST['veli_tc'], "text"),
                       GetSQLValueString($_POST['veli_tel'], "text"),
                       GetSQLValueString($_POST['veli2_adisoyadi'], "text"),
                       GetSQLValueString($_POST['veli2_tel'], "text"),
                       GetSQLValueString($_POST['ogrenci_seans'], "text"),
                       GetSQLValueString($_POST['adres'], "text"),
                       GetSQLValueString($_POST['burs'], "text"),
                       GetSQLValueString($_POST['kayit_tutari'], "text"),
                       GetSQLValueString($_POST['pesinat'], "text"),
                       GetSQLValueString($_POST['aciklama'], "text"),
                       GetSQLValueString($_POST['kayit_tarihi'], "date"));

  mysql_select_db($database_uye, $uye);
  $Result1 = mysql_query($insertSQL, $uye) or die(mysql_error());

  $insertGoTo = "kayit_basarili.php";
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
<title>Kamp Programı Kayıt Ekranı</title>
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
<p align="center"><strong>ÖĞRENCİ KAYIT EKRANI</strong></p>
<p align="center"><strong>DİL EĞİTİMİ</strong></p>
<form action="listele.php" method="get" name="form1" id="form1">
  <p>Öğrenci arama :
  <input name="ogrenci_arama" type="search" id="ogrenci_arama" form="form1">
    <input name="ogrenci_arama" type="submit" id="ogrenci_arama" formaction="listele_filtre.php" formmethod="POST" value="Ara">
  </p>
  <p>Tüm listeyi görmek için <a href="listele.php">tıklayınız.</a></p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Öğrenci adı soyadı :</td>
      <td><input type="text" name="ogrenci_adisoyadi" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Öğrenci TC Kimlik no :</td>
      <td><input name="ogrenci_tc" type="text" required value="" size="32" maxlength="11"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Öğrenci doğum tarihi:</td>
      <td><input name="ogrenci_dogumt" type="date" id="ogrenci_dogumt" maxlength="8"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Öğrenci telefon no :</td>
      <td><input name="ogrenci_tel" type="text" value="" size="32" maxlength="11"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Öğrenci okulu :</td>
      <td><input type="text" name="ogrenci_okul" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Öğrenci sınıfı :</td>
      <td><select name="ogrenci_sinif" id="ogrenci_sinif">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>Hazırlık</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Cinsiyet :</td>
      <td><select name="cinsiyet" id="cinsiyet">
        <option>Bay</option>
        <option>Bayan</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Eposta :</td>
      <td><input type="text" name="eposta" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Veli adı soyadı :</td>
      <td><input type="text" name="veli_adisoyadi" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Veli TC Kimlik no :</td>
      <td><input name="veli_tc" type="text" value="" size="32" maxlength="11"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Veli telefon no :</td>
      <td><input name="veli_tel" type="text" value="" size="32" maxlength="11"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Veli 2 adı soyadı :</td>
      <td><input type="text" name="veli2_adisoyadi" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Veli 2 telefon no :</td>
      <td><input name="veli2_tel" type="text" value="" size="32" maxlength="11"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Öğrenci kayıt seansı :</td>
      <td><input type="text" name="ogrenci_seans" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Adres :</td>
      <td><textarea name="adres" id="adres"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Burs :</td>
      <td><input type="text" name="burs" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Kayıt tutarı :</td>
      <td><input type="text" name="kayit_tutari" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Peşinat :</td>
      <td><input type="text" name="pesinat" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Açıklama :</td>
      <td><textarea name="aciklama" id="aciklama"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="hidden" name="id" id="id">
      <input type="hidden" name="kayit_tarihi" id="kayit_tarihi"></td>
      <td><input type="submit" value="Kayıt Ekle"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form2">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>