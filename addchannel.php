<!doctype html>
<html lang="en">
  <head>
    <title>Add Channel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<div class="container p-4" style="color:#cc33ff">
<h2>Add Channel</h2>
</div>

  <div class="" style="transition:none" id="Channel" tabindex="-1"  aria-hidden="true">
  
      <div class="modal-dialog"  style="max-width: 800px;transition:none;" role="document">
        <div class="modal-content" style="border-radius: 0;background-clip: unset">
          <div class="modal-body p-4">
            <div class="container">
            <form action="channel.php" method="post">
              <div class="form-group">
                <label >Channel Name</label>
                <input type="text" name="C_name"  class="form-control" required>
              </div>
              <div class="form-group">
                <label >Channel category</label>
                <input type="text" name="C_cat"  class="form-control"  required>
                
              </div>
              <div class="form-group">
                <label >Channel Price</label>
                <input type="text" name="C_price"  class="form-control"  required>
                
              </div>
              <div class="form-group">
                <?php
                    require('connect.php');

                    $sql="select * FROM package_detail";
                    $result = mysqli_query($con, $sql);

                    echo "<div class='form-group'>
                    <label>Select Pack</label>
                    <select class='form-control' name='P_no' >";

                    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
                      $pack_no= $row['pack_no'];
                      $pack_name= $row['pack_name'];
                      echo "
                        <option value='$pack_no'>$pack_name</option>";
                    }
                    echo "
                      </select>
                    </div>";
                ?>

              </div>
              <div style="display: inline-block;text-align: left;padding-top:20px" class="container">
                <button type="submit"class="btn btn-primary" name="C_add" style="background-color: green;margin-right: 20px;">Add</button>
                <a href="admin.php" class="btn btn-secondary" >Close</a>
              </div>
            </form>
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