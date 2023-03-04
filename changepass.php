<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $confirmnewpassword = $_POST['confirmnewpassword'];
// session_start();
$conn = new mysqli('localhost','root','','wholesale_management');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
  // else{
  //       $result = ("SELECT Password FROM customer_information WHERE customerid='$username'");
  //       // $ans = mysqli_query($conn , $result) ;
  //       // if(!$result)
  //       // {
  //       // echo "The username you entered does not exist";
  //       // }
  //       // else if($password!= $ans)
  //       // {
  //       // echo "You entered an incorrect password";
  //       // }
  //       if($newpassword=$confirmnewpassword)
  //       $sql=("UPDATE customer_information SET password='$newpassword' where customerid='$username'");
  //       $ans1 = mysqli_query($conn,$sql) ;
  //       if($ans1)
  //       {
  //       echo "Congratulations You have successfully changed your password";
  //       }
  //      else
  //       {
  //      echo "Passwords do not match";
  //      }
  //   }
  else{
    $sql1 = "SELECT Password FROM customer_information WHERE customerid='$username'" ;
    $result1 = mysqli_query($conn , $sql1) ;

    if(!$row = mysqli_fetch_assoc($result1)){
      echo "username does not exist" ;
    }else{
      if($newpassword != $confirmnewpassword){
        echo "confirm password is wrong" ;
      }else{
        $sql2 = "UPDATE customer_information SET password='$newpassword' where customerid='$username'" ;
        $result2 = mysqli_query($conn , $sql2) ;

        if($conn->query($sql2) === TRUE){
          echo "updated" ;
        }else{
          echo "error" ;
        }
      }
      
    }
  }

      ?>