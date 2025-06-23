<?php
define('BASE_PATH', realpath(__DIR__));
define('VENDOR_PATH', BASE_PATH . '/vendor');
define('HANDLERS_PATH', BASE_PATH . '/handlers');
define('COMPONENT_PATH', BASE_PATH . '/components');
define('UTILS_PATH', BASE_PATH . '/utils');

chdir(BASE_PATH);

require_once BASE_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

