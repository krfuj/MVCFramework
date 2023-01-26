<?php

class App
{
      private $controller = 'Home';
      private $method = 'index';
      /**
       * It takes the URL, splits it into an array, and returns the array.
       * 
       * @return The URL is being returned.
       */
      private function splitURL()
      {
            $URL = $_GET['url'] ?? 'home';
            $URL = explode("/", $URL);
            return $URL;
      }

      /**
       * It loads the controller file, and then calls the index function of the controller
       */
      public function loadController()
	{
		$URL = $this->splitURL(); // Split the URL into an array.

		/** select controller **/
		$filename = "../app/controllers/".ucfirst($URL[0]).".php";
		if(file_exists($filename)) 
		{
			require $filename;
			$this->controller = ucfirst($URL[0]); // Set the controller to the first element of the array.
			unset($URL[0]); // Unset the first element of the array.
		}else{

			$filename = "../app/controllers/_404.php"; // If the controller file does not exist, then load the 404 controller.
			require $filename;
			$this->controller = "_404"; // Set the controller to the first element of the array.
		}

		$controller = new $this->controller;

		/** select method **/
		if(!empty($URL[1])) // If the second element of the array is not empty.
		{
			if(method_exists($controller, $URL[1])) // If the method exists in the controller.
			{
				$this->method = $URL[1]; // Set the method to the second element of the array.
				unset($URL[1]); // Unset the second element of the array.
			}	
		}

		call_user_func_array([$controller, $this->method], $URL); // Call the method of the controller.

	}	

}
