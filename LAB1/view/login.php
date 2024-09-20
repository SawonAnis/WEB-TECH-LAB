<?php

$email = $password = "";
$email_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["email"])) {
        $email_err = "Please enter an email.";
    } else {
        $email = $_POST["email"];
    }


    if (empty($_POST["password"])) {
        $password_err = "Please enter a password.";
    } else {
        $password = $_POST["password"];
    }

 
    if (empty($email_err) && empty($password_err)) {
        echo "Login successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
  body {
    background-color: #f0f8ff;
    font-family: Arial, sans-serif;
  }

  .container {
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  h2 {
    text-align: center;
    color: #333;
  }

  label {
    display: block;
    margin-bottom: 5px;
    color: #333;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  input[type="submit"] {
    width: 100%;
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
</head>

<body>
  <div class="container">
    <h2>Login</h2>
    <form action="login.php" method="post">
      <label>Email</label>
      <input type="text" name="email" value="<?php echo $email; ?>">
      <span class="error"><?php echo $email_err; ?></span>

      <label>Password</label>
      <input type="password" name="password">
      <span class="error"><?php echo $password_err; ?></span>

      <input type="submit" value="Login">
    </form>
  </div>
</body>

</html>