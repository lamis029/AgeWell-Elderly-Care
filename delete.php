<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Delete Subscriber - AgeWell Aid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #f1f2f0;
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
        p {
            text-align: center;
        }
        .btn-submit {
            background-color: #d9534f; 
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .btn-submit:hover {
            background-color: #c9302c; 
        }
        .btn-back {
            background-color: #1a496b; 
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .btn-back:hover {
            color: white;
            background-color: #14507a; 
        }
        .alert {
            margin-top: 20px;
        }
        .d-flex {
            display: flex;
            margin-left: 35%; 
        }
        .me-2 {
            margin-right: 8px; 
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
    <h3>Delete Subscriber</h3>
    <p>Enter the name of the subscriber you want to delete:</p>
    <form method="post" action="">
        <input type="text" name="subscriber_name" placeholder="Subscriber Name" class="form-control w-50 mx-auto">
        <div class="text-center d-flex mt-3">
            <button type="submit" class="btn-submit me-2">Delete</button>
            <a href="subscription.html" class="btn-back btn">Go Back</a>
        </div>
    </form>
    <?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if the name field is empty
    if (empty($_POST["subscriber_name"])) {
        echo "<div class='alert alert-warning text-center'>Please enter a name before submitting.</div>";
    } else {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "agewelldb";

        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Stop if the connection failed
        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Connection failed: " . $conn->connect_error . "</div>");
        }

        // Get the name and make it safe
        $subscriberName = $conn->real_escape_string($_POST["subscriber_name"]);

        // Check if the name exists in the database
        $checkSql = "SELECT * FROM subscriptions WHERE FullName = '$subscriberName'";
        $result = $conn->query($checkSql);

        // If the name exists delete it
        if ($result->num_rows > 0) {
            $deleteSql = "DELETE FROM subscriptions WHERE FullName = '$subscriberName'";
            if ($conn->query($deleteSql) === TRUE) {
                echo "<div class='alert alert-success'>Subscriber '$subscriberName' deleted successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        } else {
            // If the name is not found, show a message
            echo "<div class='alert alert-warning'>Subscriber '$subscriberName' does not exist in the database. Please check the name and try again.</div>";
        }

        // Close the database connection
        $conn->close();
    }
}
?>

</div>
</body>
<footer>
    <div class=" text-center">
        <p>&copy; 2024 AgeWell Aid. All Rights Reserved.</p>
        <p>Contact us: | <a href="#" class="text-grey">Twitter</a> | <a href="#" class="text-grey">Instagram</a> | <a href="#" class="text-grey">WhatsApp</a></p>
    </div>
</footer>
</html>