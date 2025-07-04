<?php
require_once BASE_PATH . '/vendor/autoload.php';
require_once COMPONENT_PATH . '/templates/header.component.php';
require_once COMPONENT_PATH . '/templates/nav.component.php';
require_once COMPONENT_PATH . '/templates/footer.component.php';
require_once UTILS_PATH . '/db.util.php';


$pdo = connectToPostgres();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO meeting (name, description, created_at) VALUES (?, ?, ?)");
    $stmt->execute([
        $_POST['name'],
        $_POST['description'],
        $_POST['created_at']
    ]);
    header("Location: /index.php"); 
    exit;
}

    head();
    nav();
?>

<main class="container">
    <div class="form-box">
        <form method="POST">
            <label>Title: <input type="text" name="name" required></label><br><br>
            <label>Description: <textarea name="description"></textarea></label><br><br>
            <label>Date: <input type="date" name="created_at" required></label><br><br>
            <button type="submit">Save Meeting</button>
        </form>

        <div style="margin-top: 1rem;">
            <a href="/pages/viewMeet/index.php">← View Meetings</a>
        </div>
    </div>
</main>

<?php
footer();
?>