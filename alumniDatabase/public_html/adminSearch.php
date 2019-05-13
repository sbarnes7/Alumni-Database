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
color: gray;
}
a{
color: blue;
font-weight: bold;
}
body {
    background-image: url("https://asg-architects.com/wp-content/gallery/june2015-su-teacher-education-technology-center/01_20356_00_N5_asgweb.jpg");
   color: black;

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
.form{
color: black;
}
footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;

color: white;

}
.dropped{
color: black;
}
a{
color: white;
}
.navbar{
background-color: #800000;
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
<!--*******************************************************************************-->

</head>
<body>

  <nav class="navbar">
  <div class="container-fluid">
<!--<p>Table to search: <input type="text" name="table"></p>-->  <!-- sets name and password variables -->
<ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>

      <li><a href="account.php">My Account</a></li>
<li class="active"><a href="admin.php">Admin Login</a></li>
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
<h1>Search</h1>
<?php
//create short names for variables


if ((!isset($selectattribute)) || (!isset($selecttable)))
{
?>

        <form action "adminSearch.php"  style="color: black;" id="dropped" method="get">
                <p>Search by:
                <select id="atts" name="atts" style:"color: black;">
                        <option value ="lName">Last Name</option>
                        <option value ="fName">First Name</option>
                        <option value ="phone">Phone Number</option>
                        <option value ="email">Email</option>
                </select></p>
                <input type="text" name="search"/>

                <p>Table to search: <!--sets name and password variables-->
                <select id="tables" name="tables">
                        <option value ="Contact Report">Contact Report</option>
                        <option value ="Donation Info">Donation Info</option>
                        <option value ="Involvement">Involvement</option>
                        <option value ="Grad Info">Grad Info</option>
                        <option value ="Workplace">Workplace</option>
                        <option value ="Job">Job</option>
                        <option value ="Basic Info">Basic Info</option>
                </select></p>



<p><input type="submit" class="btn btn-danger" name="submit" value="Search"></p> <!-- submits form -->

<!--    <button class="btn btn-primary" type="submit">Go</button>
-->
</form>
</font>


<?php
}

//else if (1)//
//{
$connection = new mysqli('localhost', 'sbull1', 'hank@b520', 'sbull1DB');//connect to DB

$selectAttribute = $_GET['atts'];
$selecttable = $_GET['tables'];
$line = $_GET['search'];


        if($selectAttribute == 'First Name')
                $selectAttribute = 'fname';
        if($selectAttribute == 'Last Name')
                $selectAttribute = 'lname';
        if($selectAttribute == 'Phone Number')
                $selectAttribute = 'phone';
        if($selectAttribute == 'Email')
                $selectAttribute = 'email';



        if($selecttable == 'Contact Report')
        {
                $query="select Alumni.fName, Alumni.lName, ContactReport.dateOfContact, ContactReport.whoContacted, ContactReport.donated
                        from Alumni, ContactReport
                        where Alumni.SSN = ContactReport.SSN and $selectAttribute = '$line'";
        }
        if($selecttable == 'Donation Info')
        {
                $query="select Alumni.fName, Alumni.lName, DonationHistory.dateDonated, DonationHistory.amount,
                        DonationHistory.donatedTo
                         from Alumni, DonationHistory
                         where Alumni.SSN = DonationHistory.SSN and $selectAttribute = '$line'";
        }
        if($selecttable == 'Involvement')
        {
                $query="select Alumni.fName, Alumni.lName, Involvement.activityName, Involvement.numYears
                        from Alumni, Involvement
                         where Alumni.SSN = Involvement.SSN and $selectAttribute = '$line'";
        }
        if($selecttable == 'Grad Info')
        {
                $query="select Alumni.fName, Alumni.lName, GradInfo.schoolOfGrad, GradInfo.major, GradInfo.minor,
                        GradInfo.gpa, GradInfo.year
                         from Alumni, GradInfo
                         where $selectAttribute = '$line' and Alumni.SSN = GradInfo.SSN";
        }
  if($selecttable == 'Workplace')
        {
                $query="select Alumni.fName, Alumni.lName, Workplace.companyName, Workplace.address, Workplace.phone
                        from Alumni, Workplace, WorksAt
                        where Alumni.SSN = WorksAt.SSN and WorksAt.companyName = Workplace.companyName and 
                        WorksAt.address = Workplace.address and $selectAttribute = '$line'";
        }
        if($selecttable == 'Job')
        {
                $query="select Alumni.fName, Alumni.lName, Job.positionTitle, Job.jobID, Job.salary
                        from Alumni, Job, WorksAs
                         where Alumni.SSN = WorksAs.SSN and WorksAs.positionTitle = Job.positionTitle
                         and WorksAs.jobID = Job.jobID and $selectAttribute = '$line'";
        }
        if($selecttable == 'Basic Info')
        {
                $query="select Alumni.fName, Alumni.lName, Alumni.phone, Alumni.email, Alumni.SSN 
                        from Alumni 
                        where $selectAttribute = '$line'";
        }

if($connection->query($query) == TRUE)//if the query is valid enter the if statement
{
                 if($selecttable == 'Donation Info')
		 {	
		echo '<table class="table table-dark">
		<thead class="thead-dark">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Date Donated</th>
				<th>Amount Donated</th>
				<th>Donated To</th>
			</tr></thead>';
		 }

       


			       if($selecttable == 'Contact Report')
                 {
                echo '<table class="table">
                <thead class="thead-dark">
                        <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date of Contact</th>
                                <th>Contactor</th>
                                <th>Donated</th>
                        </tr></thead>';
                 }
                  if($selecttable == 'Involvement')
                 {
                echo '<table class="table">
                <thead class="thead-dark">
                        <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Activity Name</th>
                                <th>Num Years</th>
                        </tr></thead>';
                  }

		  if($selecttable == 'Grad Info')
		 {	
		echo '<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>School of Graduation</th>
				<th>Major</th>
				<th>Minor</th>
				<th>GPA</th>
				<th>Year</th>
			</tr></thead>';
		   }
		 if($selecttable == 'Workplace')
		 {	
		echo '<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Company Name</th>
				<th>Company Address</th>
				<th>Company Phone</th>
				</tr></thead>';
		 }
		 if($selecttable == 'Job')
		 {	
		echo '<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Position Title</th>
				<th>Job ID</th>
				<th>Salary</th>
				</tr></thead>';
		 }
		   if($selecttable == 'Basic Info')
		 {	
		echo '<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone Number</th>
				<th>Email</th>
				<th>SSN</th>
			</tr></thead>';
		   }





       // echo 'Query executed properly';
        $result = $connection->query($query);//store the result of the query
        $numresults=$result->num_rows;//access the num_rows attribute of the result object 




        for ($i=0; $i < $numresults; $i++)//iterate over each row in result
        {
                 $row = $result->fetch_object();//calls member function of result to get row data

                 echo "<br /> ";//inserts a single line break
		
		   if($selecttable == 'Contact Report'){
                         echo '<td>';
                         echo $row->fName;
                         echo '</td><td>';
                         echo $row->lName;
                         echo '</td><td>';
                         echo $row->dateOfContact;
			 echo '</td><td>';
                         echo $row->whoContacted;
                         echo '</td><td>';
                         echo $row->donated;
                         echo '</td></tr></tbody>';
                }
		 if($selecttable == 'Donation Info'){
			 echo '<td>';
                         echo $row->fName;
                         echo '</td><td>';
                         echo $row->lName;
                         echo '</td><td>';
                         echo $row->dateDonated;
                         echo '</td><td>';
                         echo $row->amount;
                         echo '</td><td>';
			 echo $row->donatedTo;
			 echo '</td></tr></tbody>';
                }
                 if($selecttable == 'Involvement')
		 {
			 echo '<td>';
                        echo $row->fName;
                        echo '</td><td>';
                        echo $row->lName;
                        echo '</td><td>' ;
                        echo $row->activityName;
   echo '</td><td>';
			echo $row->numYears;
			echo '</td></tr></tbody>';
                 }
                 if($selecttable == 'Grad Info')
		 {
			 echo '<td>';
                        echo $row->fName;
                        echo '</td><td>';
                        echo $row->lName;
                        echo '</td><td>';
                        echo $row->schoolOfGrad;
                        echo '</td><td>';
                        echo $row->major;
                        echo '</td><td>';
                        echo $row->minor;
                        echo '</td><td>';
                        echo $row->gpa;
                        echo '</td><td>';
			echo $row->year;
			echo '</td></tr></tbody>';
                 }
                 if($selecttable == 'Workplace')
                {
			echo '<td>';
			echo $row->fName;
                        echo '</td><td>';
                        echo $row->lName;
                        echo '</td><td>';
                        echo $row->companyName;
                        echo '</td><td>';
                        echo $row->address;
                        echo '</td><td>';
			echo $row->phone;
			echo '</td></tr></tbody>';
		 }
                 if($selecttable == 'Job')
		 {
			  echo '<td>';
			 echo $row->fName;
			echo '</td>';
      
			 echo '<td>';
			 echo $row->lName;
			 echo '</td>';
                        
			 echo '<td>';
			 echo $row->positionTitle;
			 echo '</td>';
                        
			 echo '<td>';
			 echo $row->jobID;
			 echo '</td>';
  
			 echo '<td>';
			 echo  $row->salary;
			 echo '</td>';
			echo '</tr></tbody>';

				 }
                 if($selecttable == 'Basic Info')
		 {
			 echo '<td>';
			 echo $row->fName;
			echo '</td>';
      
			 echo '<td>';
			 echo $row->lName;
			 echo '</td>';
                        
			 echo '<td>';
			 echo $row->phone;
			 echo '</td>';
                        
			 echo '<td>';
			 echo $row->email;
			 echo '</td>';
  
			 echo '<td>';
			 echo  $row->SSN;
			 echo '</td>';
			echo '</tr></tbody>';
		 }
	} 
	echo '</table>';
}
else{

}
//}
?>
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
    <div class="footer-copyright text-center py-3">       Salisbury University~1101 Camden Ave. Salisbury, MD
<br>� 2018 Copyright:
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</html>

