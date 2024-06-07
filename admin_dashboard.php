<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin Dashboard - Virtual Bookstore</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
<header id="header" class="header">
  <div class="container">
    <a href="index.html" class="logo">
      <h1 class="sitename">Virtual Bookstore - Admin</h1>
    </a>
    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </nav>
  </div>
</header>

<main class="main">
    <section class="dashboard section">
        <div class="container">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="manage_users.php">User Management</a></li>
                <li><a href="manage_books.php">Book Management</a></li>
                <li><a href="manage_admins.php">Admin Management</a></li>
            </ul>
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
        </ul>
      </div>
    </div>
    <div class="copyright">
      <p>© <span>Copyright</span> <strong class="sitename">Nickmulinge</strong> <span>All Rights Reserved 2024</span></p>
      <div class="credits">
        Designed by <a href="github/nickmulinge">Nickmulinge</a>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
