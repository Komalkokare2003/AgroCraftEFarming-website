<?php
// Set database connection parameters
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "impulse101";

// Create database connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form has been submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number'];
    
    $product_code = $_POST['product_code'];
    $amount = $_POST['amount'];

    // Insert data into database
    $sql = "INSERT INTO payments(name, email, card_number, product_code, amount) VALUES ('$name', '$email', '$card_number', '$product_code', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Simple Payment Form</title>
	<style>
		body {
  font-family: Arial, sans-serif;
  background-color: #F0F8FF;
}

h1 {
  text-align: center;
  margin-top: 50px;
}

form {
  max-width: 400px;
  margin: 0 auto;
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"],
input[type="email"],
input[type="number"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 4px;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  transition: all 0.3s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #32CD32;
  box-shadow: 0 0 5px rgba(0,0,0,0.5);
}

	</style>
</head>
<body>
	<h1> Payment Form</h1>
	<form method="post">
		<label>Name:</label>
		<input type="text" name="name" required>
		<br>
		<label>Email:</label>
		<input type="email" name="email" required>
		<br>
		<label>Card Number:</label>
		<input type="text" name="card_number" required>
		<br>
		<label>Product Code:</label>
		<input type="text" name="product_code" required>
		<br>
		<label>Amount:</label>
		<input type="number" name="amount" step="0.01" required>
		<br>
		<input type="submit" name="submit" value="Submit Payment">
	</form>
</body>
</html>
