<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "registration");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $mysqli->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $db_username, $db_password);
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $db_password)) 
        {
            $_SESSION['username'] = $db_username;
            header("Location: homepage.php");
        } else {
          echo "<script>alert('Invalid password!');</script>";
      }
  } else {
      echo "<script>alert('User not found!');</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    body 
    {
      font-family: Arial, sans-serif;
      background-color: rgba(255, 245, 241, 0.78) ;
    }
    p
    {
        color:rgb(83, 65, 49);
    }
    .form-container a:visited, .form-container a:active 
    {
      color: #5d89b0;
    }
    .form-container 
    {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      height: 280px;
      padding: 20px;
      border: 1.5px solid #3f3939;
      border-radius: 2%;
      text-align: center;
      background-color: rgb(226, 215, 212);
    }
    .form-container input[type="text"], .form-container input[type="password"] 
    {
      width: 72%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
    }
    .form-container input[type="submit"], .form-container input[type="reset"] 
    {
      padding: 15px 40px;
      border: none;
      border-radius: 5px;
      background-color: rgb(109, 86, 64);
      color: #fff;
      cursor: pointer;
      margin-top: 10px;
    }
    .form-container input[type="reset"] 
    {
      margin-left: 20px;
    }
    .form-container h2 
    {
      text-align: center;
      color: rgb(109, 86, 64);
      margin-top: 0;
    }
    #password 
    {
      width: 72%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
    }
    #togglePassword 
    {
      position: absolute;
      top: 43%;
      right: 80px;
      cursor: pointer;
      color: rgb(75, 58, 42);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>LOGIN</h2>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <div>
        <input type="password" name="password" placeholder="Password" required id="password">
        <i class="fas fa-eye" id="togglePassword"></i>
      </div>
      <p>Don't have an account? <a href="register.php">Register here</a></p>
      <div class="button-container">
        <input type="submit" name="login" value="Login">
        <input type="reset" value="Reset">
      </div>
    </form>
  </div>
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function () {
      if (password.type === 'password') {
        password.type = 'text';
        togglePassword.className = 'fas fa-eye-slash';
      } else {
        password.type = 'password';
        togglePassword.className = 'fas fa-eye';
      }
    });
  </script>
</body>
</html>

