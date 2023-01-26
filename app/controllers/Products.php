<?php

class Products extends Controller
{
      function index()
      {
            $this->view(['products']);
            // echo "This is the home page controller";
      }
}