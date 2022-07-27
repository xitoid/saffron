<?php
namespace Xitoid\Saffron\Assistance;
use Xitoid\Saffron\Blueprint\Service;
use Xitoid\Saffron\Blueprint\ServiceRegister;

class ServiceManager
{
  protected array $services = [];
  public function __construct() {}
  final public function getServices() {
    return $this->services;
  }
  final public function setServices(ServiceRegister $services) {
    if(is_service($services)) {
      $this->services = $services;
      return true;
    }
    return false;
  }
  final public function run($name, $arguments = array()) {
    if(!isset($this->services[$name])) {
      throw new \Exception("Service $name not exists");
    }
    $service = $this->services[$name];
    if(is_service($service)) {
      // please send warning, not recomended
      return $this->runGetReturn($service, $arguments);
    } else if(is_closure($service)) {
      return $service($arguments);
    } else if(is_string($service)) {
      if(class_exists($service)) {
        return $this->runGetReturn(new $service(), $arguments);
      }
    }
    // if input service wrong, send error here
    // we don't have error handler now, so
    // I just throw exception here
    throw new \Exception("Error, Service '$name' is broken!");
  }
  final protected function runGetReturn(Service $service, $arguments) {
    $service->injectManager($this);
    $service->run($arguments);
    return $service->getResponse();
  }
}