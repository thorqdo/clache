<?php


session_start();
include 'process.php';
echo $_SESSION['username'] ;
$mscb =$_SESSION['username'];



// echo $mscb;
// if(isset($_SESSION['username'])){
// //connect to db and select
	$link = mysqli_connect("localhost", "root","", "clache");
	
	
// 	//query
	$result = mysqli_query($link,"select * from account where aid = '$mscb'") or die("Error:account  ").mysqli_error($link);
// 	// 				if (!$result) {
// 	// 						    printf("Error: %s\n", mysqli_error($link));
// 	// 						    exit();
// 	// 					}
// 	// // if (mysqli_connect_errno())
// 	// // 	{
// 	// // 		echo "Failed to connect to MySQL: " . mysqli_connect_error();
// 	// // 	}
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

// 	echo "hi";
	
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Clache</title>
	
	<link href="static/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="static/css/cover.css" type="text/css" rel="stylesheet">
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

  .bimg{
      background-image: url('static/img/cover.jpg');
      background-repeat: no-repeat;
      background-color: black;

    }
    img{
      margin: 5px
    }

	</style>
	
	</head>
	<body class="text-center bimg" style="height:2400px; width: 100%; color:white">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">CLACHE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto" style="padding: auto">
          <li class="nav-item active" style="margin: 4px">
            <button class="btn btn-outline-secondary"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></button>
          </li>
          
          
			
        </ul>
        <form action="logout.php" method="POST" style="margin: 4px"><button type="submit" name="logout" class="btn btn-outline-secondary">Log Out</button></form>
        
        <!-- <a class="nav-item nav-link"  href="logout.php" style="margin: auto">Log Out</a> -->
      </div>
    </nav>
<main>
    <div class ="bgimg opacity-min display-container" >
    <div class="wrapper" style="margin-top: 50px">
    <div class="container box " style="margin-bottom: 20px; width: 100%; background-color: white;opacity: 0.85	">
    	
		
    	<h1 style="color: black"><?php echo $row['fullname']; ?></h1>
    	<h2 style="color:black">Your Employee number: <?php echo $row['aid'];?> </h2>
    	
    </div>
    
	<div class="container box box-light">
	<div class="table table-hover">
	<h2 style="color:#22262d;" >Your Classes!</h2>
	<?php 
	
	$sql = mysqli_query($link,"select * from myview where aid = '$mscb'") or die("Error:  Cannot connect to database").mysqli_error($link);
	// if (mysqli_connect_errno())
	// {echo "fail to connect" . mysqli_connect_error();}
	
	echo "<TABLE BORDER=1>";
	echo "<TR><TH> Class </TH> <TH> Subject </TH>
<TH> Semester </TH> <TH> Year </TH><TD></TD><TD></TD> </TR>";

	while(($kq = mysqli_fetch_array($sql,MYSQLI_ASSOC))){
	    echo "<TR>";
	   
	    echo "<TD> " . $kq['listid'] . " </TD>";
	    echo "<TD> " . $kq['tenhp'] . " </TD>";
	    echo "<TD> " . $kq['semester'] . " </TD>";
	    echo "<TD> <p>" . $kq['year'] . "</p></TD>";
	    echo "<TD> <a href='scanner.php'>Start</a></TD>"; 
	    echo "<TD> <a href='classinfo.php?id=".$kq['aid']."&st=".$kq['listid']."&thp=".$kq['tenhp']."&hk=".$kq['semester']."&y=".$kq['year']."&idlop=".$kq['classid']."'>Details</a></TD>";
	    echo "</TR></a>";
	}
	
	?>
</div>
</div>	
</div>
</div>
	</body>
</html>
