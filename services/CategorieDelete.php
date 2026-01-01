<?php
declare(strict_types=1);

class CourseService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /** Récupère toutes les courses */
    public function getAllCourses(): array
    {
        $stmt = $this->pdo->query("
            SELECT course_key, label
            FROM courses
            ORDER BY label ASC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Supprime une course */
    public function deleteCourse(string $courseKey): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM courses
            WHERE course_key = :course_key
        ");

        return $stmt->execute([
            ':course_key' => $courseKey
        ]);
    }
}
