<?php
 
	$db = new mysqli("localhost", "root", "");
	mysqli_set_charset($db, 'utf8');
	mysqli_select_db($db,"product");

	$conn = mysqli_connect('localhost', 'root','', 'product');
    $conn->set_charset("utf8");


?>