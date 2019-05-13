<?php
//Create a connection:
$password='hank@b520';//ENTER PASSWORD YOU USE TO GET INTO MYSQL BETWEEN QUOTES

$connection = new mysqli('localhost', 'sbull1', $password, 'sbull1DB');//connect to DB
If (mysqli_connect_errno())//if there is an error returned 
{
echo 'Error: Could not connect to database. ';
exit;
}

//now we can start writing queries:
$query1 = "select major from GradInfo";

if($connection->query($query1) == TRUE)//if the query is valid enter the if statement
{
	echo 'Query executed properly';
	$result = $connection->query($query1);//store the result of the query
	$numresults=$result->num_rows;//access the num_rows attribute of the result object

	for ($i=0; $i < $numresults; $i++)//iterate over each row in result
	{
		if ($i == 0)//output column name first
		{
		echo "<p>MAJOR;// <p> escapes from php and embeds the "NAME" in html document
		}
	$row = $result->fetch_assoc();//calls member function of result to get row data
	
	echo "<br /> ";//inserts a single line break 
	echo $row['major'];//output the 'name' attribute with clean formatting
	
	}
}
else
{
	echo 'There was an error executing that query: '.$connection->error;
}

$connection-close();
?>

