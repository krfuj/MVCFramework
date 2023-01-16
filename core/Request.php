<?php

namespace app\core;
/**
 * "Hp\\MvcFramework\\": "src/"
 * Class Application
 * @author Presley Sakwa 
 * Email presleyingolo@gmail.com
 * @package ${NAMESPACE}
 * */

 class Request
 {    
      /* Getting the path of the request. */
      public function getPath()
      {
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $position = strpos($path, '?');
            if($position === false)
            {
                  return $path;
            }
            return substr($path, 0, $position);
      }

      /* Getting the request method. */
      public function getMethod()
      {
            return strtolower($_SERVER['REQUEST_METHOD']);
      }
 }
?>