<?php

if (isset($post['name'])||isset($post['email'])||isset($post['message'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
  
  // Connecting to the Database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "contact";

  // Create a connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Die if connection was not successful 
	$sql = "INSERT INTO `contactus` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
	$result = mysqli_query($conn, $sql);

	if($result){
	  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong>Success!</strong> Your entry has been submitted successfully!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"></span>
	  </button>
	</div>';
	}
	else{
		// echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"></span>
	  </button>
	</div>';
	}

  

}

?>