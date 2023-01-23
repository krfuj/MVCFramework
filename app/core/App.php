<?php

class App
{
      private function splitURL()
      {
            $URL = $_GET['url'] ?? 'home';
            $URL = explode("/", $_GET['url']);
            return $URL;
      }

      private function loadController()
      {
            $URL = $this->splitURL();
            $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
            if (file_exists($filename)) {
                  require $filename;
            } else {
                  $filename = "../app/controllers/.404";
                  require $filename;
            }
      }
}

// loadController();
// show(splitURL());
