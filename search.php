<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Home Page - AgeWell Aid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #f1f2f0;
        }
        .container {
            margin-top: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #97babf;
        }
        th {
            background-color: #1a4a63;
            color: #ffffff;
        }
        td {
            background-color: #ffffff;
            color: #1a4a63;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h3 {
            text-align: center;
            color: #0a467b;
            font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
        }
        .btn-submit {
            background-color: #1a4a63;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .btn-submit:hover {
            background-color: #0f2c40;
        }
    </style>
</head>

<body>
<header id="menu">
        <div class="container-fluid" style="display: flex; align-items: center; justify-content: space-between;">
            <div class="header-left">
                <img src="Logo.png" alt="logo" class="logo" />
                <p class="logo-text">AgeWell Aid</p>
            </div>
            <nav class="navbar navbar-expand-sm">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="Index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="AboutUs.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="subscription.html">Subscription Plans</a></li>
                    <li class="nav-item"><a class="nav-link" href="training.html">Training Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="oneService.html">One Time Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html">Personal Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="chatbot.html">AI Chatbot</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.html">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="questionnaire.html">Questionnaire</a></li>
                    <li class="nav-item"><a class="nav-link" href="funpage.html">Funpage</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.html">Cart</a></li>
                </ul>
            </nav>
        </div>
    </header>

        <div class="banner-section">
            <div class="banner-content">
                <h2>Subscription Plans</h2>
            </div>
        </div>
<div class="container">
    <h3>Search Results</h3>
    <div>
    <?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agewelldb";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection to the database was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the search term from the form
    $searchTerm = $_POST["search_term"];

    // SQL query to search for subscribers based on the plan name
    $sql = "SELECT FullName, Age, Gender, Email, Plan FROM subscriptions WHERE Plan LIKE '%$searchTerm%'";

    // Run the query and get the results
    $result = $conn->query($sql);

    // Check if there are any matching results
    if ($result->num_rows > 0) {
        // Display the results in a table
        echo "<table class='srv-table'>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Plan</th>
                    </tr>
                </thead>
                <tbody>";

        // Loop through each result and display it in a row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["FullName"] . "</td>
                    <td>" . $row["Age"] . "</td>
                    <td>" . $row["Gender"] . "</td>
                    <td>" . $row["Email"] . "</td>
                    <td>" . $row["Plan"] . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        // Show a message if no results were found
        echo "<div class='alert alert-warning text-center'>No results found.</div>";
    }
}

// Close the database connection
$conn->close();
?>

    </div>
    <div class="text-center">
        <a href="subscription.html" class="btn btn-submit">Go Back</a>
    </div>
</div>
</body>
<footer>
    <div class=" text-center">
        <p>&copy; 2024 AgeWell Aid. All Rights Reserved.</p>
        <p>Contact us: | <a href="#" class="text-grey">Twitter</a> | <a href="#" class="text-grey">Instagram</a> | <a href="#" class="text-grey">WhatsApp</a></p>
    </div>
</footer>
</html>
