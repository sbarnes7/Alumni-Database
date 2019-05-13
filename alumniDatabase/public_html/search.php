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
$table = $_POST['table'];
$attribute = $_POST['attribute'];


if ((!isset($table)) || (!isset($attribute)))
{
?>
	
<form method="post" action="search.php"> <!-- creates a form with this php file as the action to take -->

	<p>Table to search: <input type="text" name="table"></p>  <!-- sets name and password variables -->
	<p>Attribute: <input type="text" name="attribute"></p> <!-- type="password" blocks out characters-->


</form>
<p><input type="submit" name="submit" value="Search"></p> <!-- submits form -->

<!--    <button class="btn btn-primary" type="submit">Go</button>
-->
</form>


<?php
}
else if (1)//
{
$connection = new mysqli('localhost', 'sbull1', 'hank@b520', 'sbull1DB');//connect to DB

$query1 = "select $attribute from $table";
if($connection->query($query1) == TRUE)//if the query is valid enter the if statement
{
        echo 'Query executed properly';
        $result = $connection->query($query1);//store the result of the query
        $numresults=$result->num_rows;//access the num_rows attribute of the result object

        for ($i=0; $i < $numresults; $i++)//iterate over each row in result
        {
                if ($i == 0)//output column name first
                {
                echo "<p>$attribute";// <p> escapes from php and embeds the "NAME" in html document
                }
        $row = $result->fetch_assoc();//calls member function of result to get row data

        echo "<br /> ";//inserts a single line break 
        echo $row[$attribute];//output the attribute of the current row
        }
}
}
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
    <div class="footer-copyright text-center py-3">	  Salisbury University~1101 Camden Ave. Salisbury, MD
<br>� 2018 Copyright:
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</html>

