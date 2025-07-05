<?php
require_once __DIR__ . '/../../bootstrap.php';

require_once COMPONENT_PATH . '/templates/header.component.php';
require_once COMPONENT_PATH . '/templates/nav.component.php';
require_once COMPONENT_PATH . '/templates/footer.component.php';
require_once UTILS_PATH . '/db.util.php';

$pdo = connectToPostgres();

$stmt = $pdo->query("SELECT * FROM meeting ORDER BY created_at DESC");
$meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);

head();
nav();
?>

<link rel = "stylesheet" href="/pages/viewMeet/assets/css/style.css">

</head>

<main class="container">
    <h1>Meetings</h1>
    <a href="/pages/addmeet/index.php"> + Add New Meeting</a>
    <ul class ="meeting-list">
        <?php foreach ($meetings as $meet): ?>
            <li class ="meeting_item">
                <p><strong>Meet Title: </strong> <?= htmlspecialchars($meet['name']) ?></p>
                <p><strong>Description: </strong> <?= htmlspecialchars($meet['description']) ?></p>
                <p><strong>Time:</strong> <?= htmlspecialchars($meet['created_at']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<?php footer(); ?>
