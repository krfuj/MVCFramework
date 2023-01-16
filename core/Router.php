<?php

namespace app\core;
/**
 * 
 * Class Router
 * @author Presley Sakwa 
 * Email presleyingolo@gmail.com
 * @package ${NAMESPACE}
 * */

 class Router
 {   
     protected array $routes = [];
      public function get($path, $callback)
      {
            $this->routes['get'][$path] = $callback;
      }

      public function resolve()
      {
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
            $callback = $this->routes[$method][$path] ?? false;
            if($callback === false)
            {
                  echo "Not Found";
                  exit;
            }
            echo call_user_func($callback);
      }
 }
?>