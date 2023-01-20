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
      public Request $request;
      public Response $response;
      protected array $routes = [];

      public function __construct(Request $request, Response $response)
      {
            $this->request = new Request();
            $this->response = new Response();
      }

      public function get($path, $callback)
      {
            $this->routes['get'][$path] = $callback;
      }

      public function resolve()
      {
            $path = $this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->routes[$method][$path] ?? false;
            if ($callback === false) {
                  Application::$app->response->setStatusCode(404);
                  return "Not Found";

                  exit;
            }
            if (is_string($callback)) {
                  return $this->renderView($callback);
            }
            return call_user_func($callback);
      }

      public function renderView($view)
      {
            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view);
            return str_replace('{{content}}', $viewContent, $layoutContent);
            include_once Application::$ROOT_DIR . "/views/$view.php";
      }

      protected function layoutContent()
      {
            ob_start();
            include_once Application::$ROOT_DIR . "/../views/layouts/main.php";
            return ob_get_clean();
      }

      protected function renderOnlyView($view)
      {
            ob_start();
            include_once Application::$ROOT_DIR . "/views/$view.php";
            return ob_get_clean();
      }
}
