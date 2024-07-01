
<?php
   $name = $_POST['name'];
   $category = $_POST['category'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $mobile = $_POST['mobile'];
   $address = $_POST['address'];

   //Data base connection...
   include 'db_connect.php';
   // $conn = new mysqli('172.16.15.7', 'dbms18', 'dbms@18', 'dbms18');
   // if($conn->connect_error){
   //  die('Connection Failed : ' .$conn->connect_error);
   // }else{
    $stmt = $connection->prepare("insert into farmer_register(name, category, email, password,mobile,address) values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$name ,$category , $email, $password,$mobile,$address);
    $stmt->execute();
   //  echo "Registration Successfully...";
    $stmt->close();
    $connection->close(); 
   // }

?>

<script type="text/javascript">
	alert("Submission successfull...!!");
	window.location.href = "index.php";
</script>


