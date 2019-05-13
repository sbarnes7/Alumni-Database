<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name = "theme-color">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--*******************************************************************************-->
<!--CSS functions for formatting the page-->
<style type="text/css">
footer {
background-color: #800000;
color: black;
}
a{
color: white;
}
body {
   background-image: url("https://cdn2.hercampus.com/hero-images/2018/04/21/9131NanticokeHal_66a.jpg");
 color: black;
background-size: cover;
font-weight: bold;
}
.table{
background-color: white;
}
		.jumbotron{
			margin-top: 5px;
				
					
						font-family: "Constantia", Constantia, serif;
                        opacity: 0.82;
							

		}
	  .canvas-container{margin: 0 auto;}
		
	  .navbar{
		  background-color: #800000;
	  }
	 .container {
  position: relative; 
  max-width: 1500px; /* Maximum width */
  margin: 0 auto; /* Center it */
}


* {
    box-sizing: border-box;
}

body {
    margin: 0;
}

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
   color: white; 
    
   
}
</style>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

</head>
<body>

  <nav class="navbar">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>
    
      <li class="active"><a href="account.php">My Account</a></li>
<li><a href="admin.php">Admin Login</a></li>
      <li><a href="http://www.salisbury.edu">Salisbury University</a></li>
      <li><a href="contacts.html">Contact Us</a></li></ul>
     <ul class="nav navbar-nav navbar-right">
     
      

  </div>
</nav> 
<div class="container">
	<!--Section that holds the jumbotron itself and where you can change the text-->
<section class="text bg-light">
	
    
 
<!--*******************************************************************************-->
    <section class="text bg-light">
<font size="5">

<?php
//create short names for variables


if ((!isset($selectattribute)) || (!isset($selecttable)))//if the form hasn't been submitted yet
{
?>
<div class="row">
<div class="col-sm">
<div class="form-group"> 
 
</div>
<div class="col-sm">
    <form action="standardGroupSearch.php" method="get"><!--opens a form -->
      <select id="atts" name="atts"><!--first dropdown-->
      <option value ="School =">School =</option>
      <option value ="Major =">Major =</option>
      <option value ="Graduation Year =">Graduation Year =</option>
    </select>
</div>
<input type="text" name="fillin"/>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<!--spaces-->
<div class="col-sm">
<br>
<input type = "submit" class="btn btn-danger"  name="submit" value="Search"/><!--submits form-->
</div>
</div>
</form>
	
<?php
}

$selectattribute = $_GET['atts'];//these variables are used to GET into from the form of type "get"
//$selecttable = $_GET['tables'];
$fillin = $_GET['fillin'];

$connection = new mysqli('localhost', 'sbull1', 'hank@b520', 'sbull1DB');//connect to DB
/*
	if ($selectattribute=='First Name')//convert dropdown input to table attributes
	   $selectattribute='fname';

        if ($selectattribute=='Last Name')//same as above
		$selectattribute='lname';

        if ($selectattribute=='Phone Number')//same as above
		$selectattribute='phone';

        if ($selectattribute=='Email')//same as above
		$selectattribute='email';
 */	
	
//Shannon's new code:
/*if($selectattribute == 'Salary >')//this might not work because it read in salary as a string...
{
$query = "select fName, lName, Alumni.phone, Alumni.email, Job.salary from Alumni, WorksAs, Job where Alumni.SSN = WorksAs.SSN and WorksAs.jobID=Job.jobID and Job.salary > '$fillin'";
}
if($selectattribute == 'Amount Donated >')
{
$query = "select fName, lName, Alumni.phone, Alumni.email, DonationHistory.amount from Alumni, DonationHistory where Alumni.SSN = DonationHistory.SSN and DonationHistory.amount > '$fillin'";
}
 */
if($selectattribute == 'Major =')
{
$query = "select Alumni.fName, Alumni.lName, Alumni.phone, Alumni.email, GradInfo.major from Alumni, GradInfo where Alumni.SSN=GradInfo.SSN and GradInfo.major='$fillin'";
}
else if($selectattribute == 'Graduation Year =')
{
$query = "select fName, lName, Alumni.phone, Alumni.email, GradInfo.year from Alumni, GradInfo where Alumni.SSN=GradInfo.SSN and GradInfo.year='$fillin'";
}
else if($selectattribute == 'School =')
{
$query = "select fName, lName, Alumni.phone, Alumni.email, GradInfo.schoolOfGrad from Alumni, GradInfo where Alumni.SSN=GradInfo.SSN and GradInfo.schoolofGrad='$fillin'";
}

if($connection->query($query) == TRUE)//if the query is valid enter the if statement
{
        $result = $connection->query($query);//store the result of the query
	$numresults=$result->num_rows;//access the num_rows attribute of the result object
	 if ($selectattribute == 'School =')
        {
        echo '<table class="table">
                <thead class="thead-dark">
                        <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>School</th>
                        </tr></thead>';
	 }
	/*if ($selectattribute == 'Salary >')
        {
        echo '<table class="table">
                <thead class="thead-dark">
                        <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Salary</th>
                        </tr></thead>';
	 }
	 
	 if ($selectattribute == 'Amount Donated >')
        {
        echo '<table class="table">
                <thead class="thead-dark">
                        <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Donation</th>
                        </tr></thead>';
	 }
	 */
	if ($selectattribute == 'Major =')
        {
        echo '<table class="table">
                <thead class="thead-dark">
                        <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Major</th>
                        </tr></thead>';
        }
	if ($selectattribute == 'Graduation Year =')
	{	
	echo '<table class="table">
                <thead class="thead-dark">
                        <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Year</th>
                        </tr></thead>';
	}

	for ($i=0; $i < $numresults; $i++)//iterate over each row in result
        {
        
        $row = $result->fetch_object();//calls member function of result to get row data


	if ($selectattribute=='Major =')
	{
		 	 echo '<td>';
                         echo $row->fName;
                         echo '</td><td>';
                         echo $row->lName;
                         echo '</td><td>';
			 echo $row->phone;
			 echo '</td><td>';
			 echo $row->email;
			 echo '</td><td>';
			 echo $row->major;
			 echo '</td></tr></tbody>';
	}
	/*
       	if ($selectattribute=='Salary >')
        {
                         echo '<td>';
                         echo $row->fName;
                         echo '</td><td>';
                         echo $row->lName;
                         echo '</td><td>';
                         echo $row->phone;
                         echo '</td><td>';
                         echo $row->email;
                         echo '</td><td>';
                         echo $row->salary;
                         echo '</td></tr></tbody>';
	}
	 if ($selectattribute=='Amount Donated >')
        {
                         echo '<td>';
                         echo $row->fName;
                         echo '</td><td>';
                         echo $row->lName;
                         echo '</td><td>';
                         echo $row->phone;
                         echo '</td><td>';
                         echo $row->email;
                         echo '</td><td>';
                         echo $row->amount;
                         echo '</td></tr></tbody>';
	 }*/
	 if ($selectattribute=='School =')
        {
                         echo '<td>';
                         echo $row->fName;
                         echo '</td><td>';
                         echo $row->lName;
                         echo '</td><td>';
                         echo $row->phone;
                         echo '</td><td>';
                         echo $row->email;
                         echo '</td><td>';
			 echo $row->schoolOfGrad;
			 echo '</td></tr></tbody>';
	 }		
	 if ($selectattribute=='Graduation Year =')
        {
                         echo '<td>';
                         echo $row->fName;
                         echo '</td><td>';
                         echo $row->lName;
                         echo '</td><td>';
                         echo $row->phone;
                         echo '</td><td>';
                         echo $row->email;
                         echo '</td><td>';
                         echo $row->year;
                         echo '</td></tr></tbody>';

        }

	

	}
	echo '</table>';
}
else
{

}

	
?>
</font>
</div>
<!--</div>-->
             <br> 


   <!-- </div>
</div>-->
    <br>
    </section>
<!--</div>-->
</body>
<!-- Footer -->
<footer class="page-footer font-small cyan darken-3">


    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">	  Salisbury University~1101 Camden Ave. Salisbury, MD
<br>� 2018 Copyright:
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</html>
