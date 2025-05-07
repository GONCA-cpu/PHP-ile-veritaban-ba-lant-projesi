<?php
//POST:Gelen verileri alır1
$kullaniciAdi=$_POST['isim'];
$soyisim=$_POST['soyisim'];
$sifre=$_POST['sifre'];
$cinsiyet=$_POST['cinsiyet'];
$dogumTarihi=$_POST['dt'];
$diller="";

//ISSET:Bir değişken tanımlı mı değilmi onu kontrol eder.
//EMPTY:Boş olup olmadığını konntrol eder.
if(isset($_POST["dil1"]));
	$diller=$diller." ". $_POST["dil1"];
if(isset($_POST["dil2"]));
    $diller=$diller." ". $_POST["dil2"];
if(isset($_POST["dil3"]));
    $diller=$diller." ". $_POST["dil3"];
if(isset($_POST["dil4"]));
	$diller=$diller." ". $_POST["dil4"];

echo "$kullaniciAdi.<br>";
echo "$soyisim.<br>";
echo "$sifre.<br>";
echo "$cinsiyet.<br>";
echo "$dogumTarihi.<br>";
echo "$diller.<br>";







?>



