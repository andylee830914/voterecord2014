<?php
header('Content-Type: text/html; charset=utf-8');
include("connect.php");
?>
<?php
$data=$_POST['vote'];
print_r($data);

$time=time();
$country=$data["省市別"];
$vote1=$data[rows][0]["候選人得票數"];
$vote2=$data[rows][1]["候選人得票數"];
$vote3=$data[rows][2]["候選人得票數"];
$vote4=$data[rows][3]["候選人得票數"];
$vote5=$data[rows][4]["候選人得票數"];
$vote6=$data[rows][5]["候選人得票數"];
$vote7=$data[rows][6]["候選人得票數"];
$open=$data["已送投開票所數"];

$sql="insert into vote(area,vote1,vote2,vote3,vote4,vote5,vote6,vote7,open) values('$country','$vote1','$vote2','$vote3','$vote4','$vote5','$vote6','$vote7','$open')";
mysql_query($sql);
?>
