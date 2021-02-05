<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_uye = "localhost";
$database_uye = "uye";
$username_uye = "root";
$password_uye = "deltak12";
$uye = mysql_pconnect($hostname_uye, $username_uye, $password_uye) or trigger_error(mysql_error(),E_USER_ERROR);
$tablo_adi = "ogrenci_bilgi_dil"; // DB'DEKI TABLO ADI
$tablo_sorgu = mysql_query("select * from $ogrenci_bilgi_dil");//echo $tablo_sorgu;exit;
?>