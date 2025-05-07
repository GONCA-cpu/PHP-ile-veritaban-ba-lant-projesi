<?php
error_reporting(E_ALL);
ini_set('display_errors'.1);
$db=new
  PDO("mysql:host=localhost;dbname=webfinal;charset=utf8","root","");
  if(isset($_GET['id'])){
	  $id=$_GET['id'];
	  $veri=$db->execute([$id]);
	  $kitap=$veri->fetch(PDO::FETCH_ASSOC);
  }
?>

<h2>Kitap Güncelle</h2>
<form method="post" action="kitap_guncelle.php?id=<?php echo $kitap['id']; ?>">
Kitap Adı:
<input type="text" name="kitap_adi" value="<?php echo $kitap['kitap_adi']; ?>"><br/><br/>
Yazar Adı:
<input type="text" name="yazar_adi" value="<?php echo $kitap['yazar_adi']; ?>"><br/><br/>
Tür:
<select name="tur">
<option value="Roman" <?php if ($kitap['tur']=='Roman')echo 'selected'; ?>>Roman</option>
<option value="Bilim" <?php if ($kitap['tur']=='Bilim')echo 'selected'; ?>>Bilim</option>
<option value="Tarih" <?php if ($kitap['tur']=='Tarih')echo 'selected'; ?>>Tarih</option>
<option value="Korku" <?php if ($kitap['tur']=='Korku')echo 'selected'; ?>>Korku</option>
</select><br/><br/>
Okundu mu?
<input type="checkbox" name="okundu" value="Evet" <?php if  ($kitap['okundu']=='Evet')echo 'checked';?>>Evet<br/><br/>
<input type="submit" value="Güncelle">
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id=$_GET['id'];
	$kitap_adi=$_POST['kitap_adi'];
	$yazar_adi=$_POST['yazar_adi'];
	$tur=$_POST['tur'];
	$okundu=isset($_POST['okundu']) ? 'Evet': 'Hayır';
	
	$guncelle=$db->prepare("UPDATE kitaplar SET kitap_adi=?,yazar_adi=?,tur=?,okundu=? WHERE id=?");
	$guncelle->execute([$kitap_adi,$yazar_adi,$tur,$okundu,$id]);
	header("Location:kitap_listele.php");
}
?>





