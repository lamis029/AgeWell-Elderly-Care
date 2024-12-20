<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Home Page - AgeWell Aid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', Arial, sans-serif;
            background-color: #f1f2f0;
            margin: 0;
            padding: 0;
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
        h1 {
            text-align: center;
            color: #1a4a63;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
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
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1a4a63;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #14507a;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #97babf;
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
    <?php
    // Define a class to represent a subscription entry
    // This class will store details for each subscription (user information and selected plan)
    class SubscriptionEntry {
        public $fullName;   // Store the full name of the subscriber
        public $age;        // Store the age of the subscriber
        public $gender;     // Store the gender of the subscriber
        public $email;      // Store the email address of the subscriber
        public $password;   // Store the password (hashed in a real application)
        public $plan;       // Store the subscription plan selected by the subscriber

        // Constructor to initialize the object with given parameters
        // The htmlspecialchars function is used to prevent XSS attacks by escaping special characters
        public function __construct($fullName, $age, $gender, $email, $password, $plan) {
            $this->fullName = htmlspecialchars($fullName);  // Sanitize the full name
            $this->age = intval($age);                      // Convert age to integer
            $this->gender = htmlspecialchars($gender);      // Sanitize gender input
            $this->email = htmlspecialchars($email);        // Sanitize email
            $this->password = htmlspecialchars($password);  // Sanitize password (although should be hashed in practice)
            $this->plan = htmlspecialchars($plan);          // Sanitize the subscription plan
        }
    }

    // Array to store all subscription entries
    // This will be used to store all subscription data in the current session
    $subscriptionEntries = [];

    // Check if the form was submitted via POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form values using the POST method
        // The `??` operator ensures that if the form field is empty or not provided, it defaults to an empty string
        $fullName = $_POST['full_name'] ?? '';
        $age = $_POST['age'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $plan = $_POST['plan'] ?? '';

        // Validate that all required fields have been filled out
        // If any of the fields are empty, the script halts and displays an error message
        if (empty($fullName) || empty($age) || empty($gender) || empty($email) || empty($password) || empty($plan)) {
            die("<h1>Missing required fields. Please go back and fill out the form completely.</h1>");
        }

        // Create a new instance of the SubscriptionEntry class with the provided form data
        $entry = new SubscriptionEntry($fullName, $age, $gender, $email, $password, $plan);

        // Add the newly created subscription entry to the subscriptionEntries array
        // In a real application, you'd typically store this in a database, not just in an array
        $subscriptionEntries[] = $entry;

        // Display a summary of all subscription entries (this is for demonstration purposes)
        echo "<div class='container'>
            <h1>Feedback Summary</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Plan</th>
                    </tr>
                </thead>
                <tbody>";

        // Loop through all subscription entries in the $subscriptionEntries array and display them in the table
        foreach ($subscriptionEntries as $subscription) {
            echo "<tr>
                <td>{$subscription->fullName}</td>  <!-- Output the full name -->
                <td>{$subscription->age}</td>       <!-- Output the age -->
                <td>{$subscription->gender}</td>    <!-- Output the gender -->
                <td>{$subscription->email}</td>     <!-- Output the email -->
                <td>{$subscription->plan}</td>      <!-- Output the subscription plan -->
            </tr>";
        }

        // End the table and the body of the HTML
        echo "</tbody>
            </table>
            <a href='subscription.html' class='btn' style='text-decoration: none;'>Back to Form</a>
        </div>";
    } else {
        // If the form wasn't submitted (i.e., if there's no POST request), display a message indicating no submission was detected
        echo "<div class='container'>
            <h1>No form submission detected.</h1>
            <a href='subscription.html' class='btn'>Back to Form</a>
        </div>";
    }
    ?>
    
</body>
<footer>
  <div class=" text-center">
      <p>&copy; 2024 AgeWell Aid. All Rights Reserved.</p>
      <p>Contact us: | <a href="#" class="text-grey">Twitter</a> | <a href="#" class="text-grey">Instagram</a> | <a href="#" class="text-grey">WhatsApp</a></p>
  </div>
</footer>
</html>

