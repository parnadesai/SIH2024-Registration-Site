<?php
// Collecting all member details from the form
$members = [
    [
        'rollno' => $_POST['member1-rollno'],
        'name' => $_POST['member1-name'],
        'branch' => $_POST['member1-branch'],
        'year' => $_POST['member1-year'],
        'email' => $_POST['member1-email'],
        'phone' => $_POST['member1-phone'],
        'gender' => $_POST['member1-gender']
    ],
    [
        'rollno' => $_POST['member2-rollno'],
        'name' => $_POST['member2-name'],
        'branch' => $_POST['member2-branch'],
        'year' => $_POST['member2-year'],
        'email' => $_POST['member2-email'],
        'phone' => $_POST['member2-phone'],
        'gender' => $_POST['member2-gender']
    ],
    [
        'rollno' => $_POST['member3-rollno'],
        'name' => $_POST['member3-name'],
        'branch' => $_POST['member3-branch'],
        'year' => $_POST['member3-year'],
        'email' => $_POST['member3-email'],
        'phone' => $_POST['member3-phone'],
        'gender' => $_POST['member3-gender']
    ],
    [
        'rollno' => $_POST['member4-rollno'],
        'name' => $_POST['member4-name'],
        'branch' => $_POST['member4-branch'],
        'year' => $_POST['member4-year'],
        'email' => $_POST['member4-email'],
        'phone' => $_POST['member4-phone'],
        'gender' => $_POST['member4-gender']
    ],
    [
        'rollno' => $_POST['member5-rollno'],
        'name' => $_POST['member5-name'],
        'branch' => $_POST['member5-branch'],
        'year' => $_POST['member5-year'],
        'email' => $_POST['member5-email'],
        'phone' => $_POST['member5-phone'],
        'gender' => $_POST['member5-gender']
    ],
    [
        'rollno' => $_POST['member6-rollno'],
        'name' => $_POST['member6-name'],
        'branch' => $_POST['member6-branch'],
        'year' => $_POST['member6-year'],
        'email' => $_POST['member6-email'],
        'phone' => $_POST['member6-phone'],
        'gender' => $_POST['member6-gender']
    ]
];

$teamname = $_POST['member1-tn'];

$conn = new mysqli('localhost', 'root', '', 'sih_db');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Preparing the statement to insert each member's details into the table
    $stmt = $conn->prepare("INSERT INTO `team_leader_details` (`Roll no.`, `Team Name`, `Name`, `Branch`, `Year`, `Email`, `Phone`, `Gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    foreach ($members as $member) {
        $stmt->bind_param("isssisss", $member['rollno'], $teamname, $member['name'], $member['branch'], $member['year'], $member['email'], $member['phone'], $member['gender']);
        $stmt->execute();
    }

    echo "Team has been Registered Successfully!";
    $stmt->close();
    $conn->close();
}
?>
