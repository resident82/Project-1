<?php

include ("config.php");

$namepoint = $_POST['namepoint'];

if (isset($_POST['namepoint']))       
{
$namepoint = $_POST['namepoint']; 
if ($namepoint == '') 
{
unset($namepoint);
}  
}

if (isset($_POST['descriptpoint']))       
{
$descriptpoint = $_POST['descriptpoint']; 
if ($descriptpoint == '') 
{
unset($descriptpoint);
}  
}
$pcoord = $_POST['pcoord'];


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Метка добавлена</title>
</head>

<body>

<?php

if (isset($namepoint) && isset($descriptpoint))
{

echo '<p><strong>Ваша метка добавлена!</strong></p>';

echo '<p><strong>Наименование: </strong>', $namepoint, '<br><strong>Описание: </strong>', $descriptpoint, '<br><strong>Координаты: </strong>', $pcoord, '</p>';

$namepoint = htmlspecialchars(trim($namepoint));
$descriptpoint = htmlspecialchars(trim($descriptpoint));

$exp_str1 = explode(",", $pcoord);

$coordx = $exp_str1[0];
$coordy = $exp_str1[1];

$sql = "INSERT INTO mappoint VALUES(0, '$namepoint', '$descriptpoint', '$coordx', '$coordy', 'None', 1)";
$result = mysql_query($sql) or die("Ошибочный запрос: " . mysql_error());

}
		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому метка не может быть добавлена.</p>";
}

echo '<p><a href="vivid_mappoint_xml-2.php"><strong>Вернуться к карте</strong></a></p>';
?>


</body>
</html>
