<?php
	session_start();
	#fetch data from database
	// $connection = mysqli_connect("localhost","root","");
	// $db = mysqli_select_db($connection,"agri");
  include '../db_connect.php';
  $id="";
	$name = "";
	$email= "";
	$password = "";
	$address = "";
  $contact="";
  $resume="";
  $work="";
  $salary="";
	$query = "select * from worker_register where email='$_SESSION[email]'";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="css/allprojects.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <style>
       
     body{
    /* background-image: url('https://img.freepik.com/free-vector/conversation-concept-illustration_114360-1102.jpg?w=1060&t=st=1682967470~exp=1682968070~hmac=fc1fadac2209ce01b08cd36ea3bf706cf1c852216c7ecf742cd89aa11a79a611'); */
    background-size: cover;
    background-position: 150px -160px;
    
}


#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td {
  border: 1px double #3886d07e;
  padding: 5px;
  width: 350px;
  background-color: whitesmoke;
}

#customers tr:nth-child(){background-color: #04AA6D;}

#customers tr:hover {background-color: #ddd;}

#customers th {
     border: 1px double #ddd;
     width: 100px;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: rgb(255, 255, 255);
}
#tbody1{
  border: 1px double;
  width: 100px;
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: black;
  color: rgb(27,18,18);
}
.glitch{
  color: #030303;
  font-size: 100px;
  margin-left: 350px;
  
  text-shadow:
      0 0 7px #fff,
      0 0 10px #fff,
      0 0 21px #fff,
      0 0 42px #0fa,
      0 0 82px #0fa,
      0 0 92px #0fa,
      0 0 102px #0fa,
      0 0 151px #0fa;
}

    </style>
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid"> 
			<div class="navbar-header">
				<a class="navbar-brand" href="admin_dashboard.php">Krishi Seva Management System </a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      
		      <li class="nav-item">
		        <a class="nav-link" href="../logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>

<div class="glitch" data-text="GLITCH">Jobs Portal</div> 
    <div class="table table-bordered table-striped table-hover">
        <table id="customers">
            <thead>
                <th>ID</th>
                <th>Farmer</th>
                <th>PhoneNumber</th>
                <th>Address</th>
                <th>Work Profile</th>
                <th>Salary</th>
                <th>Work From</th>
                <th>Work Upto</th>
                <th>Request</th>
            </thead>
            <tbody id="tbody1" class="tableorder">
            <?php
            include '../db_connect.php';
						// $connection = mysqli_connect("localhost","root","");
						// $db = mysqli_select_db($connection,"agri");
						$query = "select * from worker_request ";
						$query_run = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($query_run)){
							?>
							<tr>
                <td><?php echo $row['farmer_id'];?></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['contact'];?></td>
								<td><?php echo $row['address'];?></td>
								<td><?php echo $row['work'];?></td>
								<td><?php echo $row['salary'];?></td>
								<td><?php echo $row['date_from'];?></td>
								<td><?php echo $row['date_to'];?></td>
               <td>
                <form method="get" action="request.php">
    <input type="hidden" name="varname" value="<?php echo $row['farmer_id'];?>">
    <button>Request</button>
</form>
            </td>
                <!-- <td><button class="btn"> <a href="request.php?varname=<?php echo $var_value ?>">Request</a></button></td> -->
                
							</tr>
							<?php
						}
			?>
            </tbody>
        </table>
    </div>

   
</body>

</html>