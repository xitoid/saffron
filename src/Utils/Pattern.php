<?php
namespace Xitoid\Saffron\Utils;

class Pattern
{
  protected static $string;
  public static function GetVars($prefixStart, $prefixEnd, $string) {
    self::$string = $string;
    $startPos = self::Search($prefixStart);
    $endPos = self::Search($prefixEnd);
    $vars = [];
    if (count($startPos) != count($endPos)) return false;
    for ($i = 0; $i < count($startPos); $i++) {
      if ($startPos[$i] > $endPos[$i]) return false;
      $offset = $startPos[$i] + 1;
      $length = $endPos[$i] - $offset;
      $vars[$i] = substr($string, $offset, $length);
    }
    return $vars;
  }
  public static function ToRE(String $string, Array $prefixes, $regex = "([a-zA-Z0-9\_\-\.]+)") {
    foreach ($prefixes as $var) {
      $pattern = str_replace("{".$var."}", $regex, $string);
    }
    $pattern = str_replace("/", "\/", $pattern);
    $pattern = "/".$pattern."/";
    return $pattern;
  }
  protected static function Search($prefix) {
    $pos = [];
    $n = 0;
    while (true) {
      if ($n == 0) {
        $offset = 0;
      } else {
        $offset = $pos[$n-1] + 1;
      }
      $temp = strpos(self::$string, $prefix, $offset);
      if ($temp > -1) {
        $pos[$n] = $temp;
      } else {
        break;
      }
      $n++;
      if ($n == 10) break;
    }
    return $pos;
  }
}