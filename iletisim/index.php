<?php 
include("baglan.php");
@$adsoyad=$_POST['adsoyad']; 
@$eposta=$_POST['eposta']; 
@$mesaj=$_POST['mesaj']; 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title>İletişim Formu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
	<br>
	<?php
	if ($adsoyad=="" or $eposta=="" or $mesaj=="") {
		
	} else {
	$kaydet = mysql_query("insert into iletisim (adsoyad, eposta, mesaj) values ('$adsoyad', '$eposta', '$mesaj')") or die("<div class='alert alert-danger'><p>Mesajınız gönderilirken bi sorun oluştu lütfen daha sonra tekrar denetin.</p></div>");
echo "<div class='alert alert-success'><p>Mesajınız başarıyla gönderildi.</p></div>";
		}
	?>
	<form action="index.php" method="post">
  <div class="form-group">
    <label>Ad Soyad</label>
    <input type="text" class="form-control" id="contact" name="adsoyad" placeholder="Ad Soyad">
  </div>
  <div class="form-group">
    <label>E - Posta</label>
    <input type="text" class="form-control" id="contact" name="eposta" placeholder="E - Posta">
  </div>
  <div class="form-group">
    <label>Mesajınız</label>
    <textarea class="form-control" rows="3" name="mesaj" placeholder="Mesajınız"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Gönder
	</button>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="btn-primary"><a href="../index.php" class="btn-primary">Ana Sayfa</a></span>
    </form>
	</div>
	<p>
	  <script src="js/bootstrap.min.js"></script>
</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p align="center" class="btn-info"><a href="admin/goruntule.php">YÖNETİCİ GİRİŞİ </a></p>
</body>
</html>