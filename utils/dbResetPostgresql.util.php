<?php declare(strict_types=1);

require 'vendor/autoload.php';
define('UTILS_PATH', __DIR__);

// Load the environment config
$typeConfig = require_once UTILS_PATH . '/envSetter.util.php';
$pgConfig = $typeConfig['postgres'];

// Connect to PostgreSQL
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL\n";


$sqlFiles = [
    'database/user.model.sql',
    'database/meeting.model.sql',
    'database/meeting_users.model.sql',
    'database/task.model.sql'
];

foreach ($sqlFiles as $file) {
    echo "📦 Applying schema from {$file}…\n";
    $sql = file_get_contents($file);

    if ($sql === false) {
        throw new RuntimeException("❌ Could not read {$file}");
    }

    $pdo->exec($sql);
    echo "✅ Success from {$file}\n";
}

echo "🚮 Truncating tables…\n";
foreach (['meeting_users', 'meeting', 'tasks', 'users'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}
