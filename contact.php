<?php

// Put contacting email here
   $php_main_email = "chandelaman1234@gmail.com";

// if (isset($post['name'])||isset($post['email'])||isset($post['message'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
  
//   // Connecting to the Database
//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $database = "contact";

//   // Create a connection
//   $conn = mysqli_connect($servername, $username, $password, $database);
//   // Die if connection was not successful 
// 	$sql = "INSERT INTO `contactus` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
// 	$result = mysqli_query($conn, $sql);
	
	// //Sanitizing email
	// $email = filter_var($email, FILTER_SANITIZE_EMAIL);


	// //After sanitization Validation is performed
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	
	
		$php_subject = "Message from contact form";
		
		// To send HTML mail, the Content-type header must be set
		$php_headers = 'MIME-Version: 1.0' . "\r\n";
		$php_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$php_headers .= 'From:' . $email. "\r\n"; // Sender's Email
		$php_headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
		
		$php_template = '<div style="padding:50px;">Hello ' . $name . ',<br/>'
		. 'Thank you for contacting us.<br/><br/>'
		. '<strong style="color:#f00a77;">Name:</strong>  ' . $name . '<br/>'
		. '<strong style="color:#f00a77;">Email:</strong>  ' . $email . '<br/>'
		. '<strong style="color:#f00a77;">Message:</strong>  ' . $message . '<br/><br/>'
		. 'This is a Contact Confirmation mail.'
		. '<br/>'
		. 'We will contact you as soon as possible .</div>';
		$php_sendmessage = "<div style=\"background-color:#f5f5f5; color:#333;\">" . $php_template . "</div>";
		
		// message lines should not exceed 70 characters (PHP rule), so wrap it
		$php_sendmessage = wordwrap($php_sendmessage, 70);
		
		// Send mail by PHP Mail Function
		if(mail($php_main_email, $php_subject, $php_sendmessage, $php_headers)){
		echo "Email successfully sent to ...";
	    }
		else {
			echo "<span class='contact_error'>* Invalid email *</span>";
		}
	} 
	else {
		echo "<span class='contact_error'>* Invalid email *</span>";
	}

	// if($result){
	//   echo "Your message has been received, We will contact you soon.";
	// }
	// else{
	// 	// echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
	// 	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	//   <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
	//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 	<span aria-hidden="true"></span>
	//   </button>
	// </div>';
	// }
?>