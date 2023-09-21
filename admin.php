<!doctype html>
<html lang="en">
  <head>
    <title>Customer Hub-customer side</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="CSS/Main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body  >
  <header style="overflow: hidden;background-color: coral;position: fixed;top: 0;width: 100%;z-index:1;">
          <div class="container p-2" style="text-align:center">
            <H1>CUSTOMER HUB</H1>
          </div>
        </header>
    
         <section style="width:300px;height:100%;background-color:#cc33ff;padding-top:100px;position: fixed">
          <div class="side-bar" >
            <ul>
                  <li style="border:none"><a href="addchannel.php">Add/Modify Channels</a></li>
                <li style="border:none"><a href="#">View Channel Selection</a></li>
                <li style="border:none"><a href="viewcomplaint.php">View Complaint Register</a></li>
                <li style="border:none"><a href="ViewConnection.php">View New Internet Connection</a></li>
                <li style="border:none"><a href="A_payment.php">Payment Reports</a></li>
            </ul>
           </div>
         </section>

     <div id="main" style="margin-left:300px;padding-top:100px">
    <section>
       <div class="container pl-4" style="color:#cc33ff">
       <h4>Available pack info</h4>
       </div>
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
               echo "
               <div class='container p-2' >
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
                <a href='channelList.php?pack_no=$pack_no' style='float:right;padding-bottom:50px;padding-right:20px;'>
                View Channel under this pack<i class='fa fa-arrow-right' aria-hidden='true'></i>
                </a>
               </div>
               ";
             }
             mysqli_close($con);
       ?>
     </section>
    

     <div class="container pt-5">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addpack" style="background-color: green;margin-right: 20px;">Add pack</button>
        <button type="submit" class="btn btn-primary"  data-toggle="modal" data-target="#pack_delete" style="background-color: green;margin-right: 20px;">Delete Existing pack</button>
        <button type="submit" class="btn btn-primary" id="#" style="background-color: green;margin-right: 20px;">Modify pack</button>

     </div>
 

     <!--adding pack-->

     <div class="modal fade" id="addpack" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Pack</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
               </div>
           <div class="modal-body">
             <div class="container-fluid">
             <div class="container">
               <form action="Channel.php" method="post">
                  <div class="form-group">
                    <label >Enter Pack Name</label>
                    <input type="text" name="Pname"  class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label >Enter pack Price</label>
                    <input type="text" name="Prate"  class="form-control"  required>
                    <small id="helpId" class="text-muted">/m</small>
                  </div>
                  <div style="display: inline-block;text-align: left;">
                    <button type="submit"class="btn btn-primary" name="Add" style="margin-right: 20px;">Add</button>
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                  </div>
                </form>
               </div>
             </div>
           </div>
          </div>
       </div>
     </div>

     

     <!--deleting pack pack-->
    
     <div class="modal fade" id="pack_delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content" style="border-radius: 0;background-clip: unset">
             <div class="modal-header" style="border-bottom: 0">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
               </div>
           <div class="modal-body">
             <div class="container-fluid">
             <div class="container">
            <form action="channel.php" method="get">
            <input type="text" class="form-control" placeholder="Enter pack number" name="PNo" require>
            <br>
            <button type="submit" class="btn btn-primary">Enter</button>
            </form>
           </div>
             </div>
           </div>
           </div>
       </div>
     </div>

     
  
  </div>

     <!--deleting pack pack-->
    
     <div class="modal fade" id="pack_delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content" style="border-radius: 0;background-clip: unset">
             <div class="modal-header" style="border-bottom: 0">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
               </div>
           <div class="modal-body">
             <div class="container-fluid">
             <div class="container">
            <form action="channel.php" method="get">
            <input type="text" class="form-control" placeholder="Enter pack number" name="PNo" require>
            <br>
            <button type="submit" class="btn btn-primary">Enter</button>
            </form>
           </div>
             </div>
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