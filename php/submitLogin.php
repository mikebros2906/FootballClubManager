<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../css/submitLogin.css">
    <script src="https://kit.fontawesome.com/c878db31aa.js" crossorigin="anonymous"></script>
    <script src="../javascript/login.js"></script>
</head>
<body>
<main class="main-content">
        <!-- Navigation bar code -->
        <nav class="container-navBar">
            <section class="nav-wrapper">
                <a href="../index.html" class="home-link">
                    <img src="../Images/Real_Madrid.png" alt="">
                </a>
                <section class="icon-wrapper flex gap-2">
                    <button onclick="openNav()" class="block md:hidden">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <nav id="myNav" class="overlay">
                        <button class="closebtn" onclick="closeNav()">&times;</button>
                        <section class="overlay-content">
                            <a href="./login.html">Login</a>
                            <a href="./team.html">Team</a>
                            <a href="./fixtures.html">Fixtures</a>
                            <a href="../Shop/kits.html">Shop</a>
                            <a href="./news.html">News</a>
                            <a href="./extra.html">Extra</a>
                        </section>
                    </nav>
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
<main class="loginSuccess-wrapper">

<section class="form-box">
  <h2>Login Situation</h2>
  <?php
  $show_retry_button = true;  // Default state is to show the retry button

  if (isset($_POST['username']) && isset($_POST['password'])) {
    $server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $database = "footballclub";
    $con = mysqli_connect($server, $db_user, $db_pass, $database);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize user inputs to prevent SQL injection
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // SQL query to fetch the user based on the email
    $sql = "SELECT * FROM users WHERE email = '$username' LIMIT 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Check if the entered password matches the stored hash
        if (password_verify($password, $user['password'])) {
            $name = $user['name'];
            echo "<h1>Welcome $name!</h1>";
            $show_retry_button = false;  // Hide retry button after successful login
        } else {
            echo "<h1>Incorrect password. Please try again.</h1>";
        }
    } else {
        echo "<h1>User not found. Please try again.</h1>";
    }

    $con->close();
  }
?>

<section class="button-wrapper">
  <button class="back-home-btn" onclick="window.location.href='../index.html'">
    Back to Home
  </button>

  <?php if ($show_retry_button): ?>
    <button class="retry-btn" onclick="window.location.href='../Pages/login.html'">
      Retry
    </button>
  <?php endif; ?>
</section>


</section>
</main>

        </section>
</main>
</body>
</html>