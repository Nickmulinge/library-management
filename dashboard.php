<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

function get_query_result($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $result = get_query_result($query);
    echo json_encode($result);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard - Virtual Bookstore</title>
    <link href="css/main.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fetchResult(query, resultId) {
            $.post('dashboard.php', { query: query }, function(data) {
                let result = JSON.parse(data);
                $('#' + resultId).html(result.Book_Name || result.City || 'No result found');
            });
        }
    </script>
</head>
<body>

<header id="header" class="header">
  <div class="container">
    <a href="index.html" class="logo">
      <h1 class="sitename">Virtual Bookstore</h1>
    </a>
    <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    <a class="btn-getstarted" href="index.php">Logout</a>
  </div>
</header>

<main class="main">
    <section class="dashboard section">
        <div class="container">
        <h2>Virtual Bookstore Dashboard</h2>
<p>Welcome to your personalized dashboard. Dive into a dynamic SQL project where you can manage and analyze a diverse collection of books, simulating the experience of running a bookstore chain.</p>
<p>Dataset: Envision managing multiple bookstores. Each book has this details: Book_ID, Book Name, Publisher, ISBN, Edition, Number of Pages, Sales, City, and Price.</p>
<h3>SQL Analysis Challenges:</h3>
<p>Leverage the dataset to address the following analytical challenges:</p>

            <ul>
                <li><button onclick="fetchResult('SELECT * FROM books ORDER BY Price DESC LIMIT 1', 'most_expensive')">Which book is the most expensive?</button></li>
                <li><button onclick="fetchResult('SELECT City, Book_Name, MAX(Sales) AS Sales FROM books GROUP BY City ORDER BY Sales DESC LIMIT 1', 'most_popular_city')">What are the most popular books in each city?</button></li>
                <li><button onclick="fetchResult('SELECT * FROM books ORDER BY Sales DESC LIMIT 1', 'most_bought')">Which is the most bought book?</button></li>
                <li><button onclick="fetchResult('SELECT * FROM books ORDER BY Sales ASC LIMIT 1', 'least_preferred')">Which book is least preferred by the readers?</button></li>
            </ul>
            <h3>Results:</h3>
            <p>Most Expensive Book: <span id="most_expensive"></span></p>
            <p>Most Popular Book in Each City: <span id="most_popular_city"></span></p>
            <p>Most Bought Book: <span id="most_bought"></span></p>
            <p>Least Preferred Book: <span id="least_preferred"></span></p>
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
        Designed by <a href="github/nickmulinge">Nickmulinge</a>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
