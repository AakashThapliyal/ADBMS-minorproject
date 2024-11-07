<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and retrieve form data
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$email = $_POST['email'];
$password = $_POST['password']; 
$account_type = isset($_POST['account-type']) && $_POST['account-type'] === 'Business Account' ? 'Business Account' : 'Personal Account';
$terms_accepted = isset($_POST['terms']) ? 1 : 0;
$age = $_POST['age'];
$referrer = $_POST['referrer'];
$bio = $_POST['bio'];

// Handle file upload
$profile_picture = null;
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    $profile_picture = $target_dir . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $profile_picture);
}

// Insert data into the database
$sql = "INSERT INTO users (first_name, last_name, email, password, account_type, terms_accepted, profile_picture, age, referrer, bio)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssisiss", $first_name, $last_name, $email, $password, $account_type, $terms_accepted, $profile_picture, $age, $referrer, $bio);

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
