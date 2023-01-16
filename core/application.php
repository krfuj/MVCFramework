<?php

namespace app\core;
/**
 * "Hp\\MvcFramework\\": "src/"
 * Class Application
 * @author Presley Sakwa 
 * Email presleyingolo@gmail.com
 * @package ${NAMESPACE}
 * */

 class Application
 {    
      public Router $router;
      public function __construct()
      {
            $this->router = new Router();
      }

      public function run()
      {
            echo $this->router->resolve();
      }
 }
?>