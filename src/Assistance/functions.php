<?php

if(! function_exists('is_closure')) {
  function is_closure($closure) {
    return $closure instanceof \Closure;
  }
}
if(! function_exists('is_service')) {
  function is_service($service) {
    return $service instanceof \Xitoid\Saffron\BluePrint\Service;
  }
}