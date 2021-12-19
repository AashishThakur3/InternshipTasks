<?php
    include 'db.php';
    

    $selectSQL = 'SELECT * FROM productdetails';
    $result = mysqli_query($conn,$selectSQL);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
            foreach($row as $data){
                echo $data;
            }
        }
    }
 
?>