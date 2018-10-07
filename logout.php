<?php 
echo "Log Out";
echo $_POST['logout'];
if(isset($_POST['logout'])){
	echo "vao vong lap";
	session_start();
	echo "started session";
	session_unset();

	session_destroy();
	echo "session destroyed";
	header('location: index.html');
	exit();
	echo "you are successfully logged out!";
}
?>
