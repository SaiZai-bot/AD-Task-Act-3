<?php
function connectToPostgres(): PDO {
    $pg = [
        'host'     => $_ENV['POSTGRES_HOST'] ?? '',
        'port'     => $_ENV['POSTGRES_PORT'] ?? '',
        'db'       => $_ENV['POSTGRES_DB'] ?? '',
        'user'     => $_ENV['POSTGRES_USER'] ?? '',
        'password' => $_ENV['POSTGRES_PASSWORD'] ?? '',
    ];

    $dsn = "pgsql:host={$pg['host']};port={$pg['port']};dbname={$pg['db']}";
    return new PDO($dsn, $pg['user'], $pg['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
