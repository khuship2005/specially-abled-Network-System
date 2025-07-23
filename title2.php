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
	<title>Job Portal</title>
	<head>
  <style>
  body 
  {
    font-family: Arial, sans-serif;
    background-color: rgb(252, 240, 232);
   }         
  #filter 
  {
  padding: 10px;
  border-radius: 5px;
  width: 200px;
  color: rgb(77, 62, 51);
  font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.filter-container span {
  margin-right: 10px;
  font-weight: bold;
}
.filter-container {
  background-color: rgb(222, 207, 195);
  padding: 10px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-bottom: 1px solid #ccc;
  width:50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
}
.filter-container select {
  padding: 10px;
  border-radius: 5px;
  width: 100%;
}
.job-container 
{
 display: flex;
 flex-wrap: wrap;
 justify-content: center;
 padding-top: 20px;
}
.job 
{
margin: 10px;
padding: 10px;
border: 1px solid #ccc;
border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
width: calc(50% - 20px);
background-color:rgb(143, 122, 117);
}
p
{ 
  margin-left: 25px;
  font-size: 20px; 
  font-family:Verdana, Geneva, Tahoma, sans-serif;
  color: #fff;
 }
  .job-title 
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
  .arrow {
  border: solid #ead8c2;
  border-width: 0 3px 3px 0;
  margin-right: 10px;
  display: inline-block;
  padding: 3px;
  transform: rotate(45deg);
  transition: transform 0.2s ease;
}

.job-description {
  position: relative;
  display: none;
  padding: 30px;
  background-color: rgb(241, 229, 221);
  color: rgb(63, 52, 45);
}
pre {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.apply-button {
  background-color: rgb(109, 86, 64);
  color: rgb(248, 241, 236);
  padding: 10px 25px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  position: absolute; 
margin-top: -15px;
right: 20px;
}
.apply-button:hover {
  background-color: rgb(109, 86, 64);
}
.blinking-button {
  animation: blink 5s infinite;
  background-color: rgb(109, 86, 64);
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
.company {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  color: #f1e4dc;
  margin-right: 20px;
}
</style>            
</head>
<body>
	<div class="filter-container">
    <span style="
    color: rgb(102, 84, 72);
    font-size: 18px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Filter by:</span>
    <select id="filter">
      <option value="all">All</option>
      <option value="multiple disabilities">Multiple Disabilities</option>
      <option value="physical disability">Physical Disability</option>
      <option value="hearing impairment">Hearing Impairment</option>
      <option value="speech impairment">Speech Impairment</option>
    </select>
  </div>
	<div class="job-container">
		<div class="job" id="job1" data-category="multiple disabilities">
			<div class="job-title">
				<p>Online Data Analyst</p>
				<span class="company">by TELUS Digital AI</span>
				<i class="arrow"></i>
			</div>
			<div class="job-description">
        <pre>
 Category: Multiple Disabilities
 Experience: 0-1 years
 Basic Requirements: 
   - Full Professional Proficiency in English & Punjabi language
   - Being a resident in India for the last 2 consecutive years
   - Daily access to a broadband internet connection, computer, 
     and relevant software 
                </pre>
                <button class="apply-button" onclick="applySuccess()">Apply</button>
			</div>
		</div>
		<div class="job" id="job-2" data-category="multiple disabilities">
			<div class="job-title">
				<p>Media Search Analyst</p>
				<span class="company"> by Convergys </span>
				<i class="arrow"></i>
			</div>
			<div class="job-description">
                <pre>
Category: Multiple Disabilities
Experience: 0-1 years
Basic Requirements: 
  - Being a speaker of english language, with fluency in both 
    written and spoken forms
  - Computer Literacy: Basic knowledge of computer hardware, 
    software, and operating  systems
  - Microsoft Office Skills: Proficiency in Microsoft Word, 
    Excel, and other productivity software
</pre>
<button class="apply-button" onclick="applySuccess()">Apply</button>
			</div>
		</div>
		<div class="job" id="job-3" data-category="speech impairment">
			<div class="job-title">
				<p>Computer Engineer</p>
				<span class="company">by Amazon</span>
				<i class="arrow"></i>
			</div>
			<div class="job-description">
<pre>
Category: Speech Impairment
Experience: 0-1 years
Basic Requirements: 
  - Knowledge of programming languages such as Python, Java, C++, etc.
  - Ability to collect, analyze, and interpret data using tools like 
    Excel, SQL, etc.
  - Understanding of computer networks, including hardware, protocols,
    and security.
    </pre>
    <button class="apply-button" onclick="applySuccess()">Apply</button>
			</div>
		</div>
        <div class="job" id="job-4" data-category="hearing impairment">
			<div class="job-title">
				<p>Typing Assistant</p>
				<span class="company"> by Accenture Accessibility </span>
				<i class="arrow"></i>
			</div>
			<div class="job-description">
                <pre>
Category: Hearing Impairment
Experience: 0-1 years
Basic Requirements: 
  - Typing Speed: 30-60 words per minute (wpm)
  - Computer Literacy: Basic knowledge of computer hardware, software, and 
    operating systems
  - Microsoft Office Skills: Proficiency in Microsoft Word, Excel, and other
    productivity software
</pre>
<button class="apply-button" onclick="applySuccess()">Apply</button>
			</div>
		</div>
        <div class="job" id="job-5" data-category="physical disability">
			<div class="job-title">
				<p>Full stack Development</p>
				<span class="company">by Convergys</span>
				<i class="arrow"></i>
			</div>
			<div class="job-description">
                <pre>
Category: Physical Disability
Experience: 1-2 years
Basic Requirements: 
  - Familiarity with popular frameworks and libraries like React, Angular, 
    Vue.js, Node.js.
  - Understanding of database concepts, including data modeling, 
    normalization, and querying
  - Proficiency in programming languages such as JavaScript, HTML/CSS,
    Python, Ruby, PHP.
</pre>
<button class="apply-button" onclick="applySuccess()">Apply</button>
			</div>
		</div>
        <div class="job" id="job-6" data-category="physical disability">
			<div class="job-title">
				<p>Sales Representative</p>
				<span class="company">by Therapy Mojo</span>
				<i class="arrow"></i>
			</div>
			<div class="job-description">
                <pre>
Category: Physical Disability
Experience: 0-1 years
Basic Requirements: 
  - Set up follow-up calls or appointments for the sales team
  - Maintain a database of leads and update records in the CRM
  - Achieve weekly and monthly sales targets to earn incentives
</pre>
<button class="apply-button" onclick="applySuccess()">Apply</button>
			</div>
		</div>
        <div class="job" id="job-7" data-category="hearing impairment">
			<div class="job-title">
				<p>Electrical Engineer </p>
				<span class="company">by Mphasis Accessibility
                </span>
				<i class="arrow"></i>
			</div>
			<div class="job-description">
                <pre>
Category: Hearing Impairment
Experience: 10+ years
Basic Requirements: 
  - Diploma or Degree in Electrical Engineering or a related field.
  - Hands-on experience with electrical systems, circuits, and equipment.
  - Possession of safety certifications, such as OSHA (Occupational Safety 
    and Health Administration) 
                </pre>
                <button class="apply-button" onclick="applySuccess()">Apply</button>
			</div>
		</div>
        <div class="job" id="job-8" data-category="multiple disabilities">
                <div class="job-title">
                    <p>Math Reasoning Specialist</p>
                    <span class="company">by MathWorks</span>
                    <i class="arrow"></i>
                </div>
                <div class="job-description">
                    <pre>
    Category: Multiple Disabilities
    Experience: 1-2 years
    Basic Requirements: 
      - PhD or Master’s degree in Mathematics.
      - Excellent attention to detail Strong problem-solving skills.
      - Currently residing in India.
    </pre>
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
const filterSelect = document.getElementById('filter');
const jobs = document.querySelectorAll('.job');
const jobTitles = document.querySelectorAll('.job-title');
filterSelect.addEventListener('change', (e) => {
  const filterValue = e.target.value;
  jobs.forEach((job) => {
    const category = job.dataset.category;
    if (filterValue === 'all' || category === filterValue) {
      job.style.display = 'block';
    } else {
      job.style.display = 'none';
    }
  });
});
jobTitles.forEach((jobTitle) => {
  jobTitle.addEventListener('click', (e) => {
    const job = jobTitle.parentElement;
    const jobDescription = job.querySelector('.job-description');
    jobDescription.style.display = jobDescription.style.display === 'block' ? 'none' : 'block';
  });
});
    </script>
</body>
</html>