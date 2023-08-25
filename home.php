<?php
session_start();
session_destroy();
$alert = 'false';
$host="localhost";
$user="root";
$password="";
$database="admin";

$con= mysqli_connect($host, $user, $password, $database);

if(!$con){
    echo "connect error occur: ".mysqli_connect_error();
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){

$name= $_POST['name'];
 $email= $_POST["email"];
$psw= $_POST["psw"];

$sql1= "INSERT INTO register (name, email, password) VALUE ('$name', '$email', '$psw')";

$result1= mysqli_query($con, $sql1);

if(!$result1)
{
 echo " sql error occur: ".mysqli_error();
}
else{
    $alert='true';
}
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid navv">
    <a style='color: white;' class="navbar-brand" href="home.php">HELLO</a>
  
    <div class="navv" id="navbarSupportedContent" style='display: flex;
   justify-content: space-between; '>
     
          <a class="nav-link active" style='padding-left:20px; color: white;' aria-current="page" href="home.php">Register</a>
      
          <a class="nav-link" style='padding-left:20px; color: white;' href="login.html">Login</a>
       
      <form class="d-flex" role="search" style='padding-right:20px; padding-left:20px;'>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


        <?php
        if($alert=='true'){
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Registration successful!</strong> NOW LOGIN
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
        }
?>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method='post' action='/phpadmin/home.php'>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating mb-3 ">
                                                        <input class="form-control" name='name' id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name='email' id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name='psw' id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type='submit' value='Create Account'></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>