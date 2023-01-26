<?php

session_start();

require "../app/core/init.php"; // Load the init file

$app = new App; // Create a new instance of the App class

$app->loadController(); // Load the controller


