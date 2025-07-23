<?php
session_start();
if (!isset($_SESSION['username'])) {
  $_SESSION['error'] = "You must be logged in to access this page.";
  echo "<script type='text/javascript'> 
          alert('".$_SESSION['error']."'); 
          window.location.href = 'login.php'; 
        </script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Scheme & Scholarship</title>
  <style>
body 
 {
font-family: Arial, sans-serif;
background-color: rgb(252, 240, 232);
}
a
{
color:rgb(97, 97, 134);
}      
.scheme-container 
{
 margin-top: 50px;
 display: flex;
 flex-wrap: wrap;
 justify-content: center;
 padding-top: 20px;
}
.scheme 
{
margin: 5px;
padding: 20px;
border: 1px solid #ccc;
border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
width: calc(50% - 20px);
background-color:rgb(205, 185, 172);
}
p
{ 
  margin-left: 25px;
  font-size: 20px; 
  font-family:Verdana, Geneva, Tahoma, sans-serif;
  color: rgb(87, 50, 21);
 }
  .scheme-title 
  {
  display: flex;
  align-items: center;
  justify-content: space-between;
  cursor: pointer;
  }
.company 
{
   font-size: 14px;
   color:black;
   margin-left:100px;
   padding-left:100px;
   text-align:left;
}
.arrow 
{
 border: solid rgb(79, 65, 56);
 border-width: 0 3px 3px 0;
 margin-right: 10px;
 display: inline-block;
 padding: 3px;
 transform: rotate(45deg);
 transition: transform 0.2s ease;
}
.scheme-description 
{
display: none;
padding: 20px;
background-color:rgb(241, 227, 217);
color: rgb(50, 47, 44) ;
position: relative;
}
pre
{
font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.apply-button {
position: absolute; 
margin-top: -25px;
right: 20px;
background-color:rgb(91, 71, 53);
color:rgb(248, 241, 236);
padding: 10px 30px;
border: none;
border-radius: 5px;
cursor: pointer;
}
.apply-button:hover 
{
background-color:rgb(109,86,64);
}
.blinking-button 
{
  animation: blink 5s infinite;
  background-color:rgb(109,86,64);
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
.company
{
    font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color: #f1e4dc;
    margin-right: 20px;
}
  </style>
</head>
<body>
  <div class="scheme-container">
    <div class="scheme" id="scheme1">
      <div class="scheme-title">
        <p>Pre-Matric Scholarship</p>
        <i class="arrow"></i>
      </div>
      <div class="scheme-description">
      <table border="1" cellpadding="5" cellspacing="0">
          <tr>
            <td>Scholarship Level</td>
            <td>Pre-matric / Class 9-10</td>
          </tr>
          <tr>
            <td>Application Mode</td>
            <td>Online</td>
          </tr>
          <tr>
            <td>Scholarship Provider</td>
            <td>Department of Empowerment of Persons with Disability, Government of India</td>
          </tr>
          <tr>
            <td>Eligibility Criteria</td>
            <td>
              <ul>
                <li>Students with at least 40% disability</li>
                <li>Class 9-10 students</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>Scholarship Benefits</td>
            <td>
              <ul>
                <li>Maintenance Allowance</li>
                <li>Disability Allowance</li>
                <li>Book Grant</li>
              </ul>
            </td>
          </tr>
        </table>
        <br>
        <h4 style="color:rgb(79, 59, 45);">For more Detail:
            <a href="scheme1.pdf">View PDF</a></h4>
        <button class="apply-button" onclick="applySuccess()">Apply</button>
      </div>
    </div>
    <div class="scheme" id="scheme2">
      <div class="scheme-title">
        <p>Post-Matric Scholarship</p>
        <i class="arrow"></i>
      </div>
      <div class="scheme-description">
        <table border="1" cellpadding="5" cellspacing="0">
          <tr>
            <td>Scholarship Level</td>
            <td>Post-matric / Degree/Diploma level</td>
          </tr>
          <tr>
            <td>Application Mode</td>
            <td>Online</td>
          </tr>
          <tr>
            <td>Scholarship Provider</td>
            <td>Department of Empowerment of Persons with Disability, Government of India</td>
          </tr>
          <tr>
            <td>Eligibility Criteria</td>
            <td>
              <ul>
                <li>Students with at least 40% disability</li>
                <li>Pursuing degree/diploma level education</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>Scholarship Benefits</td>
            <td>
              <ul>
                <li>Maintenance Allowance</li>
                <li>Disability Allowance</li>
                <li>Reimbursement of Tuition Fees</li>
              </ul>
            </td>
          </tr>
        </table>
        <br>
        <h4 style="color:rgb(79, 59, 45);">For more Detail:
            <a href="scheme2.pdf">View PDF</a></h4>
            <button class="apply-button" onclick="applySuccess()">Apply</button>
      </div>
    </div>
    <div class="scheme" id="scheme3">
        <div class="scheme-title">
          <p>Scholarship for Top Class Education</p>
          <i class="arrow"></i>
        </div>
        <div class="scheme-description">
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                <td>Scholarship Level</td>
                <td>PG Degree or Diploma courses</td>
                </tr>
                <tr>
                <td>Application Mode</td>
                <td>Online</td>
                </tr>
                <tr>
                <td>Scholarship Provider</td>
                <td>Department of Empowerment of Persons with Disability, Government of India</td>
                </tr>
                <tr>
                <td>Eligibility Criteria</td>
                <td>
                    <ul>
                        <li>Disability of at least 40%</li>
                        <li>Selected or Admitted to a designated institution (e.g. IIT, IIM, NIT)</li>
                        <li>Family income less than INR 6 Lac annually</li>
                    </ul>
                    </td>
                </tr>
                <tr>
                <td>Scholarship Benefits</td>
                <td>
                    <ul>
                        <li>Tuition Fees</li>
                        <li>Maintenance Allowance (Hostellers)</li>
                        <li>Computer and Accessories</li>
                        <li>Aids and Assistive Devices</li>
                        <li>Book and Stationary Allowance</li>
                    </ul>
                </td>
                </tr>
                </table>
          <br>
          <h4 style="color:rgb(79, 59, 45);">For more Detail:
            <a href="scheme3.pdf">View PDF</a></h4>
            <button class="apply-button" onclick="applySuccess()">Apply</button>
        </div>
      </div>
      <div class="scheme" id="scheme4">
        <div class="scheme-title">
          <p>AICTE - Saksham Scholarship</p>
          <i class="arrow"></i>
        </div>
        <div class="scheme-description">
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                <td>Scholarship Level</td>
                <td>Diploma / Degree</td>
                </tr>
                <tr>
                <td>Application Mode</td>
                <td>Online</td>
                </tr>
                <tr>
                <td>Scholarship Provider</td>
                <td>Department of Empowerment of Persons with Disability, Government of India</td>
                </tr>
                <tr>
                <td>Eligibility Criteria</td>
                <td>
                    <ul>
                        <li>Disability of at least 40%</li>
                        <li>Enrolled in the first year of a diploma or degree program at an AICTE-recognized college</li>
                        <li>Family income less than INR 8 Lac annually</li>
                    </ul>
                    </td>
                </tr>
                <tr>
                <td>Scholarship Benefits</td>
                <td>
                    <ul>
                        <li>Total Scholarships: 1000 scholarships awarded each year</li>
                        <li>Scholarship Amount:
                          <ul type="square"> <li>Tuition: INR 30,000</li>
                            <li>Incidentals: INR 20,000</li>
                            </ul>
                          </li>
                    </ul>
                </td>
                </tr>
                </table>
          <br>
          <h4 style="color:rgb(79, 59, 45);">For more Detail:
            <a href="scheme4.pdf">View PDF</a></h4>
            <button class="apply-button" onclick="applySuccess()">Apply</button>
        </div>
      </div>
  </div>

  <script>
   function applySuccess() {
        var username = "<?php echo $_SESSION['username']; ?>";
        if (username) {
            alert(username + ', your application has been submitted successfully!');
        }
    }
    const schemeTitles = document.querySelectorAll('.scheme-title');
    schemeTitles.forEach((schemeTitle) => {
      schemeTitle.addEventListener('click', (e) => {
        const scheme = schemeTitle.parentElement;
        const schemeDescription = scheme.querySelector('.scheme-description');
        schemeDescription.style.display = schemeDescription.style.display === 'block' ? 'none' : 'block';
        });
    });
  </script>
</body>
</html>
