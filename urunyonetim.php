<html>
<head>
    <meta charset="UTF-8">
    <title >Ürün Yönetim Paneli</title>
</head>
<body>
<center style="color:#EF5350;"><h2>ÜRÜN YÖNETİM PANELİ</h2>
<form action="" method="post" enctype="multipart/form-data">
<table border="1" >
<tr><td>Ürün Seri No:</td><td><input type="text" name="serino" style="background-color: pink; color: black;"></td></tr>
<tr><td>Ürün Adı:</td><td><input type="text" name="ad"  style="background-color: pink; color: black;"></td></tr>
<tr><td>Adet:</td><td><input type="text" name="adet"  style="background-color: pink; color: black;"></td></tr>
<tr><td>Fiyat:</td><td><input type="text" name="fiyat"  style="background-color:  pink; color:black;"></td></tr>
<tr><td>Fotoğraf:</td><td><input type="file" name="foto"  ></td></tr>
<tr><td colspan="2">
<input type="submit" name="ekle" value="Ürünü Kaydet"  style="background-color: pink; color: black;">
<input type="submit" name="sil" value="Ürünü Sil"  style="background-color: pink; color:black;">
<input type="submit" name="guncel" value="Ürünü Güncelle"  style="background-color: pink; color: black;">
<input type="submit" name="listele" value="Ürünleri Listele"  style="background-color: pink; color: black;">
</td></tr>
</table>
</form></center>

<?php
// PDO bağlantısı
try {
    $baglanti = new PDO("mysql:host=localhost;dbname=e-ticaret", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
// Ürün Ekleme
if (isset($_POST['ekle'])) {
    $serino = $_POST['serino'];
    $ad = $_POST['ad'];
    $adet = $_POST['adet'];
    $fiyat = $_POST['fiyat'];

    // Fotoğraf yüklemesi
    $foto_ad = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "fotograflar/$foto_ad");

    // Veritabanına ekleme
    $sorgu = $baglanti->prepare("INSERT INTO urunler (urun_seri_no, urun_adi, adet, fiyat, fotograf, durum)
                                 VALUES (?, ?, ?, ?, ?, 'aktif')");
    $sorgu->execute([$serino, $ad, $adet, $fiyat, $foto_ad]);

    echo "<script>alert('Ürün başarıyla eklendi.'); window.location.href = 'urunyonetim.php';</script>";
    exit();
}

// Ürün Silme
if (isset($_GET['silinecekid'])) {
    $s_id = $_GET['silinecekid'];
    $sorgu = $baglanti->prepare("DELETE FROM urunler WHERE urun_seri_no = ?");
    $sorgu->execute([$s_id]);

    // Silme işleminden sonra sayfa yenileniyor
    echo "<script>window.location.href = 'urunyonetim.php';</script>";
    exit();
}

// Durum Değiştirme
if (isset($_GET['islemid']) && isset($_GET['islem'])) {
    $id = $_GET['islemid'];
    $durum = $_GET['islem'];

    // Durum güncelleniyor
    $sorgu = $baglanti->prepare("UPDATE urunler SET durum = ? WHERE urun_seri_no = ?");
    $sorgu->execute([$durum, $id]);

    // Sayfa yenileniyor
    echo "<script>window.location.href = 'urunyonetim.php';</script>";
    exit();
}

// Ürün Listeleme
if (isset($_POST['listele'])) {
    $veriler = $baglanti->query("SELECT * FROM urunler", PDO::FETCH_ASSOC);
    echo "<center><h2>KAYITLI ÜRÜNLER</h2>";

    foreach ($veriler as $urun) {
        $serino = $urun['urun_seri_no'];
        $durum = $urun['durum'];

        // Duruma göre ikonlar belirleniyor
        if ($durum == 'aktif') {
            $durum_ikon = 'fotograflar/engel.PNG'; // Engel (aktif)
            $yeni_durum = 'pasif';
            $tik_ikon = 'fotograflar/onay.JPG'; // Onay (aktif)
        } else {
            $durum_ikon = 'fotograflar/onay.JPG'; // Onay (pasif)
            $yeni_durum = 'aktif';
            $tik_ikon = 'fotograflar/engel.PNG'; // Engel (pasif)
        }

        // Ürün fotoğrafı
        echo "<img src='fotograflar/".$urun['fotograf']."' width='150' height='100'><br>";
        echo "<b>Serino:</b> ".$urun['urun_seri_no']."<br>";
        echo "<b>Ürün Adı:</b> ".$urun['urun_adi']."<br>";
        echo "<b>Adet:</b> ".$urun['adet']."<br>";
        echo "<b>Fiyat:</b> ".$urun['fiyat']."<br><br>";

        // 4 ikon:
        // 1. Silme ikonu
        echo "<a href='urunyonetim.php?silinecekid=$serino'><img src='fotograflar/silim.JPG' width='30' title='Ürünü Sil'></a> ";

        // 2. Durum değiştirme ikonu
        echo "<a href='urunyonetim.php?islemid=$serino&islem=$yeni_durum'><img src='$tik_ikon' width='30' title='Durum Değiştir'></a> ";

        // 3. Görüntüleme ikonu
        echo "<a href='urunyonetim.php?goster=$serino'><img src='fotograflar/gor.JPG' width='30' title='Ürünü Görüntüle'></a><br><br>";
        echo "<hr width='300'>";
    }
    echo "</center>";
}
?>
</body>
</html>


