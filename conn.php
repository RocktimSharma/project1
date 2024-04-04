<?php
// Function to open a database connection
function OpenCon()
{
  $servername = "localhost"; // Server name
  $username = "root"; // Database username
  $password = ""; // Database password
  $dbname = "test1"; // Database name

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    // If connection fails, print error message and terminate script
    die("Connection failed: " . $conn->connect_error);
  } else {
    // Connection successful
    // You can add additional handling code here if needed
  }

  // Return the connection object
  return $conn;
}

// Function to close the database connection
function CloseCon($conn)
{
  // Close the connection
  $conn->close();
}

?>
