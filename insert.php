<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-heading {
            text-align: center;
            color: #1a4a63;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
        }

        .btn-submit {
            background-color: #1a4a63;
            color: white;
            font-weight: bold;
            width: 100%;
            border-radius: 25px;
        }

        .btn-submit:hover {
            background-color: #0f2c40;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-heading">Insert a New Course</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="course_name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter course name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter course description"></textarea>
            </div>
            <div class="mb-3">
                <label for="duration_weeks" class="form-label">Duration (in weeks)</label>
                <input type="number" class="form-control" id="duration_weeks" name="duration_weeks" min="1" placeholder="Enter duration" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Enter price" required>
            </div>
            <button type="submit" class="btn btn-submit">Insert Course</button>
        </form>

        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "agewelldb";

        // Variables
        $course_name = "";
        $description = "";
        $duration_weeks = 0;
        $price = 0.00;

        // Check if the form is submitted by POST method
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and store form data
            $course_name = $_POST['course_name'];
            $description = $_POST['description'];
            $duration_weeks = $_POST['duration_weeks'];
            $price = $_POST['price'];

            // Create a connection to the database
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if the course already exists
            $check_sql = "SELECT * FROM courses WHERE course_name = '" . mysqli_real_escape_string($conn, $course_name) . "'";
            $check_result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($check_result) > 0) {
                echo "<p class='text-danger text-center mt-3'>The course already exists!</p>";
            } else {
                // SQL query to insert course information into the database
                $sql = "INSERT INTO courses (course_name, description, duration_weeks, price) VALUES ('" .
                    mysqli_real_escape_string($conn, $course_name) . "', '" .
                    mysqli_real_escape_string($conn, $description) . "', " .
                    intval($duration_weeks) . ", " .
                    floatval($price) . ")";

                if (mysqli_query($conn, $sql)) {
                    echo "<p class='text-success text-center mt-3'>Course inserted successfully!</p>";
                } else {
                    echo "<p class='text-danger text-center mt-3'>Error: " . mysqli_error($conn) . "</p>";
                }
            }

            mysqli_close($conn); // Close the database connection
        }
        ?>

        <div class="text-center mt-4">
            <a href="training.html" class="btn btn-outline-secondary">Back to Training Programs</a>
        </div>
    </div>
</body>
</html>
