<?php
    $ member1-rollno = $_POST['rollno'];
    $ member2-rollno = $_POST['rollno'];
    $ member3-rollno = $_POST['rollno'];
    $ member4-rollno = $_POST['rollno'];
    $ member5-rollno = $_POST['rollno'];
    $ member6-rollno = $_POST['rollno'];
    $ member1-tn = $_POST['teamname'];
    $ member1-name = $_POST['name'];
    $ member2-name = $_POST['name'];
    $ member3-name = $_POST['name'];
    $ member4-name = $_POST['name'];
    $ member5-name = $_POST['name'];
    $ member6-name = $_POST['name'];

    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>