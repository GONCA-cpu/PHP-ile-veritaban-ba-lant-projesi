<html>
<head>
<meta charset="UTF-8">
</head>
<center>
<form action="" method="post">
<table border="0">
<tr>
<td>Sayı 1</td>
<td><input type="text" name="s1"></td>
</tr>

<tr>
<td>Sayı2</td>
<td><input type="text" name="s2"></td>
</tr>

<tr>
<td>İşlem</td>
<td>
<select name="islem">
<option value="1">İki sayı arasında2 ve 5 in katı olanlar</option>
<option value="2">2. sayının faktöriyeli</option>
</select>
</td>
</tr>

<tr>
<td colspan="2">
<input type="submit" name="gonder" value="İşlem yap"></td>
</tr>
</table>
</form>
</center>
</html>


<?php
if(isset($_POST["gonder"]))
{
	$sayi1=$_POST["s1"];
	$sayi2=$_POST["s2"];
	$islem=$_POST["islem"];
	if($sayi1>$sayi2)
	{
		$enb=$sayi1;
		$enk=$sayi2;
	}
	else
	{
		$enb=$sayi2;
		$enk=$sayi1;
	}
	if($islem==1)
	{
		for($i=$enk;$i<=$enb;$i++)
		{
			if($i%5==0 && $i%2==0)
				echo "$i";
		}
	}
	else if($islem==2)
	{
		$faktöriyel=1;
		for($i=$sayi2;$i>=1;$i--)
		{
		    $faktoriyel*=$i;
		}
		echo "İkinci sayının faktöriyeli : $faktoriyel";
	}
}		
?>



