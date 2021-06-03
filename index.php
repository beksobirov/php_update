<html>
	<?php
		include 'connect.php';
		
		if(isset($_POST["save"])){
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$phone = $_POST["phone"];
			
			$insertTest = "INSERT INTO test (Fname, Lname, Phone) VALUES ('$fname', '$lname', '$phone')";
			
			if ($con->query($insertTest) === TRUE) {
				echo '<p style="color: red">Bazaga yozildi</p>';
			} else {
				echo "Error: " . $insertTest . "<br>" . $con->error;
			}
		}
	?>
	
	<form method="POST">
		<table>
			<tr>
				<td>First name:</td>
				<td><input type="text" name="fname" placeholder="First name" required></td>
			</tr>
			<tr>
				<td>Last name:</td>
				<td><input type="text" name="lname" placeholder="Last name" required></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><input type="text" name="phone" placeholder="+998 93 282 26 25" required><br /></td>
			</tr>
			<tr >
				<td colspan=2><center><input type="submit" name="save" value="SAVE"></center></td>
				
			</tr>
		</table>
	</form>
	<?php
		$selectTest = "SELECT * from test";
		
		$result = $con->query($selectTest);

		if ($result->num_rows > 0) {
			echo '<table border=1>';
			echo '<thead>';
				echo '<tr>';
					echo '<th>#</th>';
					echo '<th>First name</th>';
					echo '<th>Last name</th>';
					echo '<th>Phone</th>';
					echo '<th>EDIT</th>';
					echo '<th>DELETE</th>';
				echo '</tr>';     
			echo '</thead>';
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo '<td>' . $row["ID"] . '</td>';
				echo '<td>' . $row["Fname"] . '</td>';
				echo '<td>' . $row["Lname"] . '</td>';
				echo '<td>' . $row["Phone"] . '</td>';
				echo '<td><a href="edit.php?id='.$row["ID"].'">EDIT</a></td>';
				echo '<td><a href="delete.php?id='.$row["ID"].'">DELETE</a></td>';
				echo '</tr>';
			}
			echo '</table>';
		} else {
			echo "0 results";
		}
	?>
</html>