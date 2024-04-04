<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSE Observation Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom styles */
        .form-header {
            margin-top: 50px;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            margin-bottom: 0;
        }

        .form-container {
            border: 1px solid #ccc;
            border-top: none;
            padding: 20px;
            border-radius: 0 0 5px 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="form-header">HSE Observation Form</h2>
        <form action="submit_form.php" class="form-container" method="post" enctype="multipart/form-data">
            <div class="form-group my-2">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group my-2">
                <label for="card_no">Card Number:</label>
                <input type="text" class="form-control" id="card_no" name="card_no" required>
            </div>
            <div class="form-group my-2">
                <label for="observer_name">Name of Observer:</label>
                <input type="text" class="form-control" id="observer_name" name="observer_name" required>
            </div>
            <div class="form-group my-2">
                <label for="department">Department:</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <div class="form-group my-2">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group my-2">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group my-2 ">
                <label>Image:</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group my-3 ">
                <label for="observation_type">Observation Type:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="observation_type" id="safe_card" value="Safe Card" required>
                    <label class="form-check-label" for="safe_card">Safe Card</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="observation_type" id="unsafe_card" value="Unsafe Card">
                    <label class="form-check-label" for="unsafe_card">Unsafe Card</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="observation_type" id="near_miss_card" value="Near Miss Card">
                    <label class="form-check-label" for="near_miss_card">Near Miss Card</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>