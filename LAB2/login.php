<?php
session_start();


if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>

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


input[type="password"] {
  width: 20%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="email"] {
  width: 20%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  width: 21%;
  padding: 10px;
  background-color: #5cb85c;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #4cae4c;
}

.error {
  color: red;
  font-size: 0.9em;
}
</style>

<body>

  <h2>Login</h2>
  <form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Login">
  </form>

  <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "users"; 

        $conn = mysqli_connect('localhost', 'root', '', 'users');

      
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

       
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

      
            if (password_verify($password, $row['password'])) {
             
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];

                header("Location: dashboard.php");
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No account found with that email.";
        }

        mysqli_close($conn);
    }
    ?>

</body>

</html>