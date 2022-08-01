<?php
namespace Xitoid\Saffron\Utils;

class Route
{
  protected static array $routes = [];
  /**
  * Merender Routes ke Bentuk Array yg dipahami sistem
  */
  public static function RenderRoutes($routes) {
    $newRoutes = [];
    foreach ($routes as $path => $values) {
      //if (!self::CheckStructure($values)) continue;
      $route = explode("/", trim($path, "/"));
      $vars = Pattern::GetVars('{', '}', $path);
      if ($vars == false) {
        $withVars = 'NoVal';
      } else {
        $withVars = 'WithVal';
        if(count($vars) != count($values['values'])) continue;
      }
      $newRoutes[count($route)][$withVars][$path] = $values;
    }
    return $newRoutes;
  }
  protected static function CheckStructure($values) {
    // On Going . . .
    if (!is_array($values)) return false;
    return true;
  }
}