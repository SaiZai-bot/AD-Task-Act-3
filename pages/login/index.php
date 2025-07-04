<?php
declare(strict_types=1);

require_once BASE_PATH . '/vendor/autoload.php';
require_once COMPONENT_PATH . '/templates/header.component.php';
require_once COMPONENT_PATH . '/templates/nav.component.php';
require_once COMPONENT_PATH . '/templates/footer.component.php';

head(); 
?>

<main class="login-container">
    <section class="login-box">
        <h2>Login to Your Account</h2>

        <?php if (isset($_GET['logout']) && $_GET['logout'] === 'success'): ?>
            <div class="success-message">✅ You have been logged out successfully.</div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="error-message"><?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <form action="/handlers/auth.handler.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </section>
</main>

<?php
footer(); 
?>
