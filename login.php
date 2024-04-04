<?php
// Include connection file
include('conn.php');
// Start session
session_start();
// Check if user is already logged in, if yes, redirect to dashboard
if (isset($_SESSION["loggedIn"]) == true) {
    header("Location:./");
}
// Initialize variables for login error handling
$loginError = false;
$loginErrorMsg = "";
// Check if login form is submitted
if (isset($_POST["admin-login-submit"])) {
    // Retrieve admin email and password from form
    $adminEmail = $_POST["admin-email"];
    $adminPassword = $_POST["admin-password"];
    // Open database connection
    $conn = OpenCon();
    try {
        // SQL query to select admin by email
        $adminQuery = "SELECT id,email,password FROM users WHERE email='$adminEmail';";
        // Execute query
        $adminResult = $conn->query($adminQuery);
        // If admin with provided email exists
        if ($adminResult->num_rows > 0) {
            // Fetch admin data
            $row = $adminResult->fetch_assoc();
            // Check if provided password matches stored password
            if ($adminPassword === $row['password']) {
                // Set loggedIn session variable to true
                $_SESSION["loggedIn"] = true;
            } else {
                // Set login error flag and message
                $loginError = true;
                $loginErrorMsg = "Invalid email or password.";
            }
        } else {
            // Set login error flag and message
            $loginError = true;
            $loginErrorMsg = "Invalid email or password.";
        }
    } catch (Exception $e) {
        // Set login error flag and message
        $loginError = true;
        $loginErrorMsg = "Something went wrong. Try again.";
    }
    // Close database connection
    CloseCon($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Custom styles */
        .vertical-center {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .form-container {

            border: 1px solid #ccc;
            border-top: none;
            padding: 20px;
            border-radius: 0 0 5px 5px;
            margin-bottom: 20px;
        }

        .form-header {
            margin-top: 50px;
            background-color: #007bff;
            /* Bootstrap's primary color */
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <section class="vertical-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="form-header">Login here</h2>
                    <form class="form-container" method="POST" action="" novalidate>


                        <?php
                        echo $loginError ?
                            "<div class='alert alert-danger' role='alert'>
                            $loginErrorMsg
                        </div>" : "";
                        ?>
                        <div class="form-floating mb-3">
                            <input name="admin-email" type="email" class="form-control" id="floatingsUsernameInput" placeholder="Email Address" required>
                            <label for="floatingsUsernameInput" class="form-label">Email Address</label>
                            <div class="invalid-tooltip">
                                This field cannot be empty.
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-floating flex-grow-1 position-relative">
                                <input name="admin-password" type="password" class="form-control password" id="password" placeholder="Password" required>
                                <label for="pPassword" class="form-label">Password</label>
                                <div class="password-error invalid-tooltip">
                                    This field cannot be empty.
                                </div>
                            </div>
                            <span class="input-group-text">
                                <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                            </span>
                        </div>
                        <button type='submit' class='w-full btn btn-primary d-block mx-auto' name='admin-login-submit'>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>