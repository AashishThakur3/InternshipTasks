<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">

  <title>JS CRUD</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php
    include 'db.php';

    $selectSQL = 'SELECT * FROM productdetails';
    $result = mysqli_query($conn,$selectSQL);
   
?>

  <div class="container">

    <div class="starter-template">

      <div class="info-table-header-block">
        <button type="button" class="btn btn-primary add-new-button" data-toggle="modal" data-target="#addnewModal">
          Add Student</i>
        </button>
      </div>


      <!-- Add module start -->
      <div class="modal fade" id="addnewModal" tabindex="-1" role="dialog" aria-labelledby="addnewModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="addnewModalTitle"><strong>ADD Product</strong></h4>
            </div>

            <div class="modal-body">
              <form name="myform" id="input_form" onsubmit="" method="post" action="insert.php">
                <div class="form-group">
                  <label for="productname">Product Name
                    <span class="required-field">*</span>
                  </label>
                  <input type="text" class="form-control" placeholder="Enter Product Name" id="productname" name="productname" />
                </div>
                <div class="form-group">
                  <label for="description">Description
                    <span class="required-field">*</span>
                  </label>
                  <input type="text" class="form-control" placeholder="Enter description" id="description" name="description" />
                </div>
                <div class="form-group">
                  <label for="price">price
                    <span class="required-field">*</span>
                  </label>
                  <input type="number" class="form-control" placeholder="Enter price" id="price" name="price" />
                </div>
                <div class="form-group">
                  <label for="quantity">quantity
                    <span class="required-field">*</span>
                  </label>
                  <input type="number" class="form-control" placeholder="Enter quantity" id="quantity" name="quantity" />
                </div>
                <div class="form-group"> 
                    <input type ="file" name="image" id="image" />
                </div>

                <div class="modal-footer-extended">
                  <button class="btn btn-success">Add</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!-- Add Module end -->

      <table id="student_table" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>SNo</th>
            <th>
              ProductName
            </h>
            <th>
              Description
            </th>
            <th>
              Price
            </th>
            <th>
              Quantity
            </th>
            <th>
              images
            </th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($row = mysqli_fetch_array($result)){
            echo
            "<tr>
              <td>{$row['Sno']}</td>
              <td>{$row['product_name']}</td>
              <td>{$row['descriptions']}</td>
              <td>{$row['price']}</td>
              <td>{$row['quantity']}</td>
              <td><img src='assets/{$row['images']}' height =100 width = 100></td>

              <td><button class='btn btn-sm btn-primary editButton')'>Edit</button>&nbsp;<button class='btn btn-sm btn-danger deleteButton')'>Delete</button></td>
            </tr>\n";
          }
        ?>
        </tbody>
      </table>

      <div class="show-table-info hide">
        <div class="alert alert-info center">
          <strong>No Data Found, Please Enter Some Data</strong>
        </div>
      </div>
    </div>
  </div>


  <!-- User Edit Modal Start -->

  <div id="show_user_info">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="editModal"><strong>EDIT</strong></h4>
          </div>
          <div class="modal-body">
            <form action="update.php" onsubmit="" id="editForm" name="editForm" method="post">
              <input type="hidden" name='update_id' id='update_id'>
              <div class="form-group">
                <label for="edit_name">Product Name
                  <span class="required-field">*</span>
                </label>
                <input type="text" class="form-control" name="edit_name" placeholder="Enter Name" id="edit_name" />
              </div>
              <div class="form-group">
                <label for="edit_desc">Description
                  <span class="required-field">*</span>
                </label>
                <input type="text" class="form-control" name="edit_desc" placeholder="Enter description" id="edit_description" />
              </div>
              <div class="form-group">
                <label for="edit_price">price
                  <span class="required-field">*</span>
                </label>
                <input type="number" class="form-control" placeholder="Enter Price" id="edit_price" name="edit_price" />
              </div>
              <div class="form-group">
                <label for="edit_quantity">quantity
                  <span class="required-field">*</span>
                </label>
                <input type="number" class="form-control" placeholder="Enter quantity" id="edit_quantity" name="edit_quantity" />
              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" id="member_id">
              </div>

              <div class="modal-footer-extended">
                <button class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- User Edit Modal End -->

  <!-- Delete Confirmation Dialog Start -->
  <div id="show_user_info">
    <div class="modal fade" id="deleteDialog" tabindex="-1" role="dialog" aria-labelledby="deleteDialogTitle"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="deleteDialog">Warning!</h4>
          </div>
          <form action="delete.php" method="post">
            <div class="modal-body">
              <input type="hidden" name='delete_id' id='delete_id'>
              <h4>Delete this User Data? </h4>
              <input type="hidden" id="deleted-member-id" value="">
              <div class="modal-footer-extended">
                <button class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Delete Confirmation Dialog End -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <script src="bootstrap.min.js"></script>
  <script src="script.js"></script>


</body>

</html>