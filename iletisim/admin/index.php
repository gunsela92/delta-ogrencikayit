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

$MM_restrictGoTo = "../../hata.php";
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
include("../baglan.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title>TS Contact Form | Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.table {
		margin-bottom: 0px;
	}
	</style>
</head>
<body>
	<div class="container">
	<br>
	<div class="well">
	<table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Ad Soyad</th>
          <th>E - Posta</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
		<?php
		$calistir = mysql_query("select * from iletisim order by id DESC") or die("Hata Olustu!");
		while($oku=mysql_fetch_assoc($calistir))
		{
		?>
        <tr>
          <th scope="row"><?php echo $oku['id']; ?></th>
          <td><?php echo $oku['adsoyad']; ?></td>
          <td><?php echo $oku['eposta']; ?></td>
          <td><a href="goruntule.php?id=<?php echo $oku['id']; ?>">Görüntüle</a> - <a href="sil.php?id=<?php echo $oku['id']; ?>">Sil</a></td>
        </tr>
		<?php } ?>
      </tbody>
    </table>
	</div>
	</div>
	<p>
	  <script src="../js/bootstrap.min.js"></script>
</p>
	<p align="center"><a href="../../index.php">ANA SAYFA</a></p>
</body>
</html>