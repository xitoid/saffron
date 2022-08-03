<?php
namespace Xitoid\Saffron\Blueprint;

class Service
{
  protected $response;
  protected $manager;
  public function run($args = []) {}
  final public function getResponse() {
    return $this->response;
  }
  final public function injectManager($manager) {
    if (!isset($this->manager)) {
      $this->manager = $manager;
    }
  }
  final protected function setResponse($response = "") {
    if ($response == "") return;
    $this->response = $response;
  }
}