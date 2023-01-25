<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
<h4></h4>
<?php
include 'sql.php';
$res = mysql_query("select * from product");
	
while($arr = mysql_fetch_array($res))
{
	echo "<img src='".$arr['image']."' id='".$arr['id']."'/>";
	
echo"<scrpit>
var imgsrc = $(".$arr['id'].").attr('src');
var imgcheck = imgsrc.width;

if (imgcheck==0) {
	$('h4').html(".$arr['image'].")
} else { //do rest of code }
</script>";
}	


?>

</body>
</html>





