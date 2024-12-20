<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Subscription - AgeWell Aid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
             background-color: #f1f2f0; 
            }
        .container {
             margin-top: 50px; 
            }
        h3 { 
            text-align: center;
            text-decoration: underline; 
            color: #0a467b; 
        }
        .btn-submit {
             background-color: #1a4a63; 
             color: white; 
             padding: 10px 20px; 
             border: none; 
             border-radius: 4px; 
             margin-top: 20px; 
             cursor: pointer; 
            }
        .btn-submit:hover { 
            background-color: #14507a;
         }
        .alert { 
            margin-top: 20px;
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

    <div class="container">
        <h3>Subscription Confirmation</h3>
        <div>
        <?php
// Database connection details
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "agwelldb"; 

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    // Show an error message if the connection fails
    die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs and make them safe
    $fullName = $conn->real_escape_string($_POST["full_name"]);
    $age = (int)$_POST["age"]; // Convert age to an integer
    $gender = $conn->real_escape_string($_POST["gender"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $plan = $conn->real_escape_string($_POST["plan"]);

    // Prepare the SQL query to insert the subscriber details into the database
    $sql = "INSERT INTO subscriptions (FullName, Age, Gender, Email, Plan) 
            VALUES ('$fullName', $age, '$gender', '$email', '$plan')";

    // Execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        // Show a success message if the query was successful
        echo "<div class='alert alert-success text-center'>Subscription successful! Thank you, $fullName.</div>";
    } else {
        // Show an error message if the query failed
        echo "<div class='alert alert-danger text-center'>Error: " . $conn->error . "</div>";
    }
}

// Close the database connection
$conn->close();
?>

        </div>
        <div class="text-center">
            <a href="subscription.html" class="btn btn-submit">Back to Subscriptions</a>
        </div>
    </div>

    <footer>
        <div class="container text-center">
            <p>&copy; 2024 AgeWell Aid. All Rights Reserved.</p>
            <p>Contact us: | <a href="#" class="text-grey">Twitter</a> | <a href="#" class="text-grey">Instagram</a> | <a href="#" class="text-grey">WhatsApp</a></p>
        </div>
    </footer>
</body>
</html>




