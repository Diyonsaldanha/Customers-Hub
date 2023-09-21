<!doctype html>
<html lang="en">
  <head>
    <title>Profile edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
require('connect.php');

$email=$_GET['email'];

$s2="select Custid,name,address,phone from users where email='$email'";
          $reslut1=$con->query($s2);
          if($reslut1->num_rows>0){
            while($row=$reslut1->fetch_assoc()){
               $id=$row["Custid"];
               $n=$row["name"];
               $a=$row["address"];
               $p=$row["phone"];
             }
           }
?>
  
  <div class="container p-5" style="max-width:40%;margin:auto">
    <h5>Edit Your Profile</h5>
    <div>
       <form method="post" action="editProfile.php">
       <div class="form-group" >
          <small>Name</small>
          <br>
          <div style="display:flex">
            <input type="text" class="form-control" style="border:none;border-bottom:1px solid black" name="name"  placeholder="<?php echo $n ?>" >
            
          </div>
        </div>
        
       <div class="form-group" >
          <small>Address</small>
          <br>
          <div style="display:flex">
            <input type="text" class="form-control" style="border:none;border-bottom:1px solid black" name="address"  placeholder="<?php echo $a ?>" >
            
          </div>
        </div>
        
       <div class="form-group" >
          <small>Phone</small>
          <br>
          <div style="display:flex">
            <input type="text" class="form-control" style="border:none;border-bottom:1px solid black" name="phone"  placeholder="<?php echo $p ?>" >
            
          </div>
        </div>
        <div class="p-3">
        <a href="javascript:history.go(-1)" class='btn btn-secondary'>GO BACK</a>
        <button type='submit' class='btn btn-primary' name="update">Save</button>
      </div>
        </form>
</div>
  </div>

  <?php


if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

  $edit = "update users set name='$name', address='$address',phone='$phone' where email='$email'";
  $result = mysqli_query($con,$edit);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
     header("location:Cust.php?email=$email");
    } 
  else {
      echo"
      <div class=' p-4' style='padding:50px;background-color: rgba(151, 150, 150, 0.404);'>
      <h6 class='text-center' style='color:red;'><strong> SORRY...:) ENTER THE CORRECT INFORMATION</strong></h6>
      </div>
      ";
    }
}
  ?>
 
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


