<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$host = "localhost"; // Replace with your SQL server host
$username = "root"; // Replace with your SQL server username
$password = ""; // Replace with your SQL server password
$dbname = "team_registration"; // Replace with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Team leader details
    $rollno1 = $_POST['member1-rollno'];
    $team_name = $_POST['member1-tn'];
    $name1 = $_POST['member1-name'];
    $branch1 = $_POST['member1-branch'];
    $year1 = $_POST['member1-year'];
    $email1 = $_POST['member1-email'];
    $phone1 = $_POST['member1-phone'];
    $gender1 = $_POST['member1-gender'];

    // Prepare the statement for inserting the team leader
    $stmt_leader = $conn->prepare("INSERT INTO team_members (roll_no, team_name, name, branch, year, email, phone, gender, is_leader) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)");
    $stmt_leader->bind_param("ssssssss", $rollno1, $team_name, $name1, $branch1, $year1, $email1, $phone1, $gender1);

    // Execute the team leader statement
    if (!$stmt_leader->execute()) {
        echo "Error: " . $stmt_leader->error;
    }

    // Array to iterate over members 2 to 6
    for ($i = 2; $i <= 6; $i++) {
        if (isset($_POST["member{$i}-rollno"])) {
            $rollno = $_POST["member{$i}-rollno"];
            $name = $_POST["member{$i}-name"];
            $branch = $_POST["member{$i}-branch"];
            $year = $_POST["member{$i}-year"];
            $email = $_POST["member{$i}-email"];
            $phone = $_POST["member{$i}-phone"];
            $gender = $_POST["member{$i}-gender"];

            // Prepare the statement for inserting team members
            $stmt_member = $conn->prepare("INSERT INTO team_members (roll_no, team_name, name, branch, year, email, phone, gender, is_leader) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0)");
            $stmt_member->bind_param("ssssssss", $rollno, $team_name, $name, $branch, $year, $email, $phone, $gender);

            // Execute the statement for each member
            if (!$stmt_member->execute()) {
                echo "Error: " . $stmt_member->error;
            }
        }
    }

    // Mentor details
    if (isset($_POST['mentor-name'])) {
        $mentor_name = $_POST['mentor-name'];
        $mentor_field = $_POST['mentor-f-gender'];
        $mentor_email = $_POST['mentor-email'];
        $mentor_phone = $_POST['mentor-phone'];

        // Prepare the statement for inserting the mentor
        $stmt_mentor = $conn->prepare("INSERT INTO mentors (name, field, email, phone, team_name) VALUES (?, ?, ?, ?, ?)");
        $stmt_mentor->bind_param("sssss", $mentor_name, $mentor_field, $mentor_email, $mentor_phone, $team_name);

        // Execute the mentor statement
        if (!$stmt_mentor->execute()) {
            echo "Error: " . $stmt_mentor->error;
        }
    }

    // Redirect after successful submission
    header("Location: Succesful.html");
    exit();
}

// Close the connection
$conn->close();
?>
