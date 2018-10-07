<?php 

if(isset($_GET['st'])){
    $listid = $_GET['st'];
 } 
 // $stds = $_GET['st'];

 if(isset($_GET['thp'])){
   $tenhp = $_GET['thp'];
 }
 // $hp = $_GET['thp'];

 if(isset($_GET['hk'])){
    $semester= $_GET['hk'];
 } 
 // $hki = $_GET['hk'];

 if(isset($_GET['y'])){
    $year = $_GET['y'];
 } 
 // $nhc = $_GET['y'];
if(isset($_GET['idlop'])){
   $classid = $_GET['idlop'];
 }
$aid = $_GET['id'];







$id = stripslashes($id);
// $hp = stripslashes($hp);
// $hki = stripslashes($hki);
// $nhc = stripslashes($nhc);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta charset="utf-8">
	
	
	<link href="static/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="static/css/background.css" type="text/css" rel="stylesheet">
	
</head>

<body style="background-color: white"> 
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">CLACHE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="clache.php">Home <span class="sr-only">(current)</span></a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link " href="scanner.php">CHECK</a>
          </li>
			<form action="logout.php" method="POST" style="margin: 4px"><button type="submit" name="logout" class="btn btn-outline-secondary">Log Out</button></form>
        </ul>
        
      </div>
    </nav>
    <main style="margin-top: 50px; padding: 5px">
<div class="container" align="center" style="margin-top: 50px;">

  <div class="container-s box" style="width: 100%" >
			<h1>CLASS</h1>
			<div class="row">
				<div class="col-sm-3">
			<?php
			echo "Class ID: "; echo "<h2>". $classid."</h2>";
			echo "<br>";?>

			</div>
			<div class="col-sm-3">
			<?php
			echo "Subject: "; echo "<h2>". $tenhp . "</h2>";
			echo "<br>";?></div>
			<div class="col-sm-3">
			<?php
			echo "Semester: "; echo "<h2>". $semester . "</h2>";
			echo "<br>";?></div>
			<div class="col-sm-3">
			<?php
			echo "Year: "; echo "<h2>". $year . "</h2>";
			echo "<br>";?></div>
			

			
			
		</div>

	</div>

	<div class="container box-light" style="margin-top: 20PX; padding: 5px; color: white;">
		<div class="table table-dark" style=" width: 100%; color: white!important;">
			<?php
				$link = mysqli_connect("localhost", "root","", "clache");
				$sql = mysqli_query($link,"SELECT * FROM student WHERE  '$listid' = student.listid" );
				if (mysqli_connect_errno())
					{echo "fail to connect" . mysqli_connect_error();}
				echo "<TABLE BORDER=1 style='width:100%'>";
				echo "<TR><TH> Student ID </TH> <TH> Full Name </TH><TD></TD><TD></TD></TR>";
				while(($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))){
					echo "<TR>";
					echo "<TD> " . $row["studentid"] . " </TD>";
	    			echo "<TD> " . $row["fullname"] . " </TD>";
	    			echo "<TD style='text-align:center'> <a href='showqr.php?mssv=". $row["studentid"] ."&name=".$row["fullname"]."'type='button' class='btn-info' style='width:50%; text-align:center'>Show QR</a> </TD>";
	    			echo "<TD style='text-align:center'> <a href='#'type='button' class='btn-danger' style='width:50%; text-align:center''>Delete</a> </TD></TR>";
				}

			?>
		</div>
		<div class="container-s " style="margin: 14px">
			<h3>Add student to this class</h3>
		<form action="addStudent.php" method="POST" style="text-align: center;" >
			<label>Student ID</label>
		 <input type="text" name="mssv" namespace="Ma So Sinh Vien">
		<label>Full name</label>
		<input type="text" name="hoten" namespace="Ho va Ten">
		<label>Group number</label>
		<input type="text" name="dssv" value="<?php echo $listid ?>">
		<button class="btn btn-danger" type="submit" name="addst">Add</button>
		<button class="btn btn-danger" type="reset" value="Reset"> Reset</button>
	</form>
	</div>
	</div>

	</div>

	</main>
</body>

</html>