<?php 
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';


$typeConfig = require_once UTILS_PATH . '/envSetter.util.php';
$pgConfig = $typeConfig['postgres'];


$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL\n";

$tables = ['meeting_users', 'tasks', 'meeting', 'users'];
foreach ($tables as $table) {
    try {
        $pdo->exec("DROP TABLE IF EXISTS public.\"{$table}\" CASCADE;");
        echo "✅ Dropped table: {$table}\n";
    } catch (PDOException $e) {
        echo "❌ Failed to drop table {$table}: " . $e->getMessage() . "\n";
    }
}

$sqlFiles = [
    'database/user.model.sql',
    'database/meeting.model.sql',
    'database/meeting_users.model.sql',
    'database/task.model.sql'
];

foreach ($sqlFiles as $file) {
    echo "📦 Applying schema from {$file}…\n";
    $sql = file_get_contents($file);

    echo "\n💥 DEBUG: Content of {$file}:\n\n$sql\n\n";

    if ($sql === false) {
        throw new RuntimeException("❌ Could not read {$file}");
    }

    $pdo->exec($sql);
    echo "✅ Success from {$file}\n";
}
