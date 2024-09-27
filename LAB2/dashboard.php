<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
</head>

<body>

  <h2>Welcome to the Dashboard</h2>
  <p>Hello, <?php echo $_SESSION['email']; ?>! You are logged in.</p>

  <form action="logout.php" method="post">
    <input type="submit" value="Logout">
  </form>

</body>

</html>