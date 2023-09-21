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
  <body  >
      <section>
          <div class="container " style="max-width: 700px;margin: auto;padding-top: 50px;">
            <div class="" style="background-color:rgba(255, 255, 255, 0.568)">
              <h4  style="padding: 10px;text-align: center;color: #0066ff;">New Connection</h4>
              <div class="p-4">
                <form action="complaint.php" method="post">
                  <div class="form-group">
                    <label >Enter your Customer ID</label>
                    <input type="text" name="Custid"  class="form-control" required placeholder="Customer ID">
                    </div>
                  <div class="form-group">
                    <label >Name</label>
                    <input type="text" name="name"  class="form-control"  required placeholder="Name"> 
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
                  <div class="form-group">
                    <textarea class="form-control" name="Comp_desc" id="" cols="30" rows="5">Write your Complaint here...</textarea>
                  </div>
                  <div style="display: inline-block;text-align: left;">
                    <button type="submit"class="btn btn-primary" name="submit" style="background-color: green;margin-right: 20px;">Send</button>
                    <a class="btn btn-primary" href="javascript:history.go(-1)">Decline</a>
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
    $Custid = $_POST['Custid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $Comp_desc= $_POST['Comp_desc'];

      $sql= "INSERT INTO db_CustomerHub.complaint VALUES('".$Custid."','".$name."','".$address."','".$phone."','".$Comp_desc."')";
          
        if(mysqli_query($con, $sql)){
          header("location:Cust.php?Custid=$Custid");
        }
        else{
          echo "<h3 class='text-info specialHead text-center'><strong> SORRY! WE'VE SOME ISSUE..</strong></h3>";
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