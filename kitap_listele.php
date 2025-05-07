<?php
error_reporting(E_ALL);
ini_set('display_errors'.1);

try{
	$db=new
	PDO("mysql:host=localhost;dbname=webfinal;charset=utf8","root","");
	$sorgu=$db->query(SELECT *FROM KİTAPLAR",PDO::FETCH_ASSOC);
	
	echo "<h2>Kitap Listesi</h2>";
	echo "<table border='1' cellpadding='5'>";
	echo "<tr><th>ID></th><th>Kitap Adı</th><th>Yazar</th><th>Tür</th><th>Okundu</th><th>Sil</th<th>Güncelle</th></tr>";
	foreach($sorgu AS $satir){
		echo "<tr>";
		echo "<td>".$satir['id']."</td>";
		echo "<td>".$satir['kitap_adi']."</td>";
		echo "<td>".$satir['yazar_adi']."</td>";
		echo "<td>".$satir['tur']."</td>";
		echo "<td>".$satir['okundu']."</td>";
		echo "<td><a href="kitap_sil.php?id=".$satir['id']."'onclick='return confirm(\"Silmek istediğine emin misin?"\)'>Sil</a></td>";
		echo "<td><a href='kitap_guncelle.php?id=".$satir=['id']."'>Güncelle</a></td>";
		echo "</tr>";
	}
	catch (PDOE xception $e){
		echo "Hata:".$e->getMessage();
	}
		
?>