<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Fizy Konser Tikıt: Powered by VAS-MiS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
<?php 
//error_reporting(E_ALL);
ini_set('display_errors', 1);
require("funcs/dbFunctions.php");

//echo "INFO: jenkins - github akisi test";
echo "<div id=\"page-wrapper\">\n"; 
echo "\n"; 
echo "			<!-- Header -->\n"; 
echo "				<div id=\"header-wrapper\">\n"; 
echo "					<header id=\"header\" class=\"container\">\n"; 
echo "\n"; 
echo "						<!-- Logo -->\n"; 
echo "							<div id=\"logo\">\n"; 
echo "								<h1><a href=\"index.php\" class=\"icon fa-music\"> AO konserde</a></h1>\n"; 
echo "								<span>Fizy Kış Konserleri 2017</span>\n"; 
echo "							</div>\n"; 
echo "\n"; 
echo "						<!-- Nav -->\n"; 
echo "							<nav id=\"nav\">\n"; 
								//Aygun: getTopMenu() returns navigation menu items
								getTopMenu();
echo "							</nav>\n"; 

echo "\n"; 
echo "					</header>\n"; 
//BAŞVURU SONUCU
if (isset($_POST["isim"])) { 
	$isim=replace_tr($_POST["isim"]); 
	$konser=$_POST["konser"];  
	$kontrol=getKonserBasvuru($isim,$konser);
	//echo "LOG - kontrol: ".$kontrol;
		if ($kontrol==0) {
						$result=createTicketRecord($isim,$konser);
						echo "<center><h2>Başvurunu aldık; çekiliş için şanslı numaran: ".$result."</h2></center>";
						}
		if ($kontrol>0) {
						echo "<h2>Bu konser için zaten başvurmuşsun :)</h2></center>";}
						} 

		else if (isset($_POST["isim2"])){
		   		$konserler=$_POST["konserler"];
		   		$konser_sayi=count($konserler);
		   		//print_r($konserler);
		   		//echo "</br>LOG-INFO - konser sayisi: ".$konser_sayi."</br>";
		   		$isim=replace_tr($_POST["isim2"]); 
		    	//echo "</br>LOG-INFO - isim: ".$isim."</br>";
		    	echo "			<!-- Banner -->\n"; 
				echo "				<div id=\"banner-wrapper\">\n"; 
				echo "					<div id=\"banner\" class=\"box container\">\n"; 
				echo "						<div class=\"row\">\n"; 
				echo "							<div class=\"12u 12u(medium)\">\n"; 
				echo "<h2>Başvurunu aldık, yapılacak çekilişleri takip etmek için aşağıdaki numaraları not edebilirsin :)</h2></br>";
		     	foreach($_POST['konserler'] as $konser) {
		     	//die(var_dump($konser));
		     	//$konser=$konserler[$x];
		     	$konser= str_replace('“', '', $konser);
		     	$konser= str_replace('”', '', $konser);
				//$result=createTicketRecord($isim,$konser); 
				$kontrol=getKonserBasvuru($isim,$konser);
	//echo "LOG - kontrol: ".$kontrol;
						if ($kontrol==0) {
										$result=createTicketRecord($isim,$konser);
										echo $konser." konseri için başvuru numaran: ".$result."</br>";
										}
						if ($kontrol>0) {
										echo $konser." konseri için zaten başvurmuşsun :)</br>";}
										} 
				echo "							</div>\n"; 
				echo "						</div>\n"; 
				echo "					</div>\n"; 
				echo "				</div>\n"; 
				//echo "TOPLU BAŞVURU";
	}		
else 
	{echo "<center>Bu hafta 17 Şubat Gökhan Tepe ve 18 Şubat Zerrin Özer Konserlerine davetiye kazanabilirsin! 
			İster her hafta tek tek başvur, isteresen toplu başvuru yap, tercih senin :) </br> Bir de chrome yada safari kullanmanı rica ediyorum :) Başvur demeden önce ismini yazmayı unutma :)";}




echo "				</div>\n"; 
echo "\n"; 

echo "			<!-- Banner -->\n"; 
echo "				<div id=\"banner-wrapper\">\n"; 
echo "					<div id=\"banner\" class=\"box container\">\n"; 
echo "						<div class=\"row\">\n"; 
echo "							<div class=\"7u 12u(medium)\">\n"; 
echo "<center><div class=\"7u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/fizykonserleri.png\" alt=\"\" /></a></div>\n"; 

echo "								<h2></h2>\n"; 
echo "								</center>16 Şubat - 12 Mayıs arasında MOi Sahne'deki konserlerde AO olarak en öndeki yerimizi alacağız.\nHer hafta yapılacak çekilişler ile çift kişilik bilet kazanma şansı bizi bekliyor. Hemen katıl, eğlenceyi kaçırma! "; 
echo "							</div>\n"; 
echo "							<div class=\"5u 12u(medium)\">\n"; 
echo "								<ul>\n"; 
echo "									<li><a href=\"#form-burada\" class=\"button big icon fa-pencil\">Başvur</a></li>\n"; 
echo "									<li><a href=\"#main-wrapper\" class=\"button big icon fa-question-circle\">Kimler var</a></li>\n"; 
echo "									<li><a href=\"#nerede\" class=\"button big icon fa-map-marker\">MOi Nerede</a></li>\n"; 
echo "								</ul>\n"; 
echo "							</div>\n"; 
echo "						</div>\n"; 
echo "					</div>\n"; 
echo "				</div>\n"; 


echo "</br></br></br>\n"; 








echo "			<!-- Formlar -->\n"; 
echo "				<div id=\"form-burada\">\n"; 
echo "					<div class=\"container\">\n"; 
echo "						<div class=\"row\" name=\"uygulamalar\">\n"; 
echo "							<div class=\"6u 12u(medium)\">\n"; 
echo "\n"; 
echo "								<!-- Box -->\n"; 
//										getBoxDetails('fizy');
echo "									<section class=\"box feature\">\n"; 
echo "										<a href=\"#\" class=\"image featured\" alt=\"Detayları görmek için logoya tıklayın...\"><img src=\"http://fizy.ga/images/gokhantepepera_2017_1.jpg\"/></a>\n"; 
echo "										<div class=\"inner\">\n"; 
echo "											<header>\n"; 
echo "												<center><h2> 17 Şubat </br>Gökhan Tepe Konserine çift kişilik davetiye kazanmak için</h2>\n"; 
echo '							<form action="index.php" method="post"> 
								 <p><input type="text" placeholder="Adın Soyadın" name="isim" /> 
								  <input type="hidden" name="konser" value="GokhanTepe">  
								 <input class="button small icon fa-pencil" type="Submit" value="Başvur"/></p> </form></center>';
echo "										</div>\n"; 
echo "									</section>\n"; 
echo "\n"; 
echo "							</div>\n";


echo "							<div class=\"6u 12u(medium)\">\n"; 
echo "\n"; 
echo "								<!-- Box -->\n"; 
//									getBoxDetails('bip');
echo "									<section class=\"box feature\">\n"; 
echo "										<a href=\"#\" class=\"image featured\" alt=\"Detayları görmek için logoya tıklayın...\"><img src=\"http://fizy.ga/images/zerrinözerpera_2017.jpg\"/></a>\n"; 
echo "										<div class=\"inner\">\n"; 
echo "											<header>\n"; 
echo "												<center><h2> 18 Şubat</br>Zerrin Özer Konserine çift kişilik davetiye kazanmak için</h2>\n"; 
echo '							<form action="index_control.php" method="post"> 
								 <p><input type="text" placeholder="Adın Soyadın" name="isim" /> 
								  <input type="hidden" name="konser" value="ZerrinOzer">  
								 <input class="button small icon fa-pencil" type="Submit" value="Başvur"/></p> </form></center>';
echo "										</div>\n"; 
echo "									</section>\n"; 
echo "\n"; 
echo "							</div>\n"; 



echo "						</div>\n"; 
echo "					</div>\n"; 
echo "				</div>\n"; 
echo "\n"; 



echo "</br></br></br>\n"; 


echo "			<!-- Banner -->\n"; 
echo "				<div id=\"banner-wrapper\">\n"; 
echo "					<div id=\"banner\" class=\"box container\">\n"; 
echo "						<div class=\"row\">\n"; 
echo "							<div class=\"7u 12u(medium)\">\n"; 
echo "<center><div class=\"7u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/fizykonserleri.png\" alt=\"\" /></a></div>\n"; 

echo "								\n"; 
echo "								</center><h3></br>Beni her hafta uğraştırma, istediklerimi seçeyim ve toplu başvuru yapayım diyorsan</h3>"; 
echo "							</div>\n"; 
echo "							<div class=\"5u 12u(medium)\">\n"; 
echo "												<center><h2></h2>\n"; 
echo '							<form action="index_control.php" method="post"> 
								<p><input type="text" placeholder="Adın Soyadın" name="isim2" />
								<h3>Gitmek istediğin Konserler:</h3> 
								<select name="konserler[]" multiple>
										<option value="GokhanTepe">Gökhan Tepe</option>
										<option value="ZerrinOzer">Zerrin Özer</option>
										<option value="ErkanOgur">Erkan Oğur & Ismail Hakkı Demircioğlu</option>
										<option value="GokhanTurkmen">Gökhan Türkmen</option>
										<option value="BulentOrtacgil">Bülent Ortaçgil</option>
										<option value="Goksel">Göksel</option>
										<option value="MehmetErdem">Mehmet Erdem</option>
										<option value="MabelMatiz">Mabel Matiz</option>
										<option value="TaksimTrio">Taksim Trio</option>
										<option value="iremDerici">İrem Derici</option>
										<option value="Yasar">Yaşar</option>
										<option value="FettahCan">Fettah Can</option>
										<option value="BirenTezer">Birsen Tezer</option>
										<option value="Ceza">Ceza</option>
										<option value="FerhatGocer">Ferhat Göçer</option>
										<option value="CemAdrian">Cem Adrian</option>
										<option value="MuratDalkilic">Murat Dalkılıç</option>
										<option value="CengizKurtoglu">Cengiz Kurtoğlu</option>
										<option value="DemetAkalin">Demet Akalın</option>
										<option value="LeventYuksel">Levent Yüksel</option>
										<option value="SerkanKaya">Serkan Kaya</option>
										<option value="HandeYener">Hande Yener</option>
										<option value="HakanAltun">Hakan Altun</option>
								</select>
								 <input class="button small icon fa-pencil" type="Submit" value="Başvur"/></p> </form></center>';
echo "							</div>\n"; 
echo "						</div>\n"; 
echo "					</div>\n"; 
echo "				</div>\n"; 

echo "</br></br></br>\n"; 


echo "			<!-- Main -->\n"; 
echo "				<div id=\"main-wrapper\">\n"; 
echo "					<div class=\"container\">\n"; 
echo "						<div class=\"row 200%\">\n"; 
echo "							<div class=\"4u 12u(medium)\">\n"; 
echo "\n"; 
echo "								<!-- Sidebar -->\n"; 
echo "									<div id=\"sidebar\">\n"; 
echo "										<section class=\"widget thumbnails\">\n"; 
echo "											<h3>Fizy 2017 Kış Konserleri</h3>\n"; 
echo "											<div class=\"grid\">\n"; 
echo "												<div class=\"row 50%\">\n"; 



echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/fizykonserleri.png\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/demetakalin_moi.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/handemoi2017.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/cezapera_2017.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/erkanveismail3.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/zerrinözerpera_2017.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/goksel2016pera.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/cemadrianpera_2017.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/mehmeterdempera_2017.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/birsentezerpera_2017.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/serkankayamoi2017.jpg\" alt=\"\" /></a></div>\n"; 
echo "<div class=\"6u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images/hakanaltun_moi.jpg\" alt=\"\" /></a></div>\n"; 




echo "												</div>\n"; 
echo "											</div>\n"; 
echo "										</section>\n"; 
echo "									</div>\n"; 
echo "\n"; 
echo "							</div>\n"; 
echo "							<div class=\"8u 12u(medium) important(medium)\">\n"; 
echo "\n"; 
echo "								<!-- Content -->\n"; 
echo "									<div id=\"content\">\n"; 
echo "										<section class=\"last\">\n"; 
echo "											<h2>Çekiliş sonuçları</h2>\n"; 
echo "											
													17 Şubat  -  Gökhan Tepe   -  </br>
													18 Şubat  -  Zerrin Özer   -  </br>
													24 Şubat  -  Erkan Oğur & Ismail Hakkı Demircioğlu   -  </br>
													25 Şubat  -  Gökhan Türkmen   -  </br>
													03 Mart  -  Bülent Ortaçgil   -  </br>
													10 Mart  -  Göksel   -  </br>
													17 Mart  -  Mehmet Erdem   -  </br>
													18 Mart  -  Mabel Matiz   -  </br>
													24 Mart  -  Taksim Trio   -  </br>
													25 Mart  -  İrem Derici   -  </br>
													31 Mart  -  Yaşar   -  </br>
													01 Nisan  -  Fettah Can   -  </br>
													07 Nisan  -  Birsen Tezer   -  </br>
													08 Nisan  -  Ceza   -  </br>
													14 Nisan  -  Ferhat Göçer   -  </br>
													15 Nisan  -  Cem Adrian   -  </br>
													21 Nisan  -  Murat Dalkılıç   -  </br>
													22 Nisan  -  Cengiz Kurtoğlu   -  </br>
													26 Nisan  -  Demet Akalın   -  </br>
													05 Mayıs  -  Serkan Kaya   -  </br>
													06 Mayıs  -  Hande Yener   -  </br>
													12 Mayıs  -  Hakan Altun   -  </br> 
													\n"; 
echo "										</section>\n"; 
echo "									</div>\n";  
echo "							</div>\n"; 
echo "						</div>\n"; 
echo "					</div>\n"; 
echo "				</div>\n"; 
echo "\n"; 
echo "\n"; 
echo "\n"; 
echo "</br></br></br>\n"; 
echo "\n"; 




echo "			<!-- Banner -->\n"; 
echo "				<div id=\"nerede\">\n"; 
echo "					<div id=\"banner\" class=\"box container\">\n"; 
echo "						<div class=\"row\">\n"; 
echo "							<div class=\"12u 12u(medium)\">\n"; 
echo "<center><div class=\"7u\"><a href=\"#\" class=\"image fit\"><img src=\"http://fizy.ga/images//moi_kurumsal2.jpg\" alt=\"\" /></a></div>\n"; 

echo "								<h2>Moi Sahne</h2>\n"; 
echo "								Mall of İstanbul / Kat:3 </br>
									Süleyman Demirel Bulvarı Mahmutbey Başakşehir / İstanbul </br>
									<a target=\"blank\" href=\"https://www.moisahne.com/ulasim/\">Nasıl giderim?</a>"; 
echo "							</center></div>\n"; 
echo "						</div>\n"; 
echo "					</div>\n"; 
echo "				</div>\n"; 







echo "</br></br></br>\n"; 

echo "			<!-- Footer -->\n"; 
echo "				<div id=\"footer-wrapper\">\n"; 
echo "					<footer id=\"footer\" class=\"container\">\n"; 
echo "						<div class=\"row\">\n"; 
echo "							<div class=\"8u 12u(medium) 12u$(small)\">\n"; 
echo "\n"; 
echo "								<!-- Links -->\n"; 
echo "									<section class=\"widget links\">\n"; 
echo "										<h3>Fizy Konser Tikıt Hakkında</h3>\n"; 
echo "										<ul class=\"style2\">\n"; 
echo "											<li>VAS Yazılım Geliştirme Kulübü tarafından, 2017  Yeni Nesil Teknolojiler dersi kapsamında geliştirilmiştir.</li>\n"; 
echo "										</ul>\n"; 
echo "									</section>\n"; 
echo "\n"; 
echo "							</div>\n"; 
echo "							<div class=\"3u 6u$(medium) 12u$(small)\">\n"; 
echo "\n"; 
echo "								<!-- Contact -->\n"; 
echo "									<section class=\"widget contact last\">\n"; 
echo "										<h3>Bize Ulaşın</h3>\n"; 
echo "										<ul>\n"; 
echo "											<li><a href=\"#\" class=\"icon fa-twitter\"><span class=\"label\">Twitter</span></a></li>\n"; 
echo "											<li><a href=\"#\" class=\"icon fa-facebook\"><span class=\"label\">Facebook</span></a></li>\n"; 
echo "											<li><a href=\"#\" class=\"icon fa-instagram\"><span class=\"label\">Instagram</span></a></li>\n"; 
echo "											<li><a href=\"#\" class=\"icon fa-dribbble\"><span class=\"label\">Dribbble</span></a></li>\n"; 
echo "											<li><a href=\"#\" class=\"icon fa-pinterest\"><span class=\"label\">Pinterest</span></a></li>\n"; 
echo "										</ul>\n"; 
echo "										<p>VAS-MIS<br />\n"; 
echo "										<br />\n"; 
echo "										</p>\n"; 
echo "									</section>\n"; 
echo "\n"; 
echo "							</div>\n"; 
echo "						</div>\n"; 
echo "						<div class=\"row\">\n"; 
echo "							<div class=\"12u\">\n"; 
echo "								<div id=\"copyright\">\n"; 
echo "									<ul class=\"menu\">\n"; 
echo "										<li>&copy; Appony & Tikıt All rights reserved</li><li>Design: HTML5 UP / Verti</li>\n"; 
echo "									</ul>\n"; 
echo "								</div>\n"; 
echo "							</div>\n"; 
echo "						</div>\n"; 
echo "					</footer>\n"; 
echo "				</div>\n"; 
echo "\n"; 
echo "			</div>\n"; 
echo "\n"; 
echo "		<!-- Scripts -->\n"; 
echo "\n"; 
echo "			<script src=\"assets/js/jquery.min.js\"></script>\n"; 
echo "			<script src=\"assets/js/jquery.dropotron.min.js\"></script>\n"; 
echo "			<script src=\"assets/js/skel.min.js\"></script>\n"; 
echo "			<script src=\"assets/js/util.js\"></script>\n"; 
echo "			<!--[if lte IE 8]><script src=\"assets/js/ie/respond.min.js\"></script><![endif]-->\n"; 
echo "			<script src=\"assets/js/main.js\"></script>\n";


?>
	</body>
</html>
