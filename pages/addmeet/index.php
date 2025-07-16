<?php
require_once BASE_PATH . '/vendor/autoload.php';
require_once COMPONENT_PATH . '/templates/header.component.php';
require_once COMPONENT_PATH . '/templates/nav.component.php';
require_once COMPONENT_PATH . '/templates/footer.component.php';
require_once UTILS_PATH . '/db.util.php';
require_once UTILS_PATH . '/auth.util.php';

head();
nav();
?>

<link rel = "stylesheet" href="/pages/addmeet/assets/style.css">

<link rel="stylesheet" href="/pages/addmeet/assets/style.css">

<main class="container">
    <div class="form-box">
        <form method="POST" action="/handlers/addmeeting.handler.php">
            <label>Title: <input type="text" name="name" required></label><br><br>
            <label>Description: <textarea name="description"></textarea></label><br><br>
            <label>Date: <input type="date" name="created_at" required></label><br><br>
            <button type="submit">Save Meeting</button>
        </form>

        <div style="margin-top: 1rem;">
            <a href="/pages/viewMeet/index.php">← View Meetings</a>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <p class="success"><?= htmlspecialchars($_GET['success']) ?></p>
        <?php endif; ?>
    </div>
</main>

<?php footer(); ?>
