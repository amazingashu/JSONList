<?php
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_HOST','localhost');
define('MYSQL_DATABASE','');

$pdoOptions=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false);

$pdo=new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE,MYSQL_USER,MYSQL_PASSWORD,$pdoOptions);

//$UserId=$_GET["UserId"];
$Name=$_GET["Name"];
if($pdo)
{
	//$statement = $pdo->prepare("Select * from tbluser");
	//$statement = $pdo->prepare("Select * from tbluser where UserId='".$UserId."'");
	$statement = $pdo->prepare("Select * from tbluser where FullName like '%".$Name."%'");
	$statement->execute();
	$result=$statement->fetchAll(PDO::FETCH_ASSOC);
	$json=json_encode($result);
	
	echo $json;
	//echo "Connected";
}
else
{
	echo "Database Connection failed";
}

?>

