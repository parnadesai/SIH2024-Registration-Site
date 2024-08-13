<?php
$servername = "localhost"; 
$username = "username"; 
$password = ""; 
$dbname = "sih_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("INSERT INTO team_members (rollno, team_name, name, branch, year, email, phone, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $rollno, $team_name, $name, $branch, $year, $email, $phone, $gender);


for ($i = 1; $i <= 6; $i++) {
    if (!empty($_POST["member{$i}-rollno"])) {
        $rollno = $_POST["member{$i}-rollno"];
        $team_name = $_POST["member{$i}-tn"] ?? $_POST["member1-tn"]; 
        $name = $_POST["member{$i}-name"];
        $branch = $_POST["member{$i}-branch"];
        $year = $_POST["member{$i}-year"];
        $email = $_POST["member{$i}-email"];
        $phone = $_POST["member{$i}-phone"];
        $gender = $_POST["member{$i}-gender"];

        $stmt->execute();
    }
}


if (!empty($_POST['mentor-name'])) {
    $stmt = $conn->prepare("INSERT INTO mentors (mentor_name, field, email, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $mentor_name, $field, $mentor_email, $mentor_phone);

    $mentor_name = $_POST['mentor-name'];
    $field = $_POST['mentor-f-gender'];
    $mentor_email = $_POST['mentor-email'];
    $mentor_phone = $_POST['mentor-phone'];

    $stmt->execute();
}


$stmt->close();
$conn->close();

// Redirect to a confirmation page
header("Location: Succesful.html");
exit();
?>
