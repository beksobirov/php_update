<html>
	<h2>EDIT</h2><br />
	<?php
		include 'connect.php';
		
		$id = $_GET["id"];
		$selectTest = "SELECT * FROM test WHERE id = '$id'";
		$result = $con->query($selectTest);
		if ($result->num_rows > 0) {
			echo '<form method="POST">';
			echo '<table>';
			while($row = $result->fetch_assoc()) {
				echo '<tr>
						<td>First name:</td>
						<td><input type="text" name="fname" placeholder="First name" value="'.$row["Fname"].'" required></td>
					</tr>
					<tr>
						<td>Last name:</td>
						<td><input type="text" name="lname" placeholder="Last name" value="'.$row["Lname"].'" required></td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><input type="text" name="phone" placeholder="+998 93 282 26 25" value="'.$row["Phone"].'" required><br /></td>
					</tr>
					<tr >
						<td colspan=2><center><input type="submit" name="save" value="SAVE EDIT"></center></td>
						
					</tr>';
			}
			echo '</table>';
			echo '</form>';
		}
		
		if(isset($_POST["save"])){
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$phone = $_POST["phone"];
			
			$updateTest = "UPDATE test SET Fname='$fname', Lname='$lname', Phone='$phone' WHERE id='$id'";
			
			if ($con->query($updateTest) === TRUE) {
				echo '<p style="color: red">Ma\'lumotlar muvoffaqqiyatli o`zgartirildi</p>';
				header("Location: index.php");
			} else {
				echo "Error: " . $updateTest . "<br>" . $con->error;
			}
		}
	?>
</html>