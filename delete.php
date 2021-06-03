<html>
	<?php
		include 'connect.php';
		echo $id = $_GET["id"];
		
		$deleteTest = "DELETE FROM test WHERE id = '$id'";
		$result = $con->query($deleteTest);
		if($result)
			header("Location: index.php");
		else
			echo 'Ma\'lumot o`chmadi. Nima qilamiza :)';
	?>
</html>