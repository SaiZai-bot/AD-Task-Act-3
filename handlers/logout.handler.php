<?php
declare(strict_types=1);

require_once '../utils/auth.util.php';

AuthUtil::logout();

header('Location: /pages/addmeet/index.php?logout=success');
exit;
