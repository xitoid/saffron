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
    if(is_service()) {
      $this->services = $services;
      return true;
    }
    return false;
  }
  final public function run($name) {
    if(!isset($this->services[$name])) die("Undefined Service $name.");
    $service = $this->services[$name];
    if(is_service($service)) {
      // send warning, not recomended
      return $this->runGetReturn($service);
    } else if(is_closure($service)) {
      return $service();
    } else if(is_string($service)) {
      if(class_exists($service)) {
        return $this->runGetReturn(new $service());
      }
    }
    // if input service wrong, send error here
    // we don't have error handler now, so
    // I just put echos here
    echo "<hr>Error, Service '$service' is broken!<hr>\n";
  }
  final protected function runGetReturn(Service $service) {
    $service->run();
    return $service->getResponse();
  }
}