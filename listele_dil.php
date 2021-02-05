<?php require_once('Connections/uye.php'); ?>
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

mysql_select_db($database_uye, $uye);
$query_Listele = "SELECT id, ogrenci_adisoyadi, ogrenci_tc, ogrenci_dogumt, ogrenci_tel, ogrenci_okul, ogrenci_sinif, cinsiyet, veli_adisoyadi, veli_tc, veli_tel, veli2_adisoyadi, veli2_tel, ogrenci_seans, adres, burs, kayit_tutari, pesinat, aciklama, kayit_tarihi FROM ogrenci_bilgi WHERE ogrenci_sinif = 'ogrenci_sinif'";
$Listele = mysql_query($query_Listele, $uye) or die(mysql_error());
$row_Listele = mysql_fetch_assoc($Listele);
$totalRows_Listele = mysql_num_rows($Listele);
$query_Listele = "SELECT * FROM ogrenci_bilgi_dil";
$Listele = mysql_query($query_Listele, $uye) or die(mysql_error());
$row_Listele = mysql_fetch_assoc($Listele);
$totalRows_Listele = mysql_num_rows($Listele);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
<style type="text/css">
body,td,th {
	font-size: 7pt;
	font-family: Tahoma;
	color: #000;
}
body {
	background-color: #FFF;
	font-size: 8px;
}
.baslik {
	font-family: Tahoma;
	font-size: 20px;
	color: #000;
}
#body {
	font-family: Tahoma;
	font-size: 7px;
	color: #000;
	background-color: #FFF;
	text-align: center;
	vertical-align: middle;
}
#footer {
	font-family: Tahoma;
	font-size: 18px;
	color: #000;
}
</style>


</head>


<body>
<p align="center" class="baslik"><strong>ÖĞRENCİ LİSTESİ</strong></p>
<p align="center" class="baslik">&nbsp;</p>
<p>&nbsp;</p>
<div id="body">
  <p>&nbsp;</p>
  <p>
    <label for="search">Search:</label>
<input type="search" name="search" id="search">
  </p>
  <table border="1">
    <tr>
      <td>Sıra</td>
      <td>Öğrenci adı soyadı</td>
      <td>Öğrenci Tc Kimlik</td>
      <td>Öğrenci doğum tarihi</td>
      <td>Öğrenci tel</td>
      <td>Öğrenci okulu</td>
      <td>Öğrenci sınıfı</td>
      <td>Cinsiyet</td>
      <td>Eposta</td>
      <td>Veli adı soyadı</td>
      <td>Veli TC Kimlik</td>
      <td>Veli telefon no</td>
      <td>Veli 2 adı soyadı</td>
      <td>Veli 2 telefon no</td>
      <td>Öğrenci kayıt seansı</td>
      <td>Adres</td>
      <td>Burs</td>
      <td>Kayıt tutarı</td>
      <td>Peşinat</td>
      <td>Açıklama</td>
      <td>Kayıt tarihi</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Listele['id']; ?></td>
        <td><?php echo $row_Listele['ogrenci_adisoyadi']; ?></td>
        <td><?php echo $row_Listele['ogrenci_tc']; ?></td>
        <td><?php echo $row_Listele['ogrenci_dogumt']; ?></td>
        <td><?php echo $row_Listele['ogrenci_tel']; ?></td>
        <td><?php echo $row_Listele['ogrenci_okul']; ?></td>
        <td><?php echo $row_Listele['ogrenci_sinif']; ?></td>
        <td><?php echo $row_Listele['cinsiyet']; ?></td>
        <td><?php echo $row_Listele['eposta']; ?></td>
        <td><?php echo $row_Listele['veli_adisoyadi']; ?></td>
        <td><?php echo $row_Listele['veli_tc']; ?></td>
        <td><?php echo $row_Listele['veli_tel']; ?></td>
        <td><?php echo $row_Listele['veli2_adisoyadi']; ?></td>
        <td><?php echo $row_Listele['veli2_tel']; ?></td>
        <td><?php echo $row_Listele['ogrenci_seans']; ?></td>
        <td><?php echo $row_Listele['adres']; ?></td>
        <td><?php echo $row_Listele['burs']; ?></td>
        <td><?php echo $row_Listele['kayit_tutari']; ?></td>
        <td><?php echo $row_Listele['pesinat']; ?></td>
        <td><?php echo $row_Listele['aciklama']; ?></td>
        <td><?php echo $row_Listele['kayit_tarihi']; ?></td>
      </tr>
      <?php } while ($row_Listele = mysql_fetch_assoc($Listele)); ?>
  </table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?
require_once('connections/uye.php'); // Veritabani Baglanti
// Mysql den gelen verileri excel stünlarina yazmak
if(isset($_POST["sql_excel"])){ // FORM SONUC
$dos = "bilgiler.xls"; // EXCEL TABLOSU ADI
$yaz = @fopen($dos,'w+'); 
$tablo_adi = "ogrenci_bilgi"; // DB'DEKI TABLO ADI
$tablo_sorgu = mysql_query("select * from $tablo_adi");//echo $tablo_sorgu;exit;
fwrite($yaz,"Ogrenci Adı Soyadı\t Ogrenci Tc Kimlik\t Ogrenci Dogum Tarihi\t Ogrenci Telefon\t Ogrenci Okulu\t Ogrenci Sınıfı\t Cinsiyet\t Eposta\t Veli Adı Soyadı\t Veli Tc\t Veli Telefon \t Veli 2 Adı Soyadı\t Veli 2 Telefon\t Ogrenci Seans\t Adres\t Burs\t Kayıt Tutarı\t Peşinat\t Açıklama\t Kayıt tarihi\t \n"); //sütun başlık 
while ($tablo_sonuc = mysql_fetch_row($tablo_sorgu)) {
$a = $id; // (id) SQL'DEKI TABLOLARINIZDAKI SATIR ADLARI
$b = $ogrenci_adisoyadi[1]; // (satir 2) SQL'DEKI TABLOLARINIZDAKI SATIR ADLARI
$c = $ogrenci_tc[2]; // (satir 3) SQL'DEKI TABLOLARINIZDAKI SATIR ADLARI
$d = $ogrenci_dogumt[3]; // (satir 4) SQL'DEKI TABLOLARINIZDAKI SATIR ADLARI
$e = $ogrenci_tel[4]; // (satir 5) SQL'DEKI TABLOLARINIZDAKI SATIR ADLARI
$f = $ogrenci_okul[5]; // (satir 6) SQL'DEKI TABLOLARINIZDAKI SATIR ADLARI
$g = $ogrenci_sinif[6]; // (satir 7) SQL'DEKI TABLOLARINIZDAKI SATIR ADLARI
$g = $cinsiyet[6];
$h = $eposta[6];
$i = $veli_adisoyadi[6];
$j = $veli_tc[6];
$k = $veli_tel[6];
$m = $veli2_adisoyadi[6];
$n = $veli2_tel[6];
$o = $ogrenci_seans[6];
$p = $adres[6];
$q = $burs[6];
$r = $kayit_tutari[6];
$s = $pesinat[6];
$t = $aciklama[6];
$u = $kayit_tarihi[6];

 
fwrite($yaz,"$a\t $b\t $c\t $d\t $e\t $f\t $g\t \n"); // VE EXCELE SQL DEN GELEN VERILERI YAZIYORUZ
}
mysql_free_result($tablo_sorgu); // DB YI BOSALTIYORUZ
fclose($yaz); // EXCEL TABLOSUNU KAPATIYORUZ
echo "Veriler Aktarildi"; 
exit;
}
?>
<?php echo $totalRows_Listele ?>
</body>
</html>
<?php
mysql_free_result($Listele);
?>
