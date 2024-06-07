<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: admin_dashboard.php"); // Redirect to the dashboard
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin login</title>
  <link href="admincss/main.css" rel="stylesheet">
</head>
<body>

<header id="header" class="header">
  <div class="container">
    <a href="index.html" class="logo">
      <h1 class="sitename">Admin Virtual Bookstore</h1>
    </a>
  </div>
</header>

<main class="main">
  <section class="login section">
    <div class="container">
      <h2>Admin Login</h2>
      <form action="index.php" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn">Login</button>
        </div>
        
      </form>
    </div>
  </section>
</main>

<footer id="footer" class="footer">
  <div class="container">
    <div class="footer-top">
      <div class="footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="#about">About us</a></li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      <p>© <span>Copyright</span> <strong class="sitename">Nickmulinge</strong> <span>All Rights Reserved 2024</span></p>
      <div class="credits">
        Designed by <a href="https://github.com/Nickmulinge">Nickmulinge</a>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
