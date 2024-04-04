<?php
// Start session
session_start();

// Check if user is not logged in, redirect to login page
if (isset($_SESSION["loggedIn"]) === false) {
    header("Location: login.php");
}
//Replace the form url
$formUrl = "https://c34b-2401-4900-3dd9-6114-5143-753f-f6b7-24f2.ngrok-free.app/project1/form.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Form Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form class="d-flex" action="logout.php" role="search">
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </div>
    <div class="container">

        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $formUrl ?>&choe=UTF-8" title="Link to form" />
    </div>
    <div class="container mt-5">

        <div class="row">

            <div class="col">
                <h2>Form Data</h2>
            </div>
            <div class="col ">

                <a href="form.php" class="float-end btn btn-success">View Form</a>
            </div>
        </div>




        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Card Number</th>
                    <th>Name of Observer</th>
                    <th>Department</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Observation Type</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                include("conn.php");

                // Create connection
                $conn = OpenCon();

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve form data from database
                $sql = "SELECT * FROM formdata";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Get the root URL dynamically


                        echo "<tr>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['card_no'] . "</td>";
                        echo "<td>" . $row['observer_name'] . "</td>";
                        echo "<td>" . $row['department'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['observation_type'] . "</td>";
                        echo "<td><img src='" . $row['image'] . "' height='50'></td>";
                        echo "<td><a target='_blank' href='./" . $row['image'] . "' class='btn btn-success'>View Image</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No data found</td></tr>";
                }

                // Close connection
                CloseCon($conn)
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>