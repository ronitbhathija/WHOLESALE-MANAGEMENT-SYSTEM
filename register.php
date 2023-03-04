<?php
	
	$password = $_POST['password'];
	$username = $_POST['username'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $Name = $_POST['name'];
	// Database connection
	$conn = new mysqli('localhost','root','','wholesale_management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer_information(CustomerID, Name, Address,Phone, Password) values(?, ?, ?, ?,?)");
		$stmt->bind_param("sssss", $username, $Name, $address,$phone,$password);
		$execval = $stmt->execute();
		echo $execval;
		echo " Registration Confirmed";
		$stmt->close();
		$conn->close();
	}
	header("location: login.html");
?>