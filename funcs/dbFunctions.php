<?php
//require("config.inc.php");
//require("Database.class.php");

$servername='appony.ga';
$username='appony'; 
$password='appony1020';
$dbname='appony';

function createTicketRecord($isim, $konser)
{

$lucky= mt_rand();
$servername='46.101.113.44';
$username='appony'; 
$password='appony1020';
$dbname='appony';
$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "INSERT INTO appony.`fizy_basvuru` (`isim`, `konser`, `lucky`) VALUES ('".$isim."', '".$konser."', '".$lucky."');";

	if ($conn->query($sql) === TRUE) {
    	//echo "</br>INFO: New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	return $lucky;
}


function getTopMenu(){
echo "								<ul>\n"; 
echo "									<li class=\"current\"><a href=\"ratings.php\" class=\"icon fa-sliders\"> BaşvuruMetre</a></li>\n"; 
echo "									\n"; 
echo "								</ul>\n"; 
}


function replace_tr($text) {
$text = trim($text);
$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
$replace = array('C','c','G','g','i','I','O','o','S','s','U','u');
$new_text = str_replace($search,$replace,$text);
return $new_text;
}  




function getBoxDetails($appName){
$iosRating=getIOSRating($appName);
$iosRaterNum=getIOSRaterNum($appName);
$AndroidRating=getAndroidRating($appName);
$AndroidRaterNum=getAndroidRaterNum($appName);
$ImageURL=getImageUrl($appName);
echo "									<section class=\"box feature\">\n"; 
echo "										<a href=\"details.php?app=".$appName."\" class=\"image featured\" alt=\"Detayları görmek için logoya tıklayın...\"><img src=\"".$ImageURL."\" alt=\"Detayları görmek için logoya tıklayın...\" /></a>\n"; 
echo "										<div class=\"inner\">\n"; 
echo "											<header>\n"; 
echo "												<center><h2>".$appName."</h2></center>\n"; 
echo "												<p><p><center><a href=\"details.php?app=".$appName."\" class=\"button big icon fa-apple\">".$iosRating."</a>
																			<a href=\"details.php?app=".$appName."\" class=\"button big icon fa-android\">".$AndroidRating."</a>
																			</p></center> </p>\n"; 
echo "											</header>\n"; 
echo "											<p>".$appName." Apple Store'da <b>".$iosRaterNum." </b> , Google Play'de  <b>".$AndroidRaterNum."</b> kullanıcı tarafından değerlendirilmiştir </p>\n"; 
echo "										</div>\n"; 
echo "									</section>\n"; 
}


function getConcertRating(){

$servername='46.101.113.44';
$username='appony'; 
$password='appony1020';
$dbname='appony';
$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "select konser,count(1) adet from appony.fizy_basvuru  group by konser;";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$konser=$row["konser"];
    	$rating=$row["adet"];
    echo '{y: '.$rating.', label: "'.$konser.'"},';

    }

	$conn->close();
	//return $rating;
}
}



function getKonserBasvuru($isim,$konser){

$servername='46.101.113.44';
$username='appony'; 
$password='appony1020';
$dbname='appony';
$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$isim=strtolower($isim);
	$sql = "select count(1) adet from appony.fizy_basvuru  where konser='".$konser."' and lower(isim)='".$isim."'";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //	$konser=$row["konser"];
    	$rating=$row["adet"];
    //echo '{y: '.$rating.', label: "'.$konser.'"},';

    }

	$conn->close();
	return $rating;
}

}




?>
