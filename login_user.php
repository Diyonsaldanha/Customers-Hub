<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="CSS/Main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-image: url(images/5.jpg);background-repeat: no-repeat;background-size: 100% 200%;">

      <section>
        <div class="container" style="max-width: 500px;margin: auto;padding-top: 80px;">
          <div class="p-4" style="background-color: rgba(255, 255, 255, 0.568)">
            <h2  style="padding: 10px;text-align: center;color: #0066ff;"> Login</h2>

          <div class="">
            <form action="login_user.php" method="post">
              <div class="form-group">
                <label><strong>Username</strong></label>
                <input type="email" name="email" class="form-control"required>
                <small id="helpId" class="text-muted">Enter your Registered email id as username</small>
              </div>
              <div class="form-group">
                <br>
                <label><strong>Password</strong></label>
                <input type="password" name="password" class="form-control"required>
                <small id="helpId" class="text-muted">Enter your Customer id as password</small>
              </div>
              <br>
              <div style="display: inline-block;text-align: left;">
                <button type="submit"class="btn btn-primary" name="login_btn" style="background-color: green;margin-right: 20px;">Login</button>
                <a class="btn btn-primary" href="index.html">Back</a>
              </div>
             </form>
             <div style="padding-top: 20px;">
              <p>Doesn't have an account?  <strong><a href="register.php" style="color: red;">Register Here</a></strong></p>
             </div>
          </div>
                
          </div>
        </div>
      </section>

      <?php
          require('connect.php');
         //----Login----//


  if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $s = "select Custid from users where email='$email' and Custid='$pass'";
    $result = mysqli_query($con,$s);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
       header("location:Cust.php?Custid=$pass");
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

