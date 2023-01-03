<?php 
include 'navbar.php'; 
?> 
<?php 

$host = "localhost";


//dbname
$dbname = "auth-sys";

//user
$user = "root";

//pass
// $pass = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname;", $user);

if(isset($_SESSION['username'])) {
  header("location: admin-space.php");
}

if(isset($_POST['submit'])) {
    if($_POST['email'] == '' OR $_POST['password'] == '') {
      echo "some inputs are empty";

    } 
    else {

      $email = $_POST['email'];
      $password = $_POST['password'];

      $login = $conn->query("SELECT * FROM users WHERE email = '$email'");

      $login->execute();

      $data = $login->fetch(PDO::FETCH_ASSOC);


      if($login->rowCount() > 0) {
        
          if(password_verify($password, $data['mypassword'])) {
            

            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];

            header("location: admin-space.php");
          } else {
            echo "email or password is wrong";
          } 


      } else {
        echo "This email does not exist";
      }


    }
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4 w-25 text-bg-dark p-3 rounded-3">
        <form action="admin-form.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="mt-2"><button name="submit" type="submit" class="btn btn-light">Login</button></div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>