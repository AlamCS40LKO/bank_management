<?php
$servername = "localhost:3306";
$username="root";
$password="";
$database="bank_system";

$conn = mysqli_connect($servername, $username,$password,$database );

// if(!$conn){
//     die("Database not connect-->".mysqli_connect_error());
// }
// else{
//     echo("connected");
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Bank System</title>
  </head>
  <body>
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-center" aria-current="page" href="index.php">Home</a>
        </li>    
        <!-- <li class="nav-item">
          <a class="nav-link active text-center" aria-current="page" href="view.php">View Customer</a>
        </li>       -->
    </ul>
    </div>
  </div>
</nav>
<h1 class="text-center m-5 p-3"  style="border: 2px solid black; ">Bank System</h1>

<div class="container" mx-1>
<table class="table table-dark table-striped" id="myTable">
        <thead>
          <tr>
            <th scope="col">Serial No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status As of Date and Time</th>
            <th scope="col">A/C Info</th>

          </tr>
        </thead>
        <tbody>
          
  <?php
    $sql="SELECT * FROM `users`";
    $result=mysqli_query($conn,$sql);
    $sno=0;
        while ($row=mysqli_fetch_assoc($result)) { 
      $sno=$sno+1;
      $user_id=$row['sno'];
      // echo $user_id;
      echo "<tr>
      <th scope='row'>".$sno. " </th>
      <td>".$row['name']. "</td>
      <td>".$row['email']. "</td>
      <td>".$row['time']. "</td>
      <td> <button class='view btn btn-sm btn-light' id =".$row['sno'].">
      <a class='text-decoration-none' href=view.php?sno=".$user_id.">Customer Details </a> </button>
      </tr>"; 
    }
    ?>
        </tbody>
  </table>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->
 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js"integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"> </script>
  <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> 
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    });
    </script>   

  </body>
</html>