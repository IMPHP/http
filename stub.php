<?php

if (!defined('\im\IMPHP_BASE')) {
    throw new Exception("Could not find imphp/base");

} else if (version_compare(\im\IMPHP_BASE, ($v = '1.1.0'), '<')) {
    throw new Exception("The package imphp/base-". \im\IMPHP_BASE ." is to old. At least $v is requried");
}

require "static.php";

$loader = \im\ImClassLoader::load();
$loader->addBasePath(__DIR__);
