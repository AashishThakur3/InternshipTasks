<?php 
    class homeController{
        function __construct(){

        }

        function home(){
            // include('view/header.php');
            include('view/page.php');
        }
        function about(){
            echo "About";
        }
    }
?>