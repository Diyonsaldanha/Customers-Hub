<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php 
     $pack_rate=$_GET['pack_rate'];
     $pack_name=$_GET['pack_name'];
  ?>
<div class="container-fluid">
    
    <div class="row" style="margin-top: 40px; margin-bottom: 30px;">
        <div class="col-md-2.25 order-md-4 mb-4" style="margin-left: 17px;">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill" style="background-color:#1F4172;">1</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div style="padding-right:30px">
                        <h6 class="my-0"><?php echo "$pack_name"  ?></h6>
                    </div>
                    <span class="text-muted">Rs. <?php echo "$pack_rate"  ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (Rs.)</span>
                    <strong><?php echo "$pack_rate"  ?></strong>
                </li>
            </ul>
            </div>
                        
                        <div class="col-md-3 order-md-3">
                        </div>
                        <div class="col-md-1 order-md-1">
                        </div>

        <div class="col-md-5.75 order-md-2" style="margin-left: 17px;">
            <h4 class="mb-3" style="color:#cc33ff">Billing Details</h4>
            <form class="needs-validation" novalidate="" action="channel.php" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">&nbsp;&nbsp;First name</label>
                        <input type="text" class="form-control" name="name"  placeholder="John"  required="" >
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">&nbsp;&nbsp;&nbsp;Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Smith"  required="" >
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                <div class=" mb-3">
                        <label for="lastName">&nbsp;&nbsp;&nbsp;Customer ID</label>
                        <input type="text" class="form-control" name="Custid"  placeholder="Customer id"  required="" >
                        <div class="invalid-feedback"> Valid customer Id is required. </div>
                    </div>
                    <div class=" mb-3">
                        <label for="lastName">&nbsp;&nbsp;&nbsp;Choose your pack</label>
                        <?php
                    require('connect.php');

                    $sql="select * FROM package_detail";
                    $result = mysqli_query($con, $sql);

                    echo "<div class='form-group'>
                    <select class='form-control' name='P_no' >";

                    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
                      $pack_name= $row['pack_name'];
                      $pack_no=$row['pack_no'];
                      echo "
                        <option value='$pack_no'>$pack_name</option>";
                    }
                    echo "
                      </select>
                    </div>";
                ?>
                        
                    </div>
                
                
                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                	<br>
                    <div class="custom-control custom-radio">
                        <input id="credit"  type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Credit card &nbsp; <img src="images/credit-card.png" style="height: 20px; width:20px;"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-radio">
                        <input id="debit"  type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card  &nbsp; <img src="images/debit.png" style="height: 15px; width:25px;"></label>
                    </div>
                    <br>
                    <div class="custom-control custom-radio">
                        <input id="paypal" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal  &nbsp; &nbsp; &nbsp; &nbsp; <img src="images/favicon.ico" style="height: 20px; width:20px;"></label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback"> Name on card is required </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                        <small class="text-muted"> For Example : 9876-5432-0000-1982</small>
                        <div class="invalid-feedback"> Credit card number is required </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                        <small class="text-muted">For ex. 02/24</small>
                        <div class="invalid-feedback"> Expiration date required </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <small class="text-muted">For ex. 987</small>
                        <div class="invalid-feedback"> Security code required </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn btn-lg btn-block" type="submit" name="Paybill" style="background-color: #1F4172; color:white;">Continue to checkout</button>
            </form>
        </div>
    </div>
</div>

<?php



?>


<script>

    
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    	})
  		}, false)
		}())
    </script>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>