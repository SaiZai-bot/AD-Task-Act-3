<?php
use Dotenv\Dotenv;

if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require_once BASE_PATH . '/vendor/autoload.php';

// Load .env from the base path
$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();

return [
    'mongo' => [
        'uri' => $_ENV['MONGO_URI'] ?? '',
        'db'  => $_ENV['MONGO_INITDB_DATABASE'] ?? '',
    ],
    'postgres' => [
        'host'     => $_ENV['POSTGRES_HOST'] ?? 'localhost',
        'port'     => $_ENV['POSTGRES_PORT'] ?? '5432',
        'db'       => $_ENV['POSTGRES_DB'] ?? '',
        'user'     => $_ENV['POSTGRES_USER'] ?? '',
        'password' => $_ENV['POSTGRES_PASSWORD'] ?? '',
    ],
];
