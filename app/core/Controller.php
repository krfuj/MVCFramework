<?php

/* It takes a view name and checks if it exists, if it does, it requires it, if it doesn't, it requires
the 404 view. */
class Controller
{
      public function view($name)
      {
            $filename = "../app/views/".$name.".view.php"; // Set the filename to the first element of the URL array
            if (file_exists($filename)) {
                  require $filename; // Require the view
            } else {
                  $filename = "../views/404.view.php"; // Set the controller to the 404 page
                  require $filename;
            }
      }
}
