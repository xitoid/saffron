<?php
namespace Xitoid\Saffron\Blueprint;

class Service
{
  protected $response;
  public function run() {}
  final public function getResponse() {
    return $this->response;
  }
  final protected function setResponse($response = "") {
    if($response == "") return;
    $this->response = $response;
  }
}