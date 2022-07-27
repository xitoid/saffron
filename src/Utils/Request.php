<?php
namespace Xitoid\Saffron\Utils;

class Request
{
  protected static $url;
  protected static $query;
  protected static $method;
  final public static function URL() {
    return isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "/";
  }
  final public static function Query() {
    $queryString = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : "";
    parse_str($queryString, $query);
    return $query;
  }
  final public static function Method() {
    return isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : "";
  }
}