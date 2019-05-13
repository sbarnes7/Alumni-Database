<?php
//create short names for variables

$name = $_POST['name']; // a _POST variable holds data submitted by a form fields (username) 
$password = $_POST['password']; // holds data submitted by the password field

if ((!isset($name)) || (!isset($password)))//use isset() to check if $name and $password have been entered
{
//Visitor needs to enter a name and password
?>
<h1>Please Log In</h1>

<form method="post" action="secret.php"> <!-- creates a form with this php file as the action to take -->

<p>Username: <input type="text" name="name"></p>  <!-- sets name and password variables -->
<p>Password: <input type="password" name="password"></p> <!-- type="password" blocks out characters-->

<p><input type="submit" name="submit" value="Log In"></p> <!-- submits form -->
</form>

<?php
}

else if(($name=="ryan") && ($password=="pass")) //after the form is entered, this else if resumes 
{

// visitor's name and password combination are correct
echo "<h1>Success!</h1>
<p>You entered the correct username and password.</p>";


}

else
{
// visitor's name and password combination are not correct
echo "<h1>Failed!</h1>
<p>You are not authorized to use this resource.</p>";
}
?>
