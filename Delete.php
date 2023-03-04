<?php
	
	$password = $_POST['password'];
	$username = $_POST['username'];
    
	// Database connection
	$conn = new mysqli('localhost','root','','wholesale_management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}else {
		$sql = "DELETE FROM customer_information WHERE CustomerID = '$username' and Password = '$password'";
	
		//For getting the results of the querys
		
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . $conn->error;
          }
	}
?>