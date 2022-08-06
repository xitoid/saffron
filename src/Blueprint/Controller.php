<?php
namespace Xitoid\Saffron\Blueprint;

class Controller
{
  final public function __construct() {}
  public function boot() {}
  final public function setXowebProp($name, $value) {
    $this->{$name} = $value;
  }
}