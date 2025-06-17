<?php declare(strict_types=1);

require 'vendor/autoload.php';
require 'bootstrap.php';
define('UTILS_PATH', __DIR__);
require_once UTILS_PATH . '/envSetter.util.php';

$pgConfig = $typeConfig['postgres'];

// Connect to PostgreSQL
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL\n";

// Step 1: Apply all schema files
$sqlFiles = [
    'database/user.model.sql',
    'database/project.model.sql',
    'database/project_users.model.sql',
    'database/task.model.sql', // or 'tasks.model.sql' if you rename the file
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

// Step 2: Truncate all tables in correct order (dependencies last)
echo "🚮 Truncating tables…\n";
foreach (['project_users', 'tasks', 'projects', 'users'] as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}
