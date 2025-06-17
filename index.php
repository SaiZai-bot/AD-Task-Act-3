<?php
$route = $_GET['route'] ?? '';

if ($route === 'mongo') {
    require_once __DIR__ . '/handlers/mongodbChecker.handler.php';
} elseif ($route === 'postgres') {
    require_once __DIR__ . '/handlers/postgreChecker.handler.php';
} else {
    echo "🏠 Welcome to Paluto App!<br><br>";
    echo "<a href='?route=mongo'>🔍 Check MongoDB Connection</a><br>";
    echo "<a href='?route=postgres'>🔍 Check PostgreSQL Connection</a>";
}
?>
