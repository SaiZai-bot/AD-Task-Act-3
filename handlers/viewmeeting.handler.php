<?php
require_once UTILS_PATH . '/db.util.php';
require_once UTILS_PATH . '/dbrepository.util.php';


class MeetingHandler {
    private MeetingRepository $meetingrepo;

     public function __construct() {
        $pdo = connectToPostgres();
        $this->meetingrepo = new MeetingRepository($pdo);
    }

    public function getAllMeetings(): array {
        return $this->meetingrepo->getAllMeetings();
    }

}