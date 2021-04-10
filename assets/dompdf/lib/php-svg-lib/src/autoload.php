<?php


spl_autoload_register(function($V4ulrrtmqxqc) {
  if (0 === strpos($V4ulrrtmqxqc, "Svg")) {
    $Vtkhurg4sowd = str_replace('\\', DIRECTORY_SEPARATOR, $V4ulrrtmqxqc);
    $Vtkhurg4sowd = realpath(__DIR__ . DIRECTORY_SEPARATOR . $Vtkhurg4sowd . '.php');
    if (file_exists($Vtkhurg4sowd)) {
      include_once $Vtkhurg4sowd;
    }
  }
});
