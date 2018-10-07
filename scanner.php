<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Clache</title>
	
	<link href="static/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="static/css/background.css" type="text/css" rel="stylesheet">
	<style type="text/css" rel="stylesheet">
	.box-light{
	   background-color: white;
	   width: 100%;
	   max-width: 90%;
	   text-align: center;
	   padding_bottom:1px;
	   padding: 15px;
	}
	table{
	   
        width: 100%;
        background-color: #22262d;
        
        
	}
	</style>
	
	</head>
	<body class="text-center " style="height:2400px; width: 100%; color:white">
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
<main>
	<p style="margin-top: 30%; color: black;">
	<?php
	echo shell_exec("python scanner.py");
	?></p>
</main>
</body>
</html>



