<?php

$conn = mysqli_connect("localhost:3306", "root","","bank_system" );
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Customer Details</title>
  </head>
  <body>
  
 
    <div class="container mx-auto ">
    <h1 class="text-center m-5 p-3" style="border: 2px solid black;" > 
    Customer Details</h1>
    
    <table class="table table-dark table-striped" id="myTable">
        <thead>
          <tr>
            <th scope="col">Serial No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Currency</th>
            <th scope="col">Cr/Dr</th>
            <th scope="col">Balance</th>
            <th scope="col">Status As of Date and Time</th>

          </tr>
        </thead>
        <tbody>
    <?php
     $id=$_GET['sno'];
    //  $sql = "SELECT * FROM `books` WHERE book_id=$id"; 
    $sql="SELECT * FROM `users` WHERE sno=$id";
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
      <td>".$row['Currency']. "</td>
      <td>".$row['Cr/Dr']. "</td>
      <td>".$row['balance']. "</td>
      <td>".$row['time']. "</td>
      </tr>";
    
    }
    ?>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <a href="#" onclick="goBack()">
   <svg xmlns="http://www.w3.org/2000/svg" width="70" height="40" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
  <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> 
    <script>
    // JavaScript function to go back when the arrow icon is clicked
    function goBack() {
      window.history.back();
    }
  </script>
  </body>
</html>
