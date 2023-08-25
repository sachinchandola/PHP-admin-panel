<?php
session_start();

$host="localhost";
$user="root";
$password="";
$database="admin";

$con= mysqli_connect($host, $user, $password, $database);

if(!$con){
    echo "connect error occur: ".mysqli_connect_error();
}

if(isset($_GET['del'])){
    $del=$_GET['del'];
$sql3= "UPDATE user SET subs='No Subscription'  WHERE sn='$del'  ";
$result3= mysqli_query($con, $sql3);
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['id'])){
        $id=$_POST['id'];
  $sql2= "DELETE FROM user WHERE sn=$id";
  $result2= mysqli_query($con, $sql2);
    }
else{
 $sno =$_SESSION['sno'];   
$name= $_POST['name'];
 $email= $_POST["email"];
$number= $_POST["number"];
$address=$_POST['address'];
$pincode=$_POST['pincode'];
$country=$_POST['country'];
$city=$_POST['city'];
$state=$_POST['state'];

$sql1= "INSERT INTO user (name, email, phone, address, pin, country, city, state, subs, snou) VALUE ('$name', '$email', '$number', '$address', '$pincode', '$country', '$city', '$state', 'No Subscription', '$sno')";

$result1= mysqli_query($con, $sql1);

if(!$result1)
{
 echo " sql error occur: ".mysqli_error();
}
}
}


$sql2= "SELECT * FROM user";

$result2=mysqli_query($con, $sql2);

if(!$result2)
{
 echo " sql error occur: ".mysqli_error();
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
    <a style='color: white;' class="navbar-brand" href="index.php">HELLO <br>  <?php echo $_SESSION['name']; ?></a>
  
    <div class="navv" id="navbarSupportedContent" style='display: flex;
   justify-content: space-between; '>
     
          <a  class="nav-link active" style='padding-left:20px; color: white;' aria-current="page" href="admin.php">Admin Panel </a>
      
          <a  class="nav-link" style='padding-left:20px; color: white;' href="subdummy.php"> Subscription List</a>
       
      <form class="d-flex" role="search" style='padding-right:20px; padding-left:20px;'>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="home.php">LOGOUT</a>
    </div>
  </div>
</nav>



        

            

        <div id="layoutSidenav" class="table" >    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header ppp">
                                <div>
                                <i class="fas fa-table me-1"></i>
                                User list
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
                            </div>
                            <div class="card-body">
                           
                                <table id="datatablesSimple" >
                                
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Pin Code</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Subscription</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Pin Code</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Subscription</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>


                                        <?php
                                          
                                        while($temp=mysqli_fetch_assoc($result2))
                                        {   
                                            if($temp['snou']==$_SESSION['sno']){
                                            echo  " <tr>
                                            <td>".$temp['name']."</td>
                                            <td>".$temp['email']."</td>
                                            <td>".$temp['phone']."</td>
                                            <td>".$temp['address']."</td>
                                            <td>".$temp['pin']."</td>
                                            <td>".$temp['country']."</td>
                                            <td>".$temp['city']."</td>
                                            <td>".$temp['state']."</td>
                                            <td>".$temp['subs']." <hr><a href='subscription.php?sno=".$temp['sn']."' type='button' class='btn btn-success change'>Change</a>
                                            <form  action='admin.php' method='get'>
                                            <input type='hidden' name='del' value='".$temp['sn']."'>
                                            <button type='submit'  class='btn btn-danger ' >Remove</button>
                                            </form>
                                            </td>
                                            <td><a href='edit.php?sno=".$temp['sn']."' class='btn btn-info btn-sm'>Edit</a>
                                            <form  action='admin.php' method='post'>
                                            <input type='hidden' name='id' value='".$temp['sn']."'>
                                            <button type='submit'  class='btn btn-danger sachin' >Delete</button>
                                            </form>
                                            </td>
                                        </tr>";
                                            }
                                        }
                                        ?>
                                    
                                
                                </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>
        </div>



       








        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method='post' action='/phpadmin/admin.php'>
                                            
                                                <div class="col">
                                                    <div class="form-floating mb-3 ">
                                                        <input class="form-control" name='name' id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name='email' id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name='number' id="inputPassword" type="number" placeholder="Create a password" />
                                                        <label for="inputPassword">Phone Number</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name='address' id="inputPassword" type="text" placeholder="Create a password" />
                                                        <label for="inputPassword">Address</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name='pincode' id="inputPassword" type="number" placeholder="Create a password" />
                                                        <label for="inputPassword">Pin Code</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name='country' id="inputPassword" type="text" placeholder="Create a password" />
                                                        <label for="inputPassword">Country</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name='city' id="inputPassword" type="text" placeholder="Create a password" />
                                                        <label for="inputPassword">City</label>
                                                    </div>
                                                </div>
                                               <br>
                                                <div class="col">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name='state' id="inputPassword" type="text" placeholder="Create a password" />
                                                        <label for="inputPassword">State</label>
                                                    </div>
                                                </div>
                                               
                                                    <br>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type='submit' value='Add to Table'></div>
                                            </div>
                                        </form>
      </div>
      
    </div>
  </div>
</div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></scrip>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
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