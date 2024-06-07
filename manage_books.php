<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_book'])) {
        $book_name = $_POST['book_name'];
        $publisher = $_POST['publisher'];
        $isbn = $_POST['isbn'];
        $edition = $_POST['edition'];
        $number_of_pages = $_POST['number_of_pages'];
        $sales = $_POST['sales'];
        $city = $_POST['city'];
        $price = $_POST['price'];

        $query = "INSERT INTO books (Book_Name, Publisher, ISBN, Edition, Number_of_pages, Sales, City, Price) 
                  VALUES ('$book_name', '$publisher', '$isbn', '$edition', '$number_of_pages', '$sales', '$city', '$price')";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['delete_book'])) {
        $book_id = $_POST['book_id'];
        $query = "DELETE FROM books WHERE Book_ID='$book_id'";
        mysqli_query($conn, $query);
    }
}

$books = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manage Books - Virtual Bookstore</title>
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
            <h2>Manage Books</h2>
            <form method="POST" action="">
                <label for="book_name">Book Name:</label>
                <input type="text" id="book_name" name="book_name" required>

                <label for="publisher">Publisher:</label>
                <input type="text" id="publisher" name="publisher" required>

                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required>

                <label for="edition">Edition:</label>
                <input type="text" id="edition" name="edition" required>

                <label for="number_of_pages">Number of Pages:</label>
                <input type="number" id="number_of_pages" name="number_of_pages" required>

                <label for="sales">Sales:</label>
                <input type="number" id="sales" name="sales" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>

                <button type="submit" name="add_book">Add Book</button>
            </form>

            <h3>Existing Books</h3>
            <table>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Publisher</th>
                    <th>ISBN</th>
                    <th>Edition</th>
                    <th>Number of Pages</th>
                    <th>Sales</th>
                    <th>City</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php while ($book = mysqli_fetch_assoc($books)) { ?>
                    <tr>
                        <td><?php echo $book['Book_ID']; ?></td>
                        <td><?php echo $book['Book_Name']; ?></td>
                        <td><?php echo $book['Publisher']; ?></td>
                        <td><?php echo $book['ISBN']; ?></td>
                        <td><?php echo $book['Edition']; ?></td>
                        <td><?php echo $book['Number_of_pages']; ?></td>
                        <td><?php echo $book['Sales']; ?></td>
                        <td><?php echo $book['City']; ?></td>
                        <td><?php echo $book['Price']; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="book_id" value="<?php echo $book['Book_ID']; ?>">
                                <button type="submit" name="delete_book">Delete</button>
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
