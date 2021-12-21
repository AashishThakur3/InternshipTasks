<?php 
 require('config.php');

 require('classes/Bootstrap.php');
 require('classes/Controller.php');
 require('classes/Model.php');

 require('controllers/home.php');

 require('models/home.php');

 $bootstrap = new Bootstrap($_GET);
 $controller = $bootstrap->createController();
 if($controller) {
     $controller->executeAction();
 }
?> 