<?php

if(isset($_POST['btnlogin'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$link = mysqli_connect("localhost", "root","", "clache");
	// INNER JOIN teach ON account.aid = teach.aid
	
	//query
	$result = mysqli_query($link,"select * from account where aid = '$username' and password = '$password'");
	if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($row['aid'] == $username && $row['password'] == $password){
			session_start();
			$_SESSION['username'] = $username;
			$name = $row[fullname];
			$ms = $row[aid];
			header('location: clache.php');
		}else{
			echo "Wrong Username or Password";
			echo "<a href=index.html style='font-size:50px'>Try Again</a>";
	
	} 
}
?>
