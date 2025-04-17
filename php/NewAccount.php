<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Account creation status</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../css/newAccount.css">
    <script src="https://kit.fontawesome.com/c878db31aa.js" crossorigin="anonymous"></script>
    <script src="../javascript/login.js"></script>
</head>
<body>
    <div class="main-content">
        <header>
        <nav class="container-navBar">
          <section class="nav-wrapper">
            <section class="home-link">
              <a href="../index.html" class="home-link">
                <img src="../Images/Real_Madrid.png" alt="">
              </a>
            </section>
            <section class="icon-wrapper flex gap-2">
              <section onclick="openNav()" class="block md:hidden">
                <i class="fa-solid fa-bars"></i>
              </section>
              <section id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <section class="overlay-content">
                  <a href="./login.html">Login</a>
                  <a href="./team.html">Team</a>
                  <a href="./fixtures.html">Fixtures</a>
                  <a href="../Shop/kits.html">Shop</a>
                  <a href="./news.html">News</a>
                  <a href="./extra.html">Extra</a>
                </section>
              </section>
            </section>
            <section class="navBar hidden md:block">
              <a href="./login.html">Login</a>
              <a href="./team.html">Team</a>
              <a href="./fixtures.html">Fixtures</a>
              <a href="../Shop/kits.html">Shop</a>
              <a href="./news.html">News</a>
              <a href="./extra.html">Extra</a>
            </section>
          </section>
        </nav>
      </header>

<?php
  if (isset($_POST['email'])) {
    $server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $database = "footballclub";
    $con = mysqli_connect($server, $db_user, $db_pass, $database);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Capture form input data
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into users table
    $sql = "INSERT INTO users (name, email, password, phone, date_of_birth, sex) 
            VALUES ('$fullname', '$email', '$hashed_password', '$phone', '$date', '$sex')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "<div class='success-box'>
                <h1>Registration successful! Welcome, $fullname!</h1>
                <section class='button-wrapper'>
                    <button class='back-home-btn' onclick='window.location.href=\"../index.html\"'>Back to Home</button>
                    <button class='login-btn' onclick='window.location.href=\"../Pages/login.html\"'>Login</button>
                </section>
              </div>";
    } else {
        echo "<h1>Error: " . mysqli_error($con) . "</h1>";
    }

    // Close the database connection
    $con->close();
  }
?>

</div>
</body>
</html>
