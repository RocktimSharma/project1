<?php
// Database connection
include('conn.php');


// Create connection
$conn = OpenCon();


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $card_no = mysqli_real_escape_string($conn, $_POST['card_no']);
    $observer_name = mysqli_real_escape_string($conn, $_POST['observer_name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $observation_type = mysqli_real_escape_string($conn, $_POST['observation_type']);

    // Upload image
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    // Insert data into database
    $sql = "INSERT INTO formdata (date, card_no, observer_name, department, location, description, observation_type, image)
            VALUES ('$date', '$card_no', '$observer_name', '$department', '$location', '$description', '$observation_type', '$targetFile')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
CloseCon($conn);
