<?php
function connectToPostgres(): PDO {
    $config = require __DIR__ . '/../bootstrap.php';
    $pg = $config['postgres'];
    $dsn = "pgsql:host={$pg['host']};port={$pg['port']};dbname={$pg['db']}";
    return new PDO($dsn, $pg['user'], $pg['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
