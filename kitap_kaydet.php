<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

$kitap_adi=$_POST['kitap_adi'];
$yazar_adi=$_POST['yazar_adi'];
$tur=$_POST['tur'];
$okundu=isset($_POST['okundu']) ? 'Evet' : 'Hayır';
try{
	$db=new
	PDO("mysql:host=localhost;dbname=webfinal;charset=utf8","root","");
	$sorgu=$db->prepare("INSERT INTO kitaplar (kitap_adi,yazar_adi,tur,okundu) VALUES (?,?,?,?)");
$sorgu->execute([$kitap_adi,$yazar_adi,$tur,$okundu]);

echo "Kitap başarıyla kaydedildi.";
}
catch (PDOException $e){
	echo "Hata:". $e->getMessage();
}
?>