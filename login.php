<?php
	
	$password = $_POST['password'];
	$username = $_POST['username'];
    
	// Database connection
	$conn = new mysqli('localhost','root','','wholesale_management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}else {
		$sql = "SELECT * FROM customer_information WHERE CustomerID = '$username' and Password = '$password'";
	
		//For getting the results of the querys
		$result = mysqli_query($conn,$sql);
	
		if(!$row = mysqli_fetch_assoc($result))//checks if the result has selected any of the rows...
			{
				echo "Your UserName or password is incorrect";
				$_SESSION["pass"] = "False";
				
			}
		else
			{
				$_SESSION['Login'] = "Active";
				$_SESSION['CID']  = $row['CustomerID'];
				echo "Logged in as Customer";
			}
	}

	if($_SESSION['Login'] == "Active"){
		header("location:afterlogin.html");
	}
?>