<?php 
include 'navbar.php'; 
?> 
<?php include 'config.php'; ?>
<?php

    if(isset($_POST['submit'])) {

        if($_POST['email'] == ''  OR $_POST['name'] == '' OR $_POST['service'] == '') {
          echo "some inputs are empty";
          
        } else {
  
          $name = $_POST['name'];
          $number = $_POST['number'];
          $email = $_POST['email'];
          $service = $_POST['service'];
  
          $insert = $conn->prepare("INSERT INTO userreqs (uname, unumber,email,uservice) 
           VALUES (:uname, :unumber, :email, :uservice)");
  
           $insert->execute([
            ':email' => $email,
            ':unumber' => $number,
            ':uname' => $name,
            ':uservice' => $service,
           ]);
           echo "<meta http-equiv='refresh' content='0'>";
        }
      }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book.com</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-4 w-25 text-bg-dark p-3 rounded-2">
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Contact Number</label>
                <input type="text" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter number">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Service</label>
                <input type="text" name="service" class="form-control" id="exampleInputPassword1" placeholder="Enter service">
            </div>
            <div class="mt-2">
              <button name="submit" type="submit" class="btn btn-light" onclick="myFunc()">Book</button>
              <!-- <p id="book-btn" ></p> -->
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
<script>
  function myFunc(id)
  {
    alert("Booking done");
    // document.getElementById("book-btn").innerHTML="Booking Done..Our team will contact you shortly!!"
  }
</script>