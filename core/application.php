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
      public static string $ROOT_DIR;
      public Router $router;
      public Request $request;
      public Response $response;
      public static Application $app;
      public function __construct($rootPath)
      {
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->router = new Router();
            $this->response = new Response();
            $this->request = new Request($this->router );
      }

      public function run()
      {
            echo $this->router->resolve();
      }
 }
?>