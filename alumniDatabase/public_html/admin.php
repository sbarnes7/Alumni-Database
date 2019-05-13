<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
	background-image: url("https://asg-architects.com/wp-content/gallery/june2015-su-teacher-education-technology-center/01_20356_00_N5_asgweb.jpg");
	background-size: cover;
	background-repeat: no-repeat;
	height: 100%;
	font-weight: bold;
}

.container{
	height: 100%;
	align-content: center;
}

.card{
	height: 370px;
	margin-top: auto;
	margin-bottom: auto;
	width: 500px;
	background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
	font-size: 60px;
	margin-left: 10px;
	color: #FFC312;
}

.social_icon span:hover{
	color: white;
	cursor: pointer;
}

.card-header h3{
	color: white;
}

.social_icon{
	position: absolute;
	right: 20px;
	top: -45px;
}

.input-group-prepend span{
	width: 50px;
	background-color: #FFC312;
	color: black;
	border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
	width: 20px;
	height: 20px;
	margin-left: 15px;
	margin-right: 5px;
}

.login_btn{
	color: black;
	background-color: #FFC312;
	width: 100px;
}

.login_btn:hover{
	color: black;
	background-color: white;
}

.links{
	color: white;
}

.links a{
	margin-left: 4px;
}

navbar{
	color: #F00000;
}

.href{
	color: yellow;
}

.navbar .navbar-nav>a:hover,
.navbar .navbar-nav>a:focus {
  color: #800000;
  background-color: white;
}

.navbar-nav .navbar-nav .nav-link {
    color: black;
}
</style>
</head>
<script>
                function doSubmitOne(e){
    setTimeout(function(){location.href="halfway.html"} , 30);
		}
		 function doSubmitTwo(e){
    setTimeout(function(){location.href="admin.php"} , 30);
                }

</script>


<body>
	<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #800000">
	<div class="collapse navbar-collapse" id="navbarNav">
	  <ul class="nav navbar-nav">
		<a class ="nav-item nav-link" href="index.html">Home</a>
		<a class ="nav-item nav-link" href="account.php">My Account</a>
		<a class ="nav-item nav-link" href="admin.php">Admin Login</a>
		<a class ="nav-item nav-link" href="http://www.salisbury.edu">Salisbury University</a>
		<a class ="nav-item nav-link" href="contacts.html">Contact Us</a>
	  </ul>
	</div>
	</nav>

	<div class="container">
<?php

//create short names for variables
$user = $_GET['user'];
$pass = $_GET['pass'];

if ((!isset($user)) || (!isset($pass)))

{
?>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Administrator Login</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
		<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="user">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="pass">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
				<?php
}
else if (1)//
{
$connection = new mysqli('localhost', 'sbull1', 'hank@b520', 'sbull1DB');//connect to DB
//$query1 = "select name from Ships";
$query1 = "select username from Users where username='$user' and password='$pass' and adminpriv=1";

if ($connection->query($query1) == TRUE)//if the query is valid enter the if statement
{

        $result = $connection->query($query1);
                $numrows = $result->num_rows;
                if ($numrows == 1)
                {
                        echo '<script type="text/javascript">',
     'doSubmitOne(event);',
     '</script>'
;
		}
		else
		{
			echo '<script type="text/javascript">',
     'doSubmitTwo(event);',
     '</script>';

		}
}
else
	echo 'not working';

}
//}
?>

			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
						Salisbury University
				</div>
				<div class="d-flex justify-content-center links">
						Alumni Database
					</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
