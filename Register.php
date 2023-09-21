<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body  style="background-image: url(images/5.jpg);background-repeat: no-repeat;background-size: 100% 200%;">
      <section>
          <div class="container " style="max-width: 500px;margin: auto;padding-top: 50px;">
            <div class="p-4" style="background-color:rgba(255, 255, 255, 0.568)">
              <h2  style="padding: 10px;text-align: center;color: #0066ff;">Register</h2>
              <div class="p-4">
                <form action="Register.php" method="post">
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" name="name"  class="form-control" required>
                    <small id="helpId" class="text-muted">E.g. John Smith</small>
                  </div>
                  <div class="form-group">
                    <label >Email Id</label>
                    <input type="email" name="email"  class="form-control"  required>
                    <small id="helpId" class="text-muted">E.g. JohnSmith@gmail.com</small>
                  </div>
                  <div class="form-group">
                    <label >Address</label>
                    <input type="text" name="address"  class="form-control"  required>
                    <small id="helpId" class="text-muted">E.g. 104th block, M.R street, New yourk </small>
                  </div>
                  <div class="form-group">
                    <label >Contact Number</label>
                    <input type="text" name="phone"  class="form-control" required>
                    <small id="helpId" class="text-muted">Enter 10 digit phone number</small>
                  </div>
                  <div style="display: inline-block;text-align: left;">
                    <button type="submit"class="btn btn-primary" name="submit" style="background-color: green;margin-right: 20px;">Sign In</button>
                    <a class="btn btn-primary" href="index.html">Back</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </section>

      <?php

        require("connect.php");

        //--Registration--//

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $Custid="";

    $s="select name from users where email='$email'";
    
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
      echo"
      <div class= p-4' style='padding:50px;background-color: rgba(151, 150, 150, 0.404);'>
      <h6 class='text-center' style='color:red;'><strong> Sorry...:) This Email Id is already taken</strong></h6>
      </div>
      ";
    }
    else{
      $sql= "INSERT INTO db_CustomerHub.users VALUES('".$Custid."','".$name."','".$email."','".$phone."','".$address."');";
          
        if(mysqli_query($con, $sql)){
          header("location:Cust.php?email=$email");
        }
        else{
          echo "<h3 class='text-info specialHead text-center'><strong> SORRY! WE'VE SOME ISSUE..</strong></h3>";
         }
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