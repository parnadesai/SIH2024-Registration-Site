<?php
    $rollno = $_POST['member1-rollno'];
    $rollno = $_POST['member2-rollno'];
    $rollno = $_POST['member3-rollno'];
    $rollno = $_POST['member4-rollno'];
    $rollno = $_POST['member5-rollno'];
    $rollno = $_POST['member6-rollno'];
    $teamname = $_POST['member1-tn'];
    $name = $_POST['member1-name'];
    $name = $_POST['member2-name'];
    $name = $_POST['member3-name'];
    $name = $_POST['member4-name'];
    $name = $_POST['member5-name'];
    $name = $_POST['member6-name'];
    $name = $_POST['mentor-name'];
    $branch = $_POST['member1-branch'];
    $branch = $_POST['member2-branch'];
    $branch = $_POST['member3-branch'];
    $branch = $_POST['member4-branch'];
    $branch = $_POST['member5-branch'];
    $branch = $_POST['member6-branch'];
    $year = $_POST['member1-year'];
    $year = $_POST['member2-year'];
    $year = $_POST['member3-year'];
    $year = $_POST['member4-year'];
    $year = $_POST['member5-year'];
    $year = $_POST['member6-year'];
    $email = $_POST['member1-email'];
    $email = $_POST['member2-email'];
    $email = $_POST['member3-email'];
    $email = $_POST['member4-email'];
    $email = $_POST['member5-email'];
    $email = $_POST['member6-email'];
    $email = $_POST['mentor-email'];
    $phone = $_POST['member1-phone'];
    $phone = $_POST['mentor-phone'];
    $domain = $_POST['member1-domain'];
    $gender = $_POST['member1-gender'];
    $gender = $_POST['member2-gender'];
    $gender = $_POST['member3-gender'];
    $gender = $_POST['member4-gender'];
    $gender = $_POST['member5-gender'];
    $gender = $_POST['member6-gender'];
    $conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(rollno, teamname, name, branch, year, email, phone, domain, gender) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("dsssisdss", $rollno , $teamname , $name, $branch, $year, $email, $phone, $domain, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Team has been Registered Successfully!";
		$stmt->close();
		$conn->close();
	}
?>