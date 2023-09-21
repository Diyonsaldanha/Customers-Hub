<!doctype html>
<html lang="en">
  <head>
    <title>Customer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="CSS/Main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

<?php
require('connect.php');

$email=$_GET['email'];
$Custid=$_GET['Custid'];

$s2="select Custid,name,address,phone from users where email='$email' or Custid='$Custid'";
          $reslut1=$con->query($s2);
          if($reslut1->num_rows>0){
            while($row=$reslut1->fetch_assoc()){
               $id=$row["Custid"];
               $n=$row["name"];
               $a=$row["address"];
               $p=$row["phone"];
             }
           }
           else{
             echo "<div class='p-4 text-center'>
             YOU ARE NOT UTHORIZED USER
             </div>";
           }
?>

  <body>
        <header style="overflow: hidden;background-color: coral;position: fixed;top: 0;width: 100%;z-index:1;">
        <div class="container p-2" style="text-align:center">
            <H1>CUSTOMER HUB</H1>
          </div>
        </header>
    
         <section style="width:300px;height:100%;background-color:#cc33ff;padding-top:100px;position: fixed">
          <div class="side-bar" >
            <ul>
              <li style="border:none"><a style="color:white" data-toggle="modal" data-target="#modelId">Add Subscription</a></li>
              <li style="border:none"><a href="C_payment.php?id=<?php echo "$id"; ?>">Payment Details</a></li>
              <li style="border:none"><a href="NewConnection.php">New Internet Connection Registration</a></li>
               <li style="border:none"><a href='complaint.php'>Complaint Registration</a></li>
            </ul>
           </div>
         </section>
    
        <div style="margin-left:300px;padding-top:100px">
        <section >
          <div >
             <div class="container" style="text-align:center" >
               <h3>Your profile</h3>
               <img src="images/icons8-male-user-96.png" alt="Avatar">
                 <div>
                    <p><strong>Your Customer Id is : <?php echo "$id" ; ?></strong></p>
                    <p> <?php echo"$n" ?></p>
                    <p> <?php echo"$a" ?></p>
                    
                 </div>
             </div>
          </div>
         
        
<div class="container pt-4">
<h3>Your packs</h3>

<?php
require('connect.php');

$s="select pack_no from package where custid=$Custid";
$result=mysqli_query($con,$s);

while($row=mysqli_fetch_assoc($result)){
  $pac_no=$row['pack_no'];

  $query = "SELECT * FROM package_detail where pack_no=$pac_no"; //You don't need a ; like you do in SQL
                        $result = mysqli_query($con, $query);
                        
                       
                        
                        while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
                          $pack_no= $row['pack_no'];
                          $pack_name= $row['pack_name'];
                          $pack_rate= $row['pack_rate'];
                          echo " <table class='table table-bordered table-hover'>
                         
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
                           

                          ";
                        }
}

?>
</div>

          </section>
         

        </div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" style="max-width:800px;" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Package Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      
      <div class="modal-body">
        <div class="container-fluid">
       
          <?php
                      require('connect.php');
                        
                      //Check
                        if(!$con)
                        {
                          die("Connection Failed : ".mysqli_connect_error());
                        }
                        $query = "SELECT * FROM package_detail"; //You don't need a ; like you do in SQL
                        $result = mysqli_query($con, $query);
                        
                       
                        
                        while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
                          $pack_no= $row['pack_no'];
                          $pack_name= $row['pack_name'];
                          $pack_rate= $row['pack_rate'];
                          echo " <table class='table table-bordered table-hover'>
                         
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
                            <a href='Subscription.php?pack_no=$pack_no' style='float:right;padding-bottom:50px;padding-right:20px;'>
                            Add this pack to your subscription <i class='fa fa-arrow-right' aria-hidden='true'></i>
                            </a>

                          ";
                        }
                        mysqli_close($con);
           ?>
           
        </div>
      </div>
     
      <div class="p-4" style="text-align:center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>