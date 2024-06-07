<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_admin'])) {
        $admin_username = $_POST['admin_username'];
        $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO admins (username, password) VALUES ('$admin_username', '$admin_password')";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['delete_admin'])) {
        $admin_id = $_POST['admin_id'];
        $query = "DELETE FROM admins WHERE id='$admin_id'";
        mysqli_query($conn, $query);
    }
}

$admins = mysqli_query($conn, "SELECT * FROM admins");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manage Admins - Virtual Bookstore</title>
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
            <h2>Manage Admins</h2>
            <form method="POST" action="">
                <label for="admin_username">Username:</label>
                <input type="text" id="admin_username" name="admin_username" required>

                <label for="admin_password">Password:</label>
                <input type="password" id="admin_password" name="admin_password" required>

                <button type="submit" name="add_admin">Add Admin</button>
            </form>

            <h3>Existing Admins</h3>
            <table>
                <tr>
                    <th>Admin ID</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php while ($admin = mysqli_fetch_assoc($admins)) { ?>
                    <tr>
                        <td><?php echo $admin['id']; ?></td>
                        <td><?php echo $admin['username']; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="admin_id" value="<?php echo $admin['id']; ?>">
                                <button type="submit" name="delete_admin">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
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
