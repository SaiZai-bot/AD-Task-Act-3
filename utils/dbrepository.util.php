<?php 

//connect meeting pages
class MeetingRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function saveMeeting(string $name, string $description, string $createdAt): void {
        $stmt = $this->pdo->prepare("INSERT INTO meeting (name, description, created_at) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, $createdAt]);
    }

    public function getAllMeetings(): array {
        $stmt = $this->pdo->query("SELECT * FROM meeting ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}