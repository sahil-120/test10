<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $DOB = $_POST['DOB'];
	$gender = $_POST['gender'];
    $Disability=$_POST['Disability'];
	$Class=$_POST['Class'];
    $medium=$_POST['medium']
    
    
    
    $email = $_POST['email'];
	
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','register');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName,$DOB,$gender, $email, , $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>