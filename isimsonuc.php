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

$colname_Recordset1 = "-1";
if (isset($_GET['ogrenci_adisoyadi'])) {
  $colname_Recordset1 = $_GET['ogrenci_adisoyadi'];
}
mysql_select_db($database_uye, $uye);
$query_Recordset1 = sprintf("SELECT ogrenci_adisoyadi, ogrenci_tc, ogrenci_tel, ogrenci_sinif, veli_adisoyadi, veli_tel, veli2_adisoyadi, veli2_tel, ogrenci_seans, kayit_tutari, aciklama, kayit_tarihi FROM ogrenci_bilgi WHERE ogrenci_adisoyadi = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $uye) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['isimara'])) {
  $colname_Recordset1 = $_GET['isimara'];
}
mysql_select_db($database_uye, $uye);
$query_Recordset1 = sprintf("SELECT ogrenci_adisoyadi, ogrenci_tel, ogrenci_sinif, veli_adisoyadi, veli_tel, veli2_adisoyadi, veli2_tel, ogrenci_seans, adres, kayit_tutari, aciklama, kayit_tarihi FROM ogrenci_bilgi WHERE ogrenci_adisoyadi LIKE %s", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $uye) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
<style type="text/css">
body,td,th {
	font-size: 13px;
	font-family: Calibri;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<p>Toplam bulunan kayıt sayısı : <?php echo $totalRows_Recordset1 ?> </p>
<table border="1">
  <tr>
    <td>Öğrenci Adı Soyadı</td>
    <td>Öğrenci Telefon</td>
    <td>Öğrenci Sınıfı</td>
    <td>Veli Adı Soyadı</td>
    <td>Veli Telefon</td>
    <td>Veli 2 Adı Soyadı</td>
    <td>Veli 2 Telefon</td>
    <td>Öğrenci Kayıt Seansı</td>
    <td>Adres</td>
    <td>Kayıt Tutarı</td>
    <td>Açıklama</td>
    <td>Kayıt Tarihi</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['ogrenci_adisoyadi']; ?></td>
      <td><?php echo $row_Recordset1['ogrenci_tel']; ?></td>
      <td><?php echo $row_Recordset1['ogrenci_sinif']; ?></td>
      <td><?php echo $row_Recordset1['veli_adisoyadi']; ?></td>
      <td><?php echo $row_Recordset1['veli_tel']; ?></td>
      <td><?php echo $row_Recordset1['veli2_adisoyadi']; ?></td>
      <td><?php echo $row_Recordset1['veli2_tel']; ?></td>
      <td><?php echo $row_Recordset1['ogrenci_seans']; ?></td>
      <td><?php echo $row_Recordset1['adres']; ?></td>
      <td><?php echo $row_Recordset1['kayit_tutari']; ?></td>
      <td><?php echo $row_Recordset1['aciklama']; ?></td>
      <td><?php echo $row_Recordset1['kayit_tarihi']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
