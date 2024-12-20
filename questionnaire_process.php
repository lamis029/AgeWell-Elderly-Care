<?php
// Define a class to represent a feedback entry
class FeedbackEntry {
    // Properties to store feedback details
    public $name;       // Customer's name
    public $email;      // Customer's email
    public $rating;     // Feedback rating (e.g., 1-5 stars)
    public $recommend;  // Whether the customer would recommend the service
    public $services;   // Array of services the customer used
    public $comments;   // Additional comments provided by the customer

    // Constructor to initialize a feedback entry object with user-provided data
    public function __construct($name, $email, $rating, $recommend, $services, $comments) {
        // Use `htmlspecialchars` to prevent HTML injection in user inputs
        $this->name = htmlspecialchars($name);
        $this->email = htmlspecialchars($email);
        $this->rating = htmlspecialchars($rating);
        $this->recommend = htmlspecialchars($recommend);
        $this->services = $services; // Services array does not require sanitization here
        $this->comments = htmlspecialchars($comments);
    }
}

// Array to store feedback entries
$feedbackEntries = [];

// Check if the form was submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data, providing default values if not set
    $name = $_POST['name'] ?? '';           // Name of the user
    $email = $_POST['email'] ?? '';         // Email of the user
    $rating = $_POST['rating'] ?? '';       // Rating given by the user
    $recommend = $_POST['recommend'] ?? ''; // Recommendation response (e.g., yes/no)
    $services = $_POST['services'] ?? [];   // List of services used
    $comments = $_POST['comments'] ?? '';   // Additional feedback comments

    // Validate required fields
    if (empty($name) || empty($email) || empty($rating) || empty($recommend)) {
        // Display an error message if any required fields are missing
        die("<h1 style='color: red; text-align: center;'>Missing required fields. Please go back and fill out the form completely.</h1>");
    }

    // Create a new feedback entry object with the sanitized user inputs
    $entry = new FeedbackEntry($name, $email, $rating, $recommend, $services, $comments);

    // Add the new feedback entry to the feedback entries array
    $feedbackEntries[] = $entry;

    // Generate the feedback summary page
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Feedback Summary</title>
        <style>
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
        <div class='container'>
            <h1>Feedback Summary</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Recommend</th>
                        <th>Services Used</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>";

    // Loop through the feedback entries and display each one in the table
    foreach ($feedbackEntries as $feedback) {
        echo "
                    <tr>
                        <td>{$feedback->name}</td>
                        <td>{$feedback->email}</td>
                        <td>{$feedback->rating}</td>
                        <td>{$feedback->recommend}</td>
                        <td>" . implode(', ', $feedback->services) . "</td>
                        <td>{$feedback->comments}</td>
                    </tr>";
    }

    echo "
                </tbody>
            </table>
            <a href='questionnaire.html' class='btn'>Back to Form</a>
        </div>
        <footer>
            <p>&copy; 2024 Feedback Central. All Rights Reserved.</p>
        </footer>
    </body>
    </html>";
} else {
    // If the page is accessed without submitting the form, display a "no submission" message
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>No Submission</title>
        <style>
            body {
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', Arial, sans-serif;
                background-color: #f1f2f0;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 100px auto;
                text-align: center;
                background: #ffffff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #1a4a63;
                margin-bottom: 20px;
                font-size: 24px;
                font-weight: bold;
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
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>No form submission detected.</h1>
            <a href='feedback_form.html' class='btn'>Back to Form</a>
        </div>
    </body>
    </html>";
}
?>