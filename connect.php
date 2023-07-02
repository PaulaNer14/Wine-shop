<?php

if(isset($_SESSION['login_user'])){
	header("Location: index.php");
}
session_unset();
session_destroy();
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (empty($email) || empty($password)) {
		echo "Nu lasa campuri goale";
	} else {
		$db_servername = "localhost";
		$db_username = "root";
		$db_password = "";
		$db_name = "web";
		$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$query = "SELECT * FROM client WHERE email = '$email' LIMIT 1";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row

		if ($count == 1) {
			$_SESSION['login_user'] = [
                'id' => $row['id_client'],
                'is_admin' => $row['admin'],
                'name' => $row['lastName']
            ];
			header("location: index.php");
		} else {
			$error = "Your Login Name or Password is invalid";
			echo "Email/parola incorecta";
		}
	}
}
?>