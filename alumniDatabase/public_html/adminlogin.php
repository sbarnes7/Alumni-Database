

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
	<script>
		function doSubmitOne(e){
    setTimeout(function(){location.href="http://example.com/alternate_url.html"} , 300);
		}
</script>

<!--CSS functions for formatting the page-->
<style type="text/css">
footer {
background-color: black;
color: gray;
}
a{
color: blue;
font-weight: bold;
}
body {
   background-image: url("logo.png");
   color: black;
font-weight: bold;
}
		.jumbotron{
			margin-top: 5px;
				
					
						font-family: "Constantia", Constantia, serif;
                        opacity: 0.82;
							

		}
	  .canvas-container{margin: 0 auto;}
		
	  .nav a{
		  font-size: 20px;
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

  <nav class="navbar navbar-inverse">
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
<h1>Search</h1>
<?php
//create short names for variables
$user = $_POST['user'];
$pass = $_POST['pass'];


if ((!isset($user)) || (!isset($pass)))
{
?>
	
<form method="post" action="adminlogin.php"> <!-- creates a form with this php file as the action to take -->

	<p>Table: <input type="text" name="user"></p>  <!-- sets name and password variables -->
	<p>Attribute: <input type="password" name="pass"></p> <!-- type="password" blocks out characters-->
<?php
	
?>
<p><input type="submit" name="submit" value="Login"></p> <!-- submits form -->

<!--    <button class="btn btn-primary" type="submit">Go</button>
-->
</form>

<?php
}
else if (1)//
{
$connection = new mysqli('localhost', 'sbull1', 'hank@b520', 'sbull1DB');//connect to DB
//$query1 = "select name from Ships";
$query1 = "select username from Users where username='$user' and password='$pass' and adminpriv=1";
	
	if($connection->query($query1) == TRUE)//if the query is valid enter the if statement
	{
		$result = $connection->query($query1);
		$numrows = $result->num_rows;
		if ($numrows == 1)
		{
		echo 'worked';
		}
		else 
		{
		echo 'fuck';
		}
	}
	else
	{
	echo 'fuck';

	}

}
?>
</div>
    <br>

    <br>
    </section>

</body>

<footer class="page-footer font-small cyan darken-3">


    
    <div class="footer-copyright text-center py-3">	  Salisbury University~1101 Camden Ave. Salisbury, MD
<br>� 2018 Copyright:
    </div>
    <!-- Copyright -->

  </footer>
 
</html>
