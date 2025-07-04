<?php 
declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

try {
    $dsn = "pgsql:host={$_ENV['POSTGRES_HOST']};port={$_ENV['POSTGRES_PORT']};dbname={$_ENV['POSTGRES_DB']}";
    $pdo = new PDO($dsn, $_ENV['POSTGRES_USER'], $_ENV['POSTGRES_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Dropping old tables…\n";
    foreach ([
        'meeting_users',
        'tasks',
        'meeting',
        'users',
        'projects'
    ] as $table) {
        $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
        echo "🗑️ Dropped table: $table\n";
    }

    $modelFiles = [
        'user.model.sql',
        'meeting.model.sql',
        'meeting_users.model.sql',
        'task.model.sql',
    ];

    foreach ($modelFiles as $file) {
        $path = BASE_PATH . '/database/' . $file;
        echo "📦 Applying schema from database/{$file}…\n";

        $sql = file_get_contents($path);

        if ($sql === false) {
            throw new RuntimeException("❌ Could not read database/{$file}");
        }

        $pdo->exec($sql);
        echo "✅ Schema created from $file\n\n";
    }

    echo "🎉 Migration complete!\n";
} catch (Throwable $e) {
    echo "❌ Migration failed: " . $e->getMessage() . "\n";
    exit(255);
}