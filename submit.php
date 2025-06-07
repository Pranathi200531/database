<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);

    $sql = "INSERT INTO users (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        $message = "Thank you, " . htmlspecialchars($name) . ", for submitting the form.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $message = "No name was submitted.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Submission Result</title>
</head>
<body>
    <h1>Form Submission Result</h1>
    <p><?php echo $message; ?></p>
    <a href="index.html">Back to form</a>
</body>
</html>
