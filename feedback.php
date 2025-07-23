<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "registration";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$reviews = [
    ['name' => 'Riya Sharma', 'rating' => 5, 'comment' => 'The sign language modules were incredibly helpful! I now feel confident communicating with the deaf community.'],
    ['name' => 'Aisha Kaur', 'rating' => 4, 'comment' => 'The scholarship information provided was easy to understand. It helped me apply to multiple programs I wouldn’t have known about otherwise.'],
    ['name' => 'Liam Kumar', 'rating' => 5, 'comment' => 'I found the job information section very insightful! The tips on resumes and interviews were practical and easy to follow.'],
    ['name' => 'Emily Patel', 'rating' => 3, 'comment' => 'I enjoyed the sign language modules but felt the pace was a bit slow at times. However, I appreciate the effort put into the content.'],
    ['name' => 'Khushi Parakh', 'rating' => 4, 'comment' => 'The scholarship info was comprehensive, but it would be great if there were more links to scholarships in specific fields.'],
    ['name' => 'Sanika Ghosh', 'rating' => 5, 'comment' => 'The job information section was outstanding! It gave me the tools I needed to update my resume and land my first job.'],
];
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Beneficiaries - Feedback</title>
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
.reviews-container {
margin-top: 50px;
text-align: left;
width: 80%;
}
.review {
margin-bottom: 15px;
background-color: #fff;
padding: 10px;
border-radius: 8px;
box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.review h4 {
margin: 0;
font-size: 1.1rem;
}
.review .stars {
color: gold;
}
.review p {
margin-top: 8px;
font-size: 0.9rem;
color: #555;
}
.back-button {
margin-top: 5px;
padding: 10px 20px;
background-color:rgb(142, 123, 110);
color: white;
border: none;
border-radius: 5px;
cursor: pointer;
}
.back-button:hover {
background-color:rgb(113, 100, 87);
}
#home-button{
align-self: left;
background-color: rgb(142, 123, 110);
color: white;
padding: 10px 20px;
margin-left:20px;
border: none;
border-radius: 5px;
cursor: pointer;
margin-top: 5px;
}
#home-button:hover{
background-color: rgb(113, 100, 87);
}
</style>
</head>
<body>
    <h1>What Our Beneficiaries Are Saying:</h1>
    <div class="reviews-container">
        <?php foreach ($reviews as $review): ?>
            <div class="review">
                <h4><?php echo $review['name']; ?> <span class="stars"><?php echo str_repeat('⭐', $review['rating']); ?></span></h4>
                <p><?php echo $review['comment']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="back-button" onclick="window.location.href='http://localhost/webd/title4.php'">Back to Beneficiaries Count</button>
    <button id="home-button" onclick="window.location.href='http://localhost/webd/homepage.php'">Go to Home Page</button>
</body>
</html>
