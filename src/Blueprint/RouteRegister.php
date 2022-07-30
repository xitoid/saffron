<?php
namespace Xitoid\Saffron\Blueprint;

class RouteRegister
{
  protected array $route = [];
  final public function __construct() {
    $this->route();
  }
  public function route() {}
  final public function getRoutes() {
    return $this->route;
  }
  final protected function set($path, $controller, $action = "index", array $model = [], $values = [], $redir = null) {
    $this->route[$path] = [
      'controller' => $controller,
      'action' => $action,
      'redir' => $redir,
      'models' => $model,
      'values' => $values
    ];
  }
}