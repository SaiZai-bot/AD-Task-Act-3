
<?php
// Database bridge functions lesser logic for index.php
require_once BASE_PATH . '/bootstrap.php';
require_once HANDLERS_PATH . '/viewmeeting.handler.php';

function getAllMeetings() {
    $handler = new MeetingHandler();
    return $handler->getAllMeetings();
}
