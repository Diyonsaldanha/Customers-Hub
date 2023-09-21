
<!doctype html>
<html lang="en">
  <head>
    <title>Channel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container p-4" style="color:#cc33ff">
          <h3>Customer Bill Details</h3>
      </div>
    
  <?php

require('connect.php');
                        
//Check
  if(!$con)
  {
    die("Connection Failed : ".mysqli_connect_error());
  }



  $sql = "SELECT Custid,bill_id,bill_date,total_amt  FROM bill"; //You don't need a ; like you do in SQL
  $result1 = mysqli_query($con, $sql);

  
  
  echo "<div class='container p-2' >
  <table class='table table-bordered table-hover'>
  <tr>
    <th><strong>Customer id</strong></th>
    <th><strong>BILL id</strong></th>
    <th><strong>Bill date</strong></th>
    <th><strong>Total Amount Paid</strong></th>
  </tr>";
 
  
  while($row = mysqli_fetch_assoc($result1)){ 
        //Creates a loop to loop through results
    $Custid= $row['Custid'];
    $Bill_id= $row['bill_id'];
    $bi_date= $row['bill_date'];
    $total_amt= $row['total_amt'];


    $sql2 = "select name from users where Custid=$Custid";
    $result2 = mysqli_query($con, $sql2);

    while($row = mysqli_fetch_assoc($result2)){
      $name= $row['name'];
    echo "
    
      <tr>
         <td>$name</td>
          <td>$Bill_id</td>
          <td>$bi_date</td>
          <td>$total_amt</td>
      </tr>  
    ";
    }
  }
  echo " </table>
  </div>";


  mysqli_close($con);
  ?>

  <div style="text-align:center">
<a href="javascript:history.go(-1)" class="btn btn-primary">Close </a>
  </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>