<?php
	$username = "root";
	$servername = "localhost";
	$password = "";
	$db_name = "registration";
	$conn = mysqli_connect($servername, $username, $password, $db_name);
	$query = "SELECT * from student";
	$result_set = mysqli_query($conn, $query);
	if(mysqli_num_rows($result_set) > 0){
		
		echo '<table border="1" style="border-collapse:collapse;">
			<tr>
				<th>
				   Username
				</td>
				<th>
				   Age
				</td>
				<th>
				   Password
				</td>
			</tr>';
		while($row = mysqli_fetch_assoc($result_set)) {	
			echo '<tr>
					<td>'.$row["Username"].'</td>
					<td>'.$row["Age"].'</td>
					<td>'.md5($row["Password"]).'</td>
				</tr>';
		}
		echo "</table>";
	}		
?>