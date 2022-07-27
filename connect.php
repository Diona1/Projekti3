<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "test1";

$conn = mysqli_connect($FirstName, $Email, $Password, $test1);

if (!$conn) {
	echo "Connection failed!";
	exit();
}
if (isset($_POST['FirstName']) && isset($_POST['Email'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['FirstName']);
	$message = validate($_POST['Email']);

	if (empty($Email) || empty($FirstName)) {
		header("Location: index.html");
	}else {

		$sql = "INSERT INTO test(name, message) VALUES('$name', '$message')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
		}else {
			echo "Your message could not be sent!";
		}
	}

}else {
	header("Location: index.html");
}