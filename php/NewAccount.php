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
        echo "<h1>Registration successful! Welcome, $fullname!</h1>";
    } else {
        echo "<h1>Error: " . mysqli_error($con) . "</h1>";
    }

    // Close the database connection
    $con->close();
  }
?>