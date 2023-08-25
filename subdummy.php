<?php
session_start();


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
        <title>Welcome</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid navv">
    <a style='color: white;' class="navbar-brand" href="index.php">HELLO <br>  <?php echo $_SESSION['name']; ?></a>
  
    <div class="navv" id="navbarSupportedContent" style='display: flex;
   justify-content: space-between; '>
     
          <a  class="nav-link active" style='padding-left:20px; color: white;' aria-current="page" href="admin.php">Admin Panel </a>
      

       
      <form class="d-flex" role="search" style='padding-right:20px; padding-left:20px;'>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="home.php">LOGOUT</a>
    </div>
  </div>
</nav>
            
  <br><br>

          <div class="con" style='    background-color: rgb(47, 28, 119); width: 1366px; height: 580px; color: aliceblue; text-align: center; padding-top:30px; margin-top:100px margin-left:300px'>
          <form action="/action_page.php">
  <p style=' font-size: xx-large;'> Subscription can Add in <a class="nav-link " style='color: chocolate;' href="admin.php">Admin Panel 👈</a> </p>
 
 <label style=' font-size: xx-large; padding-top:40px;' for="html">399 Package</label><br>
 
 <label style=' font-size: xx-large; padding-top:40px;' for="css">999 Package</label><br>
 
 <label style=' font-size: xx-large; padding-top:40px;' for="javascript">2000 Package</label>
</form>
          </div>



       
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