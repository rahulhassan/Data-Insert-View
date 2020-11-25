<?php
	function goto_link($location){
		header("Location: ".$location);
		exit;
	}
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "registration";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	else{
		if (isset($_POST["submit"])) {
			if (!empty($_POST["username"]) && !empty($_POST["age"]) && !empty($_POST["pass"])) {

				$uname = $_POST["username"];
				$age = $_POST["age"];
				$passw = md5($_POST["pass"]);
				
				$query = "INSERT INTO student VALUES(null,'$uname','$age','$passw')";
				mysqli_query($conn, $query);
				
				echo "Data Inserted Successfully.";
			}
			else{
				echo "Fill the form first.";
			}
		
		}
		if (isset($_POST["view"])) {
			goto_link("showdata.php");
		}
	}
?>
<html>
	<head>
		<title>Registration</title>
	</head>
	<body>
		<form action="" method="post">
			<table>
				<tr>
					<td>
						Username:
					</td>
					<td>
						<input type="text" name="username">
					</td>
				</tr>
				<tr>
					<td>
						Age:
					</td>
					<td>
						<input type="text" name="age">
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
					<td>
						<input type="text" name="pass">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="submit" name="view" value="View">
						<input type="submit" name="submit" value="Okay">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>