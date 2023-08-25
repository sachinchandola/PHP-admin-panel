<?php
session_start();
$alert= 'false';
$host="localhost";
$user="root";
$password="";
$database="admin";

$con= mysqli_connect($host, $user, $password, $database);

if(!$con){
    echo "connect error occur: ".mysqli_connect_error();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $usersnn = $_POST['snn'];  
 $name= $_POST['name'];
  $email= $_POST["email"];
 $number= $_POST["number"];
 $address=$_POST['address'];
 $pincode=$_POST['pincode'];
 $country=$_POST['country'];
 $city=$_POST['city'];
 $state=$_POST['state'];

 $sql1= "UPDATE user SET name='$name', email='$email', phone='$number', address='$address', pin='$pincode', country='$country', city='$city', state='$state' WHERE sn='$usersnn'";

 $result1= mysqli_query($con, $sql1);

 if(!$result1)
{
 echo " sql error occur: ".mysqli_error();
 }
else{
    $alert= 'true';
}
}





if($_SESSION['name'])
{
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid navv">
    <a style='color: white;' class="navbar-brand" href="admin.php">HELLO <br>  <?php echo $_SESSION['name']; ?></a>
  
    <div class="navv" id="navbarSupportedContent" style='display: flex;
   justify-content: space-between; '>
     
          <a  class="nav-link active" style='padding-left:20px; color: white;' aria-current="page" href="admin.php">Admin Panel </a>
      
          <a  class="nav-link" style='padding-left:20px; color: white;' href=""> Tables</a>
       
      <form class="d-flex" role="search" style='padding-right:20px; padding-left:20px;'>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="home.php">LOGOUT</a>
    </div>
  </div>
</nav>

<?php
if(  $alert== 'true')
echo "
<div class='alert alert-danger' role='alert'>
  Edit successful!
</div>
";
?>


        <br>
        <br>
         <br><br>

        <h1 style='text-align:center;'>Edit-Registered User</h1>
      <br>  <a href='admin.php' style='margin-left:600px; height: 40px; width: 50px;' class='btn btn-danger btn-sm' id='bb'>back</a>  
 <br>
 <br>
 <br>
 
 
 <?php
 if(isset($_GET['sno'])){
    $userid = $_GET['sno'];
    $sql= "SELECT * FROM user WHERE sn='$userid'";

$result=mysqli_query($con, $sql);

if(mysqli_num_rows($result) >0){
$temp=mysqli_fetch_assoc($result);

echo "
<div class='formm'>
      <form method='post' action='/phpadmin/edit.php'>
                                              <input type='hidden' name='snn' value='".$temp['sn']."'>
                                                <div class='col'>
                                                    <div class='form-floating mb-3 '>
                                                        <input class='form-control' value='".$temp['name']."' name='name' id='inputFirstName' type='text' placeholder='Enter your first name' />
                                                        <label for='inputFirstName'>Name</label>
                                                    </div>
                                                </div>
                                            
                                            <div class='form-floating mb-3'>
                                                <input class='form-control' value='".$temp['email']."' name='email' id='inputEmail' type='email' placeholder='name@example.com' />
                                                <label for='inputEmail'>Email address</label>
                                            </div>
                                            
                                                <div class='col'>
                                                    <div class='form-floating mb-3 mb-md-0'>
                                                        <input class='form-control' value='".$temp['phone']."' name='number' id='inputPassword' type='number' placeholder='Create a password' />
                                                        <label for='inputPassword'>Phone Number</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class='col'>
                                                    <div class='form-floating mb-3 mb-md-0'>
                                                        <input class='form-control' value='".$temp['address']."' name='address' id='inputPassword' type='text' placeholder='Create a password' />
                                                        <label for='inputPassword'>Address</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class='col'>
                                                    <div class='form-floating mb-3 mb-md-0'>
                                                        <input class='form-control' value='".$temp['pin']."' name='pincode' id='inputPassword' type='number' placeholder='Create a password' />
                                                        <label for='inputPassword'>Pin Code</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class='col'>
                                                    <div class='form-floating mb-3 mb-md-0'>
                                                        <input class='form-control' value='".$temp['country']."' name='country' id='inputPassword' type='text' placeholder='Create a password' />
                                                        <label for='inputPassword'>Country</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class='col'>
                                                    <div class='form-floating mb-3 mb-md-0'>
                                                        <input class='form-control' value='".$temp['city']."' name='city' id='inputPassword' type='text' placeholder='Create a password' />
                                                        <label for='inputPassword'>City</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class='col'>
                                                    <div class='form-floating mb-3 mb-md-0'>
                                                        <input class='form-control' value='".$temp['state']."' name='state' id='inputPassword' type='text' placeholder='Create a password' />
                                                        <label for='inputPassword'>State</label>
                                                    </div>
                                                </div>
                                               
                                                    <br>
                                            <div class='mt-4 mb-0'>
                                                <div class='btn btn-danger btn-sm bb' style='margin-left:600px; height: 40px; width: 100px;' ><input type='submit' value='update' ></div>
                                            </div>
                                        </form>
                                        </div> 
";

}
else
{
 echo " NO Record Found: ".mysqli_error();
}


 }
 
 ?>


 

<br>
<br>
<br>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>

<?php
}
else{
    echo "<br><br><br><br><div class='msg'>WRONG PASSWORD OR EMAIL: GO TO <a href='home.php'>HOME(click here)</a></div>";
    exit;
}
?>