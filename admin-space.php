<?php 

  session_start();


?>
<?php include 'config.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css
      " rel="stylesheet">
    <title>Admin space</title>
</head>
<body >
<!-- <h1><a href="/logout.php">Logout</a></h1> -->
<!-- <h1><a href="index.php">Return home</a></h1> -->

<?php if(!isset($_SESSION["username"])) : ?>
  <h2>
    This page is restricted to bitches like you
  </h2>
<?php else : ?>
<div style="margin:50px;">
  <h1 >List of orders</h1>
  <p><a href="logout.php">Logout for home</a></p>
</div>
<table class="table" style="margin:50px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Email</th>
      <th scope="col">Service</th>
      <th scope="col">Booked at</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $host = "localhost";


        //dbname
        $dbname = "online-booking";
    
        //user
        $user = "root";
    
        //pass
        $pass = "";
    
        // $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user);
    // $server="localhost";
    // $user="root";
    // $password="";
    // $database="online-booking";

    $connection = new mysqli($host,$user,$pass,$dbname);
    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
    $sql = "SELECT * FROM userreqs ORDER BY ID DESC";
    $result = $connection->query($sql);

    if(!$result){
        die("Inavild query: " . $connection->error);
    }

    while($row = $result->fetch_assoc()){
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["uname"] . "</td>
        <td>" . $row["unumber"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["uservice"] . "</td>
        <td>" . $row["created_at"] . "</td>
        </tr>";
    }

    
    ?>
    

  </tbody>
</table>
<?php endif;?>

</body>
</html>