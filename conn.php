<?php

$conn = new mysqli("localhost", "root", "", "userlogin");

if ($conn->connect_error) {
	die("Connection failure: "
		. $conn->connect_error);
}

?>