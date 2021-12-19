<?php 
    include 'db.php';
    
    $name = $desc = $price = $quantity = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["productname"];
        $desc = $_POST["decription"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];


        $file_name = $_FILES["image"]["name"];
        $file_type = $_FILES["image"]["type"];
        $file_size = $_FILES["image"]["size"];
        $file_tmp_name = $_FILES["image"]["tmp_name"];
        $file_error = $_FILES["image"]["error"];
        $dir = 'assets/';
        $stem = substr($file_name,0,strpos($file_name,'.'));
        $extension = substr($file_name,strpos($file_name,'.'),strlen($file_name)-1);
        $upload = $dir . $stem.$extension;

        move_uploaded_file($_FILES['image']['tmp_name'],$upload);

        $sql = "INSERT INTO productdetails(product_name,descriptions,price,quantity,images)
                values('$name','$desc',$price,$quantity,'$file_name')";
        if (mysqli_query($conn,$sql)) {
            echo "<script> alert('Record Added')</script>";
        }
    }

    header('Location:index.php');
?>