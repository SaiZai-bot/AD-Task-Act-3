<?php 
declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

try {
    $dsn = "pgsql:host={$_ENV['POSTGRES_HOST']};port={$_ENV['POSTGRES_PORT']};dbname={$_ENV['POSTGRES_DB']}";
    $pdo = new PDO($dsn, $_ENV['POSTGRES_USER'], $_ENV['POSTGRES_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $modelFiles = [
        'user.model.sql',
        'meeting.model.sql',
        'meeting_users.model.sql',
        'task.model.sql',
    ];

    foreach ($modelFiles as $modelFile) {
        $modelPath = BASE_PATH . '/database/' . $modelFile;

        if (!file_exists($modelPath)) {
            echo "❌ Could not Read $modelFile\n";
            continue;
        }

        echo "📦 Applying schema from database/$modelFile…\n\n";
        $sql = file_get_contents($modelPath);

        if (trim($sql) === '') {
            echo "⚠️ Skipped empty SQL file: $modelFile\n\n";
            continue;
        }

        echo "💥 DEBUG: Content of $modelFile:\n\n$sql\n\n";
        $pdo->exec($sql);
        echo "✅ Schema applied successfully from $modelFile\n\n";
    }

    // Seed Users
    try {
        echo "Seeding useeeers...\n";
        $users = require STATICDATA_PATH . '/dummies/users.staticData.php';

        $stmt = $pdo->prepare("
            INSERT INTO users (id, username, role, first_name, last_name, password)
            VALUES (:id, :username, :role, :fn, :ln, :pw)
        ");

        foreach ($users as $user) {
            $stmt->execute([
                ':id' => $user['id'],
                ':username' => $user['username'],
                ':role' => $user['role'],
                ':fn' => $user['first_name'],
                ':ln' => $user['last_name'],
                ':pw' => password_hash($user['password'], PASSWORD_DEFAULT),
            ]);
        }

        echo "✅ Users seeded successfully\n\n";
    } catch (PDOException $ex) {
        echo "❌ Error seeding USERS: " . $ex->getMessage() . "\n";
    }

    // Seed Meetings
    try {
        echo "Seeding meetinnngs...\n";
        $meetings = require STATICDATA_PATH . '/dummies/meeting.staticData.php';

        $stmt = $pdo->prepare("
            INSERT INTO meeting (id, name, description, created_at)
            VALUES (:id, :name, :desc, :created)
        ");

        foreach ($meetings as $meeting) {
            $stmt->execute([
                ':id' => $meeting['id'],
                ':name' => $meeting['name'],
                ':desc' => $meeting['description'],
                ':created' => $meeting['created_at'],
            ]);
        }

        echo "✅ Meetings seeded successfully\n\n";
    } catch (PDOException $ex) {
        echo "❌ Error seeding MEETINGS: " . $ex->getMessage() . "\n";
    }

    // Seed Meeting_Users
    try {
        echo "Seeding meeting_userssss...\n";
        $meetingUsers = require STATICDATA_PATH . '/dummies/meeting_users.staticData.php';

        $stmt = $pdo->prepare("
            INSERT INTO meeting_users (meeting_id, user_id)
            VALUES (:mid, :uid)
        ");

        foreach ($meetingUsers as $mu) {
            $stmt->execute([
                ':mid' => $mu['meeting_id'],
                ':uid' => $mu['user_id'],
            ]);
        }

        echo "✅ Meeting users seeded successfully\n\n";
    } catch (PDOException $ex) {
        echo "❌ Error seeding MEETING_USERS: " . $ex->getMessage() . "\n";
    }

    // Seed Tasks
    try {
        echo "Seeding tassssks...\n";
        $tasks = require STATICDATA_PATH . '/dummies/task.staticData.php';

        $stmt = $pdo->prepare("
            INSERT INTO tasks (id, meeting_id, title, description, status, assigned_to)
            VALUES (:id, :meeting_id, :title, :description, :status, :assigned_to)
        ");

        foreach ($tasks as $task) {
            $stmt->execute([
                ':id' => $task['id'],
                ':meeting_id' => $task['meeting_id'],
                ':title' => $task['title'],
                ':description' => $task['description'],
                ':status' => $task['status'],
                ':assigned_to' => $task['assigned_to'],
            ]);
        }

        echo "✅ Tasks seeded successfully\n\n";
    } catch (PDOException $ex) {
        echo "❌ Error seeding TASKS: " . $ex->getMessage() . "\n";
    }

} catch (PDOException $ex) {
    echo "❌ Fatal DB Error: " . $ex->getMessage() . "\n";
    exit(255);
}
