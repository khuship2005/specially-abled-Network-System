<?php  
$host = "127.0.0.1"; 
$db_name = "registration"; 
$user_name = "root"; 
$password = ""; 
$conn = mysqli_connect($host, $user_name, $password, $db_name); 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}
if (isset($_POST['register'])) { 
    $name = $_POST['name']; 
    $dob = $_POST['dob']; 
    $mobile = $_POST['mobile']; 
    $gender = $_POST['gender']; 
    $disability = $_POST['disability']; 
    $unique_id = $_POST['unique_id']; 
    $age = $_POST['age']; 
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, dob, age, mobile, gender, disability, unique_id, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $dob, $age, $mobile, $gender, $disability, $unique_id, $username, $password);
    if ($stmt->execute()) { 
        echo "<script>alert('Registration successful! You can now proceed to login.');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} 
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
      body
      {
        background-color: rgba(255, 249, 249, 0.69) ;
      }
      .form-layout a:visited, .form-layout a:active 
      {
        color: #5d89b0;
      }
      h1
      {
       font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      }
      main 
      {
       display: flex;
       flex-direction: column;
       align-items: center;
      }
      .form-layout 
      {
        background-color:rgb(226, 215, 212);          
        color: rgb(109, 86, 64);
        padding: 20px;
        border: 1.4px solid #3f3939;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 10px auto;
        width: 50%;
      }
      .form-layout h1 
      {
        text-align: center;
        margin-bottom: 20px;
      }
      .instructions 
      {
       background-color: rgb(204, 192, 190);
       color:rgb(109, 86, 64);
       font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
       padding: 10px;
       border: 1px solid #ddd;
       border-radius: 10px;margin-bottom: 20px;
      }
      .form-content 
      {
        text-align: left;
        font-family: Verdana, Geneva, Tahoma, sans-serif;  
        font-size: 20px;
      }
      .button-container
      {
        text-align: center;
        margin-top: 20px;
      } 
      select
      {
        width:50%;
        margin-bottom: 5px;
        margin-left: 5px;
        padding: 10px;
        box-sizing: border-box;
        border: 2px solid #fffcfc;
        background-color: rgb(247, 241, 240);
        border-radius: 5px;
      }
      input[type="text"],input[type="password"] 
      {
        width:60%;
        margin-bottom: 5px;
        margin-left: 5px;
        padding: 10px;
        box-sizing: border-box;
        background-color: rgb(247, 241, 240);
        border: 2px solid rgb(247, 241, 240);
        border-radius: 5px;
      }
      .button-container input[type="submit"], .button-container input[type="reset"]
      {
        padding: 15px 40px;
        border: none;
        border-radius: 5px;
        background-color: rgb(109, 86, 64);
        color: #fff;
        cursor: pointer;
      }
      .form-content input[type="radio"]
      {
        width: 15px;
        height: 15px;
      }
      .button-container input[type="reset"]
      {
        background-color: rgb(109, 86, 64);
        margin-left: 10px;
        margin-left: 20px;
      }
      #togglePassword
      {
        position: absolute;
        top: 1051px;
        right: 470px;
        cursor: pointer;
        color: rgb(75, 58, 42);
      }
    </style>
</head>
<body>
    <main>
        <div class="form-layout">
          <h1>REGISTRATION FORM</h1>
          <p class="instructions">
            <b style="font-size: 22px;">Instructions:</b><br>
            1. All fields are mandatory to be filled.<br>
            2. Format for UDID (Unique Disability Id):<br>
            <b>MH 27 05 0012 345678<br><br></b>
            Breakdown:<br>
            MH (Prefix Indicating Maharashtra State)<br>
            27 (State code for Maharashtra)<br>
            05 (District code)<br>
            0012 (Serial Number)<br>
            345678 (Unique identifier)<br><br>
            </p>
          <div class="form-content">
            <p id="headings" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size: 22px;"><b>Personal Details</b></p>
            <form method="post" action="register.php"> 
              Name: <input type="text" name="name" placeholder="firstName lastName" required/><br><br>
              Date of Birth: <input type="text" name="dob" placeholder="YYYY-MM-DD" id="dob" class="flatpickr" aria-required="true" required/><br><br>
              Age: <input type="text" name="age" id="age" readonly/><br><br>
              Mobile No: <input type="text" name="mobile" pattern="[0-9]{10}" placeholder="10 digit" required/><br><br>
              Gender:
               <input type="radio" name="gender" value="male" /> Male 
              <input type="radio" name="gender" value="female" />Female 
              <input type="radio" name="gender" value="other" />Other<br><br>
              Category: 
              <select name="disability" required>
                <option value="">Select</option>
                <option value="Physical Disability">Physical Disability</option>
                <option value="Visual Impairment">Visual Impairment</option>
                <option value="Hearing Impairment">Hearing Impairment</option>
                <option value="Speech Impairment">Speech Impairment</option>
              </select><br><br>
              UDID: <input type="text" name="unique_id" pattern="[A-Za-z]{2}[0-9]{16}" placeholder="e.g. MH27050012345678" required /><br><br>
              <p id="headings" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size: 22px;"><b>Login Details</b></p>
              Username:<input type="text" name="username" required><br><br>
              Password:<input type="password" name="password" required id="password"><br>
              <i class="fas fa-eye" id="togglePassword"></i>
              <div class="button-container">
                <p>Already have an account?
                <a href="login.php">Click here to Login</a></p><br>
                <input type="submit" name="register" value="Register" />
                <input type="reset" name="reset" value="Reset" />
              </div>
            </form>
          </div>
        </div>
      </main>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  
  flatpickr("#dob", {
    dateFormat: "Y-m-d",
  });
  function calculateAge() {
    var dob = document.getElementById("dob").value;
    if (dob === "") {
      document.getElementById("age").value = "";
      return;
    }
    var dobParts = dob.split("-");
    var dobDate = new Date(dobParts[0], dobParts[1] - 1, dobParts[2]); 
    var age = new Date().getFullYear() - dobDate.getFullYear();
    document.getElementById("age").value = age;
  }
  document.getElementById("age").addEventListener("click", function() {
    calculateAge();
  });
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
