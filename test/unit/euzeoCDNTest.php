<?php

include(dirname(__FILE__).'/../bootstrap/unit.php');

$t = new lime_test(2);

$path = '/some/path/to/a/file.png';
$url = euzeoCDN::getUrl($path);
$sameResult = true;
for ($i = 0; $i < 10; $i++) {
  if ($url != euzeoCDN::getUrl($path)) {
    $sameResult = false;
  }
}

$t->is(true, $sameResult, '::getUrl() return always the same result for the same path');
$t->is('', euzeoCDN::getUrl(''), '::getUrl() return empty string if no path given');