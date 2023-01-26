<?php

/* The Home class extends the Controller class and has a method called index. */
class Home extends Controller 
{
      function index($a="", $b="", $c="")
      {
            $model = new Model; // Create a new instance of the model.
            
            $result = $model->delete(2, 'unix');
            show($result);

            $this->view('home'); // Load the home view.
             
      }
}


 