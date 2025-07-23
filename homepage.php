<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Homepage</title>
<style>
.header
{
position: absolute;
top: 2px;
left: 0;
width: 130px;
height: 130px;
}
.logo 
{
position: fixed;
top: 0px;
left: 0;
width:130px;
height: 130px;
}
body 
{
position: relative;
font-family: Arial, sans-serif;
margin: 0;
padding: 0;
}
body::before 
{
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-image: url("bgimg.jpg");
background-size: cover;
background-position: center;
background-repeat: no-repeat;
background-attachment: fixed;
filter: blur(5px);
opacity: 0.5;
z-index: -1;
}
.title 
{
background-color: rgb(204, 192, 190);
height: 69.2px;
margin-top: 56.5px;
text-align: center;
font-family: Verdana, Geneva, Tahoma, sans-serif;
color: rgb(109, 86, 64);
letter-spacing: 2px;
padding-top: 0px;
font-size: 40px;
}
.tagline 
{
background-color: rgb(204, 192, 190);
height: 22px;
margin-top: -36px;
text-align: center;
font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
color: rgb(109, 92, 77);
padding-top: 0.01px;
font-size: medium;
}
.login-signup 
{
margin-top: 12px;
text-align: right;
padding-right: 20px;
}
.login-btn, .signup-btn 
{
padding: 15px 25px;
border: none;
border-radius: 5px;
background-color: rgb(109, 86, 64);
color: #fff;
cursor: pointer;
margin-left: 10px;
}
.login-btn:hover, .signup-btn:hover 
{
background-color: rgb(143, 119, 104);
transform: scale(1.1);
}
.image-gallery 
{
display: flex;
flex-wrap: wrap;
justify-content: center;
align-items: center;
padding-top: 130px;
}
.image-container 
{
margin: 17px;
}
.gallery-image 
{
width: 170px;
height: 170px;
border-radius: 50%;
object-fit: cover;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
cursor: pointer;
transition: transform 0.2s ease-in-out;
}
.gallery-image:hover 
{
transform: scale(1.1);
}
.image-title 
{
text-align: center;
margin-top: 10px;
color: rgb(99, 71, 55);
background-color: rgb(236, 220, 209);
font-size: large;
font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
border-radius: 5%;
padding: 5px;
}
.blur 
{
filter: blur(2px);
opacity: 0.5;
}
@keyframes fadeIn 
{
from 
{
transform: translateX(100%);
opacity: 0;
}
to {
transform: translateX(0);
opacity: 1;
}
}
.image-container:nth-child(1) 
{
animation: fadeIn 1s ease-in-out;
animation-fill-mode: both;
animation-delay: 0s;
}
.image-container:nth-child(2) 
{
animation: fadeIn 1s ease-in-out;
animation-fill-mode: both;
animation-delay: 0.5s;
}
.image-container:nth-child(3) 
{
animation: fadeIn 1s ease-in-out;
animation-fill-mode: both;
animation-delay: 1s;
}
.image-container:nth-child(4) 
{
animation: fadeIn 1s ease-in-out;
animation-fill-mode: both;
animation-delay: 1.5s;
}
.image-container:nth-child(5) 
{
animation: fadeIn 1s ease-in-out;
animation-fill-mode: both;
animation-delay: 2s;
}
.logged-in
{
text-align: right;
}
button
{
padding: 15px 25px;
border: none;
border-radius: 5px;
background-color: rgb(109, 86, 64);
color: #fff;
cursor: pointer;
margin-left: 10px;
}
button:hover
{
background-color: rgb(143, 119, 104);
transform: scale(1.1);
}
</style>
</head>
<body>
    <div class="header">
        <img src="logonew.png" alt="Logo" class="logo">
    </div>
    <div class="title">
        <p>SPECIAL SPACE</p>
    </div>
    <div class="tagline">
        <p>Your Space for Empowerment!</p>
    </div>
    <!-- Session-based Login/Logout Section -->
    <div class="login-signup">
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href='logout.php'><button>Logout</button></a>";
        } else {
            echo "<a href='login.php'><button class='login-btn'>Login</button></a>";
            echo "<a href='register.php'><button class='signup-btn'>Register</button></a>";
        }
        ?>
    </div>
    <div class="image-gallery">
        <div class="image-container">
            <div onclick="window.location.href='title1.html'">
                <img src="title1.png" alt="Image 1" class="gallery-image">
                <p class="image-title">SL Coach</p>
            </div>
        </div>
        <div class="image-container">
            <div onclick="window.location.href='title2.php'">
                <img src="title2.png" alt="Image 2" class="gallery-image">
                <p class="image-title">Career Hub</p>
            </div>
        </div>
        <div class="image-container">
            <div onclick="window.location.href='title3.php'">
                <img src="title3.jpg" alt="Image 3" class="gallery-image">
                <p class="image-title">Scholarships</p>
            </div>
        </div>
        <div class="image-container">
            <div onclick="window.location.href='title4.php'">
                <img src="title4.jpg" alt="Image 4" class="gallery-image">
                <p class="image-title">Beneficiaries</p>
            </div>
        </div>
        <div class="image-container">
            <div onclick="window.location.href='title5.html'">
                <img src="title5.jpg" alt="Image 5" class="gallery-image">
                <p class="image-title">Our Mission</p>
            </div>
        </div>
    </div>
</body>
</html>
