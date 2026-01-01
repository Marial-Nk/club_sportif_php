<?php
declare(strict_types=1);

require_once __DIR__ . '/../../config/db.php';

class CategoryController
{
    public static function getAll(PDO $pdo): array
    {
        return $pdo
            ->query("SELECT * FROM courses ORDER BY label")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOne(PDO $pdo, string $key): ?array
    {
        $stmt = $pdo->prepare("
            SELECT course_key, label
            FROM courses
            WHERE course_key = :key
        ");
        $stmt->execute(['key' => $key]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(PDO $pdo, string $key, string $label): void
    {
        $stmt = $pdo->prepare("
            INSERT INTO courses (course_key, label)
            VALUES (:key, :label)
        ");
        $stmt->execute([
            'key' => $key,
            'label' => $label
        ]);
    }

    public static function update(PDO $pdo, string $key, string $label): void
    {
        $stmt = $pdo->prepare("
            UPDATE courses SET label = :label
            WHERE course_key = :key
        ");
        $stmt->execute([
            'key' => $key,
            'label' => $label
        ]);
    }

    public static function delete(PDO $pdo, string $key): void
    {
        $stmt = $pdo->prepare("
            DELETE FROM courses
            WHERE course_key = :key
        ");
        $stmt->execute(['key' => $key]);
    }
}
