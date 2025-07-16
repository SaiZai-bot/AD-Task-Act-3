<?php
require_once BASE_PATH . '/bootstrap.php';
require_once UTILS_PATH . '/auth.util.php';
require_once UTILS_PATH . '/db.util.php';
require_once UTILS_PATH . '/dbrepository.util.php';

session_start();

if (!AuthUtil::check()) {
    header("Location: /index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = connectToPostgres();
    $repo = new MeetingRepository($pdo);

    $repo->saveMeeting(
        $_POST['name'],
        $_POST['description'],
        $_POST['created_at']
    );

    header("Location: /pages/addmeet/index.php?success=Meeting+Saved");
    exit;
}
