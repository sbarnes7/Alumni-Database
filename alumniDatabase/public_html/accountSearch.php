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
color: white;
font-weight: bold;
}
body {
   background-image: url("https://cdn2.hercampus.com/hero-images/2018/04/21/9131NanticokeHal_66a.jpg");
   color: white;
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

          nav {
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
   Search By:&ensp; <form action="accountSearch.php" method="get"><!--opens a form -->
      <select id="atts" name="atts"><!--first dropdown-->
   
      <option value ="First Name">First Name</option>

      <option value ="Last Name">Last Name</option>
      <option value ="Phone Number">Phone Number</option>
      <option value ="Email">Email</option>
    </select>
<br>
<input type="text" name="fillin"/>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<!--spaces-->
  <br>
  Display From: &emsp; <select id="tables" name="tables"><!--second dropdown-->
          <option value ="Workplace">Workplace</option>
  <option value ="Basic Information">Basic Information</option>
    </select>
<br>
<input type = "submit" class="btn btn-danger" name="submit" value="Search"/><!--submits form-->
</div>
</div>
</form>

<?php
}

$selectattribute = $_GET['atts'];//these variables are used to GET into from the form of type "get"
$selecttable = $_GET['tables'];
$fillin = $_GET['fillin'];

$connection = new mysqli('localhost', 'sbull1', 'hank@b520', 'sbull1DB');//connect to DB

        if ($selectattribute=='First Name')//convert dropdown input to table attributes
           $selectattribute='fname';

        if ($selectattribute=='Last Name')//same as above
                $selectattribute='lname';

        if ($selectattribute=='Phone Number')//same as above
                $selectattribute='phone';

        if ($selectattribute=='Email')//same as above
                $selectattribute='email';

if ($selecttable == 'Basic Information')//then we want to do the following query
{
$query="select fName, lName, email, phone from Alumni where $selectattribute = '$fillin'";
}
else//then they entered Workplace in the dropdown and we want all from workplace
{
$query="select Alumni.fName, Alumni.lName, Workplace.companyName, Workplace.phone, Workplace.address from Workplace, Alumni, WorksAt where Alumni.$selectattribute='$fillin' and Alumni.SSN=WorksAt.SSN and WorksAt.address=Workplace.address and WorksAt.companyName=Workplace.companyName";
}//this query uses their fname and SSN to track down that info

if($connection->query($query) == TRUE)//if the query is valid enter the if statement
{
	// echo 'Query executed properly';
	


                 if($selecttable == 'Basic Information')
		 {	
		echo '<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Email</th>
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




        $result = $connection->query($query);//store the result of the query
        $numresults=$result->num_rows;//access the num_rows attribute of the result object

        if ($selectattribute=='fname')
        {
         $queryAlum="select fname, lname from Alumni where fname='$fillin'";
        }

        if ($selectattribute=='lname')
        {
        $queryAlum="select fname, lname from Alumni where lname='$fillin'";
        }

        if ($selectattribute=='phone')
        {
        $queryAlum="select fname, lname from Alumni where phone='$fillin'";
        }

        if ($selectattribute=='email')
        {
        $queryAlum="select fname, lname from Alumni where email='$fillin'";
        }

 $Alumni=$connection->query($queryAlum);

         echo "<br /> ";//inserts a single line break 
/*      echo '<table>
                <tr>     
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                </tr>';*/

        for ($i=0; $i < $numresults; $i++)//iterate over each row in result
        {
        $fnamelname=$Alumni->fetch_object();
        $row = $result->fetch_object();//calls member function of result to get row data

        if ($selecttable=='Basic Information')
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
        if ($selecttable=='Workplace')
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

        }
     echo '</table>';

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
    <div class="footer-copyright text-center py-3">       Salisbury University~1101 Camden Ave. Salisbury, MD
<br>� 2018 Copyright:
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</html>


