<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
<link href="girissecim.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<style type="text/css">
a:link {
	color: #000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000;
}
a:hover {
	text-decoration: none;
	color: #FFF;
}
a:active {
	text-decoration: none;
	color: #000;
}
#footer {
	position: absolute;
	left: 260px;
	top: 771px;
	width: 1400px;
	height: 150px;
	z-index: 1;
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size: 17px;
	color: #000;
	background-color: #FC6;
	margin-top: 10px;
}
body {
	background-image: url(Savin-NY-Website-Background-Web.jpg);
	background-repeat: repeat;
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<div id="footer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <p>&nbsp;</p>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Ana Sayfa&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="secim.php">Okul Kayıt</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="listele.php">Kayıt Listesi</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hakkımızda&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="iletisim/index.php">İletişim</a></p>
</div>
<div id="wrapper">
  <div id="header">
    <div id="headerlogo"><a href="index.php"><img src="logo.png" width="420" height="130" alt="DELTA SEVİNÇ ÖĞRENCİ KAYIT SİSTEMİ" /></a></div>
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="index.php">Ana Sayfa</a></li>
      <li><a href="#" class="MenuBarItemSubmenu">Okul Kay&#305;t</a>
        <ul>
          <li><a href="ogrenci_kayit.php">D&ouml;nemlik Kay&#305;t</a></li>
          <li><a href="ogrenci_kayit_kamp.php">Kamp Program&#305;</a></li>
          <li><a href="ogrenci_kayit_test.php">Test Kl&uuml;b&uuml;</a></li>
        </ul>
      </li>
      <li><a href="#" class="MenuBarItemSubmenu">Kay&#305;t Listesi</a>
        <ul>
          <li><a href="listele.php">D&ouml;nemlik Kay&#305;tlar</a></li>
          <li><a href="listele_kamp.php">Kamp Program&#305;</a></li>
          <li><a href="#">Test Kl&uuml;b&uuml;</a></li>
        </ul>
      </li>
      <li><a href="#">Hakk&#305;m&#305;zda</a></li>
      <li><a href="iletisim/index.php">&#304;leti&#351;im</a></li>
    </ul>
    <div id="headerbilgi">
      <p><img src="mail.png" width="16" height="16" alt="Mail" /><a href="mailto:bakirkoyetutegitimmerkezi@sevinc.k12.tr">/bakirkoysevinc</a></p>
      <p><img src="facebook.png" width="16" height="16" alt="Facebook" /> <a href="https://www.facebook.com/Bak%C4%B1rk%C3%B6y-Sevin%C3%A7-Et%C3%BCt-E%C4%9Fitim-Merkezi-630567770438558/?fref=ts">/Bakırköy Sevinç Etüt Eğitim Merkezi</a></p>
      <p><img src="instagram.png" width="16" height="16" alt="instagram" /> <a href="https://www.instagram.com/bakirkoysevinc/">/bakirkoysevinc</a></p>
    </div>
  </div>
  <div id="bodysol">
      <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-25.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 5000,
              $PauseOnHover: 3,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 1,
                $Orientation: 2,
                $Align: 0,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        });
    </script>
    <style>
        .jssora052 {display:block;position:absolute;cursor:pointer;}
        .jssora052 .a {fill:none;stroke:#000;stroke-width:360;stroke-miterlimit:10;}
        .jssora052:hover {opacity:.8;}
        .jssora052.jssora052dn {opacity:.5;}
        .jssora052.jssora052ds {opacity:.3;pointer-events:none;}
    </style>
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:900px;height:600px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background:url('img/loading.gif') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:900px;height:600px;overflow:hidden;">
            <div>
                <a href="192.168.1.218/uyelik/index.php">
                    <img data-u="image" src="img/foto1.png" />
                </a>
                <div u="thumb">ÖĞRENCI KAYDI VE KAYITLI ÖĞRENCILERI LISTELEYEBILECEĞINIZ WEB TABANLI KAYIT SISTEMI.</div>
            </div>
            <div>
                <a href="192.168.1.218/uyelik/iletisim.php">
                    <img data-u="image" src="img/foto2.png" />
                </a>
                <div u="thumb">ÜYELİK ALMAK İÇİN TIKLAYINIZ. </div>
            </div>
            <a data-u="any" href="https://www.jssor.com" style="display:none">carousel slider</a>
        </div>
        <!-- Thumbnail Navigator -->
        <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:900px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
            <div u="slides">
                <div u="prototype" style="position:absolute;top:0;left:0;width:900px;height:50px;">
                    <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora052" style="width:45px;height:45px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora052" style="width:45px;height:45px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
  </div>
  <div id="bodysag"> <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FBak%25C4%25B1rk%25C3%25B6y-Sevin%25C3%25A7-Et%25C3%25BCt-E%25C4%259Fitim-Merkezi-630567770438558%2F%3Ffref%3Dts&tabs=timeline&width=490&height=600&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="490" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>