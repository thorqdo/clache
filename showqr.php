<?php
if(isset($_GET['mssv'])){
    $mssv = $_GET['mssv'];
 } 

?>

<html>
<head>
<meta charset="UTF-8">
		
		<!-- Bootstrap core CSS -->

		<style class="anchorjs"></style>
		<link href="http://www.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" >
		
		
		<link href="./static/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="./static/css/details.css" type="text/css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">CLACHE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto" style="padding: auto">
          <li class="nav-item active" style="margin: 4px">
            <button class="btn btn-outline-secondary"><a class="nav-link" href="clache.php">Home <span class="sr-only">(current)</span></a></button>
          </li>
          
          
			
        </ul>
        <form action="logout.php" method="POST" style="margin: 4px"><button type="submit" name="logout" class="btn btn-outline-secondary">Log Out</button></form>
        
        <!-- <a class="nav-item nav-link"  href="logout.php" style="margin: auto">Log Out</a> -->
      </div>
    </nav>

<div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3 text-center">
        	<div class="box">
        		<!-- php get information -->
        		<?php
        		$link = mysqli_connect("localhost", "root","", "clache");
				$sql = mysqli_query($link,"SELECT * FROM student WHERE  '$mssv' = student.studentid" );
				if (mysqli_connect_errno())
					{echo "fail to connect" . mysqli_connect_error();}
				$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				echo "Fullname: ";
				echo $row['fullname'];
				echo "<br>";
				echo "Student id:";
				echo $row['studentid'];
				echo "<br>";
				echo "Student's qrcode:";
				echo "<br>";
        		?>
        		<!-- done -->
        	</div>
         
        
        </div>
        <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
		<!-- <img src="qrcode.php?text='<?php echo $row['malop'];echo $row['tenhp']; ?>'&size=500&padding=20" alt="QR CODE"> -->
		<?php 
		echo shell_exec("python qrgenerator.py $mssv") ?>
		<img src='student.png' width="500px" height="500px">
		
		</div>
      </div>
</body>

</html>