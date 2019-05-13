<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name = "theme-color">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--*******************************************************************************-->
<!--CSS functions for formatting the page-->
  
</head>
<style>
/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
 background-image: url("https://asg-architects.com/wp-content/gallery/june2015-su-teacher-education-technology-center/01_20356_00_N5_asgweb.jpg");
height: 100%;
font-family: 'Numans', sans-serif;
}
footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
	    background-color: #800000;
		    color: white;
    
    
   
}
form{
color: black;
}
.container{
height: 100%;
align-content: center;
}

	  .navbar{
	  background-color: #800000;
	  }	
	</style>
        <script>
                function doSubmitOne(e){
    setTimeout(function(){location.href="accountSearch.php"} , 30);
                }
</script>

<body>
 <nav class="navbar">
  <div class="container-fluid">

    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html" style="color: white;">Home</a></li>
      <li><a href="account.php" style="color: white;">My Account</a></li>
      <li><a href="admin.php" style="color: white;">Admin Login</a></li>
      <li><a href="http://www.salisbury.edu" style="color: white;">Salisbury University</a></li>
      <li><a href="contacts.html" style="color: white;">Contact Us</a></li></ul>
     
      

  </div>
</nav> 
<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$SSN=$_POST['SSN'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$directfam=$_POST['directfam'];
$deceased=$_POST['deceased'];
?>

    <section class="text text-center bg-light" style="color: white;">

<p><h1>Enter Information Below:</h1></p>
<form method="post" action="addData.php">
<input type="text" name="fname" placeholder="First Name"><br><br>
<input type="text" placeholder="Last Name" name="lname"><br><br>
<input type="text" name="SSN" placeholder="SSN"><br><br>
<input type="text" name="email" placeholder="Email"><br><br>
<input type="text" name="phone" placeholder="Phone"><br><br>
<input type="text" name="directfam" placeholder="Number of Direct Family"><br><br>
<input type="text" name="deceased" placeholder="Deceased? (1 or 0)"><br><br>

<input type="submit" class="btn btn-danger" value="submit" name="submit">
</form>

</section>
<?php
$connection= new mysqli('localhost', 'sbull1', 'hank@b520', 'sbull1DB');

if (mysqli_connect_errno())
{
	echo 'SQL connection failed';
}
$query="insert into Alumni values ('$SSN', '$phone', '$directfam', '$email', '$deceased', '$fname', '$lname')";


if ($connection->query($query) == TRUE)
{
	echo 'Query executed properly';
	echo  $connection->affected_rows;
}
else

?>
<!-- Footer -->
<footer class="page-footer font-small cyan darken-3">


    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">	  Salisbury University~1101 Camden Ave. Salisbury, MD
<br>Â© 2018 Copyright:
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</html>

