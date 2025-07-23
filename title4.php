<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "registration";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT COUNT(id) AS total_beneficiaries FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_beneficiaries = $row['total_beneficiaries'];
} else {
    $total_beneficiaries = 0;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Beneficiaries</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(252, 240, 232);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    flex-direction: column;
}
h1 {
    color: #333;
    font-size: 2rem;
    text-transform: uppercase;
    font-weight: bold;
    margin-top: 20px;
}
.image-circle {
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background-image: url('bene.jpg');
    background-size: cover;
    background-position: center;
    margin-top: 20px; 
}
.number {
    font-size: 3rem;
    font-weight: bold;
    color: rgb(70, 59, 41);
    margin-top: 50px;
}
.feedback-link {
    font-size: 26px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background-color: rgba(193, 172, 159, 0.87);
    padding: 10px 30px;
    color: rgb(74, 65, 59);
    cursor: pointer;
    margin-top: 20px;
}
.feedback-link:hover {
    color: rgba(9, 5, 0, 0.84);
}
</style>
</head>
<body>
    <div class="image-circle"></div>
    <p><span class="number" id="beneficiaries-count">0</span></p>
    <script>
        const totalBeneficiaries = <?php echo $total_beneficiaries; ?>;
        let currentNumber = 0;
        const numberElement = document.getElementById("beneficiaries-count");

        function animateNumber() {
            if (currentNumber < totalBeneficiaries) {
                currentNumber += Math.ceil(totalBeneficiaries / 100); 
                if (currentNumber > totalBeneficiaries) {
                    currentNumber = totalBeneficiaries;
                }
                numberElement.textContent = currentNumber;
                setTimeout(animateNumber, 50);
            }
        }
        window.onload = function() {
            animateNumber();
        };
    </script>
    <div onclick="window.location.href='feedback.php'">
        <p class="feedback-link">User Insights</p>
    </div>
</body>
</html>
