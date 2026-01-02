<?php
// Active le typage strict
declare(strict_types=1);

// Connexion à la base de données
require_once __DIR__ . '/../../config/db.php';

class CategoryController
{

    /**
     * Récupère toutes les catégories
     * @param PDO $pdo
     * @return array
     */
    public static function getAll(PDO $pdo): array
    {
        return $pdo
            ->query("SELECT * FROM courses ORDER BY label")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une catégorie à partir de sa clé
     * @param PDO $pdo
     * @param string $key
     * @return array|null
     */
    public static function getOne(PDO $pdo, string $key): ?array
    {
        $stmt = $pdo->prepare("
            SELECT *
            FROM courses
            WHERE course_key = :key
        ");
        $stmt->execute(['key' => $key]);

        // Retourne la catégorie ou null si elle n'existe pas
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Ajoute une nouvelle catégorie
     * @param PDO $pdo
     * @param string $key
     * @param string $label
     * @return void
     */
    public static function create(PDO $pdo, string $key, string $label): void
    {
        $stmt = $pdo->prepare("
            INSERT INTO courses (course_key, label)
            VALUES (:key, :label)
        ");
        $stmt->execute([
            'key'   => $key,
            'label' => $label
        ]);
    }

    /**
     * Met à jour une catégorie existante
     * @param PDO $pdo
     * @param int $id
     * @param string $key
     * @param string $label
     * @return void
     */
    public static function update(PDO $pdo, int $id, string $key, string $label): void
    {
        // Mise à jour du libellé et de la clé
        $stmt = $pdo->prepare("
            UPDATE courses
            SET label = :label,
                course_key = :key
            WHERE id = :id
        ");
        $stmt->execute([
            'id'    => $id,
            'key'   => $key,
            'label' => $label
        ]);
    }

    /**
     * Supprime une catégorie à partir de sa clé
     * @param PDO $pdo
     * @param string $key
     * @return void
     */
    public static function delete(PDO $pdo, string $key): void
    {
        $stmt = $pdo->prepare("
            DELETE FROM courses
            WHERE course_key = :key
        ");
        $stmt->execute(['key' => $key]);
    }
}
