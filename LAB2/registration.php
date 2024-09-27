<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "users"; 

$conn = mysqli_connect('localhost', 'root', '', 'users');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

   

    $sql = "INSERT INTO `users` ( `email`, `gender`, `password`) VALUES ( '$email', '$gender', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration Form</title>

  <script src="scripts.js"></script>
</head>
<style>
body {
  background-color: #f0f8ff;
  font-family: Arial, sans-serif;
}



label {
  display: block;
  margin-bottom: 5px;
  color: #333;
}


input[type="submit"] {
  width: 30%;
  padding: 10px;
  background-color: #5cb85c;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>

<body>

  <h2>Registration Form</h2>
  <form action="registration.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>

    <input type="submit" value="Register">
  </form>

</body>

</html>