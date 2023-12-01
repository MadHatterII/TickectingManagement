
<?php
// Initialize a session
session_start();

// Check if the user is already logged in and redirect them if they are
if (isset($_SESSION["user_id"])) {
    header("Location: welcome.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   include '../connection/connection.php';

    // Get user inputs from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize inputs (you should use a more robust validation and sanitization method)
    $email = mysqli_real_escape_string($db_connection, $email);
    $password = mysqli_real_escape_string($db_connection, $password);

    if ($_POST["login_type"] == "ticketing_agent") {
        // Query the database for Ticketing Agents
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    } elseif ($_POST["login_type"] == "admin") {
        // Query the database for Admins
        $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    }

    $result = mysqli_query($db_connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists, log them in and redirect to a welcome page
        $_SESSION["user_id"] = $user_id; // Store user information in the session
        header("Location: index.php");
        exit;
    } else {
        $login_error = "Invalid email or password. Please try again.";
    }

    // Close the database connection
    mysqli_close($db_connection);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0'>
  <link rel="stylesheet" href="style/index.css">
  <style>
    header {
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      z-index: 10;
      padding: 0 10px;
    }

    .navbar {
      display: flex;
      padding: 22px 0;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      justify-content: space-between;
    }

    .navbar .hamburger-btn {
      display: none;
      color: #fff;
      cursor: pointer;
      font-size: 1.5rem;
    }

    .navbar .logo {
      gap: 10px;
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .navbar .logo img {
      width: 40px;
      border-radius: 50%;
    }

    .navbar .logo h2 {
      color: #fff;
      font-weight: 600;
      font-size: 1.7rem;
    }

    .navbar .links-container {
      display: flex;
      align-items: center;
    }

    .navbar .links {
      display: flex;
      gap: 55px;
      list-style: none;
      align-items: center;
      margin-left: auto;
    }

    .navbar .login-btn {
      border: none;
      outline: none;
      background: #fff;
      color: #275360;
      font-size: 1rem;
      font-weight: 600;
      padding: 10px 18px;
      border-radius: 3px;
      cursor: pointer;
      transition: 0.15s ease;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <span class="hamburger-btn material-symbols-rounded">menu</span>
      <a href="#" class="logo">
        <img src="img/slsulogo.png" alt="logo">
        <h2>WanderLust</h2>
      </a>
      <ul class="links">
        <span class="close-btn material-symbols-rounded">close</span>
        <li><a href="#">About us</a></li>
        <li><a href="#">Contact us</a></li>
        <button class="login-btn">LOG IN</button>
      </ul>
      
    </nav>
  </header>

  <div class="blur-bg-overlay"></div>
  <div class="form-popup">
    <span class="close-btn material-symbols-rounded">close</span>
    <div class="form-box login">
      <div class="form-details">
        <h2>Ticketing Agent</h2>
       
      </div>
      <div class="form-content">
        <h2>LOGIN</h2>
        <form method="post" action="login.php"> <!-- Replace with the actual PHP script for login -->
          <div class="input-field">
            <input type="text" name="user" required>
            <label>Email</label>
          </div>
          <div class="input-field">
            <input type="password" name="password" required>
            <label>Password</label>
          </div>
          <input type="hidden" name="login_type" value="ticketing_agent">
          <button type="submit">Log In</button>
        </form>
        <div class="bottom-link">
          Are you an Admin?
          <a href="#" id="signup-link">Admin Login</a>
        </div>
      </div>
    </div>
    <div class="form-box signup">
      <div class="form-details">
        <h2>Admin Login</h2>
       
      </div>
      <div class="form-content">
        <h2>LOGIN</h2>
        <form method="post" action="login.php"> <!-- Replace with the actual PHP script for login -->
          <div class="input-field">
            <input type="text" name="user" required>
            <label>Enter your email</label>
          </div>
          <div class="input-field">
            <input type="password" name="password" required>
            <label>Password</label>
          </div>
          <input type="hidden" name="login_type" value="admin">
          <button type="submit">Log in</button>
        </form>
        <div class="bottom-link">
          Not an Admin?
          <a href="#" id="login-link">Ticketing Agent</a>
        </div>
      </div>
    </div>
  </div>
  
  <script src="jsFiles/index.js"></script>
  
</body>

</html>