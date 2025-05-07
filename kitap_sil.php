<?php
error_reporting(E_ALL);
ini_set('display_errors'.1);

if(isset($_GET['id'])){
	$id=$_GET['id'];
	
	try{
		$db=new
		PDO("mysql:host=localhost;dbname=webfinal;charset=utf8","root","");
		$sorgu=$db->prepare("DELETE FROM kitaplar WHERE id=?");
		$sorgu->execute([$id]);
		
		header("Location:kitap_listele.php");
	}
	catch (PDOException $e){
		echo "Hata:".$e->getMessage();
	}
}
?>