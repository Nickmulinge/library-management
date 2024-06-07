<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];
        $query = "DELETE FROM users WHERE id='$user_id'";
        mysqli_query($conn, $query);
    }
}
$users = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manage Users - Virtual Bookstore</title>
    <link href="admincss/main.css" rel="stylesheet">
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
    <section class="manage section">
        <div class="container">
            <h2>Manage Users</h2>
            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="add_user">Add User</button>
            </form>
            <h3>Existing Users</h3>
            <ul>
                <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                    <li>
                        <?php echo $user['username']; ?>
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete_user">Delete</button>
                        </form>
                    </li>
                <?php } ?>
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
