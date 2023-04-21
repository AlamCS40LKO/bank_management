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
      <title>payment</title>
  </head>
  <body>

  
  <!-- Modal -->


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
    </ul>
    </div>
  </div>
</nav>
<h1 class="text-center m-5 p-3"  style="border: 2px solid black;">Bank System</h1>
<h2 class="text-center m-5 p-3 bg-dark text-light" style="border: 2px solid black; border-radius: 20px;">We are starting our payment process</h2>


<!-- form start here -->
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
      $name=$_POST["name"];
      $amount=$_POST["amount"];


$sql = "SELECT balance FROM users WHERE name='$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $balance = $row['balance'];
} else {
    echo "No results found.";
    exit();
}
$updated_balance = $balance - $amount;
if($amount <= $balance){
  $sql = "UPDATE users SET balance = '$updated_balance' WHERE name='$name'";

  if(mysqli_query($conn, $sql)){
      echo '<div class="container">
      <div class="alert alert-success" role="alert">
              <strong>Success!</strong> Your payment has been processed successfully.
            </div>
            </div>';
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
} else {
  echo 
  '<div class="container">
  <div class="alert alert-danger" role="alert">
              <strong>Sorry,</strong> your payment amount is greater than your available balance. Please try again with a lower amount.
            </div>
            </div>';
            
}
}
echo '<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="viewModalLabel">Customer Transition Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
     echo '<div class="modal-body">
    <span id="nameview"><p>Name: Captain America</p></span>
    <span id="emailview"><p>E-mail: captain88@gmail.com</p></span>
    <span id="balanceview"><p>Transfer Balance: 100</p></span>
    <span id="balanceview"><p>Current Balance: 1300</p></span>
    <span id="timeview"> </span>
    </div>
  </div>
</div>
</div>';
?>

<div class="container my-5 p-5" style="border: 2px solid black; border-radius: 20px;">
<form action="payment.php" method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
  </div>
<div class="form-group">
    <label for="amount">Amount</label>
    <input type="number" class="form-control" name="amount"  id="balance" placeholder="Enter Amount">
</div>
  <button type="submit" name="update" class="btn btn-dark">Submit</button>
</form>
</div>


<div class="container" mx-1>
<table class="table table-dark table-striped" id="myTable">
        <thead>
          <tr>
            <th scope="col">Serial No.</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Balance</th>
            <th scope="col">Date/Time</th>
            <th scope="col">Status</th>
            
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
      <td>".$row['balance']. "</td>
      <td>".$row['time']. "</td>
      <td> <button class='view btn btn-sm btn-light'  id =".$user_id."> Check Transaction Detail </button> 
      </tr>"; 
    }
    ?>
    <!-- class='text-decoration-none' href=view.php?sno=".$user_id." -->
    <!-- UPDATE users SET balance = 3999 WHERE sno='1'; -->
        </tbody>
  </table>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
     views=document.getElementsByClassName('view');
      Array.from(views).forEach((element) => {
        element.addEventListener("click",(e) => {
        console.log("Clicked element ID:", e.target.id); 
        const tr = e.target.closest("tr");
    if (tr) {
   const name = tr.getElementsByTagName("td")[0].innerText;
    const email = tr.getElementsByTagName("td")[1].innerText;
    const balance = tr.getElementsByTagName("td")[2].innerText;
    const time = tr.getElementsByTagName("td")[3].innerText;
    console.log(name, email, balance, time);
    nameview.value=name;
    emailview.value=email;
    balanceview.value=balance;
    timeview.value=time;
          $('#viewModal').modal('toggle');
    }
                })
      })

   
  </script>
  </body>
</html>