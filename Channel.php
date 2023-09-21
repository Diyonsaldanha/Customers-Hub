<?php
require('connect.php');

//--add pack--//

if(isset($_POST['Add'])){
    $Pname = $_POST['Pname'];
    $Prate= $_POST['Prate'];
    $PNo="";

    $sql= "INSERT INTO db_CustomerHub.package_detail VALUES('".$PNo."','".$Pname."','".$Prate."');";
          
        if(mysqli_query($con, $sql)){
          echo "<h3 class='text-info specialHead text-center'><strong> PACK SUCCESSFULLY ADDED</strong></h3>";
          echo " <a href='admin.php' class='btn btn-primary'>Go back</a>";
         
        }
        else{
          echo "<h3 class='text-info specialHead text-center'><strong> SORRY! WE'VE SOME ISSUE..</strong></h3>";
          echo " <a href='admin.php' class='btn btn-primary'>Go back</a>";
         }
    }

    //--pack delete--//

    if(isset($_GET['PNo'])){
        $PNo=$_GET['PNo'];

        $query="Delete from package_detail where pack_no='$PNo'";
        if(mysqli_query($con, $query)){

            echo "<h3 class='text-info specialHead text-center'><strong> PACK SUCCESSFULLY DELETED</strong></h3>";
            echo " <a href='admin.php' class='btn btn-primary'>Go back</a>";
           
          }
          else{
            echo "<h3 class='text-info specialHead text-center'><strong> SORRY! WE'VE SOME ISSUE..</strong></h3>";
            echo " <a href='admin.php' class='btn btn-primary'>Go back</a>";
           }
    }

    //--add Channel--//

if(isset($_POST['C_add'])){

  $C_name = $_POST['C_name'];
  $C_cat= $_POST['C_cat'];
  $C_price= $_POST['C_price'];
  $P_no= $_POST['P_no'];
  $C_id="";

  $sql= "INSERT INTO db_CustomerHub.channels VALUES('".$C_name."','".$C_cat."','".$C_price."','".$C_id."','".$P_no."');";
        
      if(mysqli_query($con, $sql)){
        echo "<h3 class='text-info specialHead text-center'><strong> CHANNEL SUCCESSFULLY ADDED</strong></h3>";
        echo " <a href='admin.php' class='btn btn-primary'>Go back</a>";
       
      }
      else{
        echo "<h3 class='text-info specialHead text-center'><strong> SORRY! WE'VE SOME ISSUE..</strong></h3>";
        echo " <a href='admin.php' class='btn btn-primary'>Go back</a>";
       }
  }


  if(isset($_POST['Paybill'])){

    $name = $_POST['name'];
    $Custid= $_POST['Custid'];
    $b_id="";
    $b_date = date('Y-m-d h:i:s');
    $pack_no=$_POST['P_no'];

    $s1="select pack_rate from package_detail where pack_no=$pack_no";
    $result2 = mysqli_query($con, $s1);

    while($row = mysqli_fetch_assoc($result2)){
      $pack_rate= $row['pack_rate'];
    }

  
    $sql= "INSERT INTO db_CustomerHub.bill VALUES('".$Custid."','".$b_id."','".$name."','".$b_date."','".$pack_rate."')";
          
        if(mysqli_query($con, $sql)){

          $sql2= "INSERT INTO db_CustomerHub.package VALUES('".$pack_no."','".$Custid."')";
          mysqli_query($con, $sql2);

          header("location:Cust.php?Custid=$Custid");
         
        }
        else{
         echo "$con->error";
        }


    }

    


   
  
?>






