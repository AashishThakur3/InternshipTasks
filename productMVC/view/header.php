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
