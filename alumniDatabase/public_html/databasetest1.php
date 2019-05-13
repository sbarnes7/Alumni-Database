<html>
<body>
<?php
	if($connection=@mysqli_connect('localhost','sbull1','hank@b520','sbull1DB')){
		print '<p>Successfully connected to MYSQL.</p>';
	}else{
		die('<pCound not connect to MySQL because:<b>'.mysql_error().'</b></p>');
	}

	$query= "SELECT*FROM Ships";
	$r = mysqli_query($connection, $query);
		echo "<table border ='1'>
		<thead>
			<tr>
				<th> name </th>
				<th> classes </th>
				<th> launched </th>
			</tr>
		</thead>";

	mysqli_close($connection);
?>
</body>
</html>
