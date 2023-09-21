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

require('connect.php');
                        
//Check
  if(!$con)
  {
    die("Connection Failed : ".mysqli_connect_error());
  }
  $pack_no=$_GET['pack_no'];

  $query = "SELECT * FROM package_detail where pack_no=$pack_no"; //You don't need a ; like you do in SQL
  $result = mysqli_query($con, $query);
  
 
  
  while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
    $pack_no= $row['pack_no'];
    $pack_name= $row['pack_name'];
    $pack_rate= $row['pack_rate'];
    echo "
    <div class='container pt-5' style='max-width:600px' >
    <table class='table table-bordered table-hover'>
    <tr>
    
      <th><strong>Pack No.</strong></th>
      <th><strong>Pack Name</strong></th>
      <th><strong>Pack Price</strong></th>
    </tr>
      <tr>
          <td>$pack_no</td>
          <td>$pack_name</td>
          <td>$pack_rate</td>
      </tr>  
     </table>
    </div>
    ";
  }


  $sql = "SELECT chan_name,chan_category,chan_rate,chan_id FROM channels where pack_no=$pack_no"; //You don't need a ; like you do in SQL
  $result1 = mysqli_query($con, $sql);
  
  echo "<div class='container p-2' style='max-width:600px' >
  <table class='table table-bordered table-hover'>
  <tr>
    <th><strong>channel ID</strong></th>
    <th><strong>channel Name</strong></th>
    <th><strong>Channel catogory</strong></th>
    
  </tr>";
 
  
  while($row = mysqli_fetch_assoc($result1)){   //Creates a loop to loop through results
    $C_name= $row['chan_name'];
    $C_cat= $row['chan_category'];
   
    $C_id= $row['chan_id'];
    echo "
    
      <tr>
          <td>$C_id</td>
          <td>$C_name</td>
          <td>$C_cat</td>
          
      </tr>  
    ";
  }
  echo " </table>
  </div>";


  mysqli_close($con);
  ?>

           <div class="container" style="max-width:500px">
                <h3 class="text-center" >Summary</h3>
                <div class="d-flex flex-column m-4" >
                        <div class="d-flex justify-content-between" style="margin-top: 30px;">
                                <p>Subtotal </p>
                                <?php echo "$pack_rate" ?>
                        </div>
                        <div class="d-flex justify-content-between border-bottom border-top" style="margin-top: 30px;">
                            <b>Total</b>
                            <b>&nbsp;Rs.&nbsp;<?php echo "$pack_rate"  ?></b>
                        </div>
                        <a href="billing.php?pack_rate=<?php echo "$pack_rate" ?>&&pack_name=<?php echo "$pack_name" ?>"><button type="button" class="btn m-4" style="width: 80%; padding:4px 4px 4px 4px; border-radius: 8px;background-color:green">Proceed to Billing</button></a>
                </div>
            </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>