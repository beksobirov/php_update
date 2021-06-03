 <?php 
	//MySQLi (object-oriented)
	
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tutoriol";
	$port = "3306";

	$con = new mysqli($server, $username, $password, $dbname, $port);

	if($con->connect_error){
		die("Xatolik sababi: " . $con->connect_error);
	}
	
?>