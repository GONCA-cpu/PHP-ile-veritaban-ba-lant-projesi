<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<form action="a.php" method="post">
Adı Soyadı:<input type="text" name="ads"><br>
Şifre:<input type:"password" name="sifre"><br>
Medeni Hal:
<input type="radio" name="medenihal" value="1">Evli
<input type="radio" name="medenihal" value="2">Bekar
<br>
Hobileriniz:
<input type="checkbox" name="hobi1">Yüzmek<br>
<input type="checkbox" name="hobi2">Kaçmak<br>
<input type="checkbox" name="hobi3">Top<br>
Doğum tarihi:
<input type="date" name="dt"><br>
Özgeçmiş:
<input type="file" name="ozgecmis"><br>
Adres:
<textarea cols="40" rows="2" name="adres">Buraya adres gir</textarea><br>
Şehir:
<select name="sehir">
<option value="1">as</option>
<option value="2">df</option>
</select>
<br>
<input type="submit" name="kodagonder" value="Gönder">
<input type="submit" name="temizle" value="Temizle">
</form>
</body>
</html>

*************


<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<form action="yazdir.php" method="post">
AD soyad:<input type="text" name="adsoyad">
Memleket:<input type="text" name="memleket">
<input type="submit" name="gonder" value="Kaydet">
</form>
</body>
</html>

<?php
if(isset($_POST["adsoyad"]))
	$ads=$_POST["adsoyad"];
if(isset($_POST["memleket"]))
	$m=$_POST["memleket"];
echo "Hoşgeldin $ads<br>";
echo "Memleket $m<br>";

?>
