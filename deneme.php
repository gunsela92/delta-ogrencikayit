<BODY onload="rotatebanners()">
<!-- JavaScript Banner Rotator - Rotate banners in order after a set period of time.
<!-- Text automatically created by Banner Maker Pro www.bannermakerpro.com-->
<!-- Put this text in the BODY section of the HTML (Note: Add the "onload="rotatebanners()" to the BODY tag-->

<script language="JavaScript">
<!--
var AdNum = 0;

function initArray() {
this.length = initArray.arguments.length;
  for (var i = 0; i < this.length; i++) {
  this[i] = initArray.arguments[i];
  }
}

links = new initArray(
"192.168.1.218/uyelik/giris.php",
"192.168.1.218/uyelik/iletisim.php"
)


images = new initArray(
"<a href="https://hizliresim.com/G0mz9N"><img src="https://i.hizliresim.com/G0mz9N.jpg"></a>",
"<a href="https://hizliresim.com/y36409"><img src="https://i.hizliresim.com/y36409.jpg"></a>"
)


alttext = new initArray(
"ÖĞRENCI KAYITLARI YAPABILECEĞINIZ VE KAYDETTIĞINIZ ÖĞRENCILERI LISTELEYEBILECEĞINIZ KURUM IÇI WEB TABANLI ÖĞRENCI KAYIT SISTEMI.",
"ÖĞRENCI KAYIT IŞLEMLERI ÜYELIK OLMADAN YAPILAMAZ. ÜYELIK IŞLEMLERI SADECE YÖNETICI ONAYIYLA YAPILABILIR. ÜYELIK ALMAK IÇIN SAYFA YÖNETICISI ILE GÖRÜŞÜNÜZ VEYA ILETIŞIM FORMUNU DOLDURUNUZ."
)

// -->
</script>

<script language="JavaScript">
<!--
var bannerlink = "192.168.1.218/uyelik/giris.php"
var banlink = ""
function rotatebanners() {
if (AdNum == 2) { 
  AdNum = 0 
} 
document.BannerAd.src=images[AdNum] 
document.BannerAd.alt=alttext[AdNum]
setTimeout("rotatebanners()",5000)
bannerlink = links[AdNum]
banlink.href=links[AdNum]
AdNum++
} 

function changelink() {
 location = bannerlink
 }
// -->
</script>

<a href='javascript:changelink()' name="banlink"><img src="<a href="https://hizliresim.com/G0mz9N"><img src="https://i.hizliresim.com/G0mz9N.jpg"></a>" name="BannerAd" alt="" ></a>

<!-- End Banner Rotator BODY Code -->
