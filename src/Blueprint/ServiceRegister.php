<?php
namespace Xitoid\Saffron\Blueprint;

class ServiceRegister
{
  protected array $services = [];
  final public function __construct() {
    $this->register();
  }
  public function register() {}
  final public function getServices() {
    return $this->services;
  }
  final protected function set($name, $function) {
    $this->services[$name] = $function;
  }
}