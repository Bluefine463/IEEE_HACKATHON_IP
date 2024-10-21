<?php
// Database configuration
$host = 'localhost'; // Database host
$db_name = 'job_seeker'; // Database name
$db_user = 'root'; // Database username
$db_password = '12345'; // Database password

// Create a connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO applications (full_name, dob, gender, education, address, email, phone,company_name, job_title, start_date, description, reference1_name, reference1_email,reference1_phone)VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssssssss", $fullName, $dob, $gender, $education, $address, $email, $phone,$companyName, $jobTitle, $startDate, $description,$reference1Name, $reference1Email, $reference1Phone);

// Set parameters and execute
$fullName = $_POST['fullName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$education = $_POST['education'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$companyName = $_POST['companyName'];
$jobTitle = $_POST['jobTitle'];
$startDate = $_POST['startDate'];
$description = $_POST['description'];
$reference1Name = $_POST['reference1Name'];
$reference1Email = $_POST['reference1Email'];
$reference1Phone = $_POST['reference1Phone'];


if ($stmt->execute()) {
    echo "Successfully executed!";
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();

