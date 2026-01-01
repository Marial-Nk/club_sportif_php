<?php

class ParticipantController
{

}

declare(strict_types=1);

require_once __DIR__ . '/../../config/db.php';

class ParticipantController
{
    public static function getAll(PDO $pdo): array
    {
        return $pdo
            ->query("SELECT *   FROM participants ORDER BY first_name, last_name")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOne(PDO $pdo, string $id): ?array
    {
        $stmt = $pdo->prepare("
            SELECT *
            FROM participants
            WHERE id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(PDO $pdo, string $key, string $label): void
    {
        $stmt = $pdo->prepare("
            INSERT INTO participants (last_name,
                first_name,
                gender,
                birth_date,
                course_id,
                club,
                nationality,
                uci_code,
                dossard)
            VALUES (:last_name,
                :first_name,
                :gender,
                :birth_date,
                :course_id,
                :club,
                :nationality,
                :uci_code,
                :dossard)
        ");
        $stmt->execute([
            'last_name'   => $data['last_name'],
            'first_name'  => $data['first_name'],
            'gender'      => $data['gender'],
            'birth_date'  => $data['birth_date'],
            'course_id'    => $data['course_id'],
            'club'        => $data['club'],
            'nationality' => $data['nationality'],
            'uci_code'    => $data['uci_code'],
            'dossard'     => $data['dossard'],
        ]);
    }

    public static function update(PDO $pdo, int $id, array $data): void
    {
        $stmt = $pdo->prepare("
            UPDATE participants SET
                last_name   = :last_name,
                first_name  = :first_name,
                gender      = :gender,
                birth_date  = :birth_date,
                category    = :category,
                club        = :club,
                nationality = :nationality
            WHERE id = :id
        ");
        $stmt->execute([
            'id'          => $id,
            'last_name'   => $data['last_name'],
            'first_name'  => $data['first_name'],
            'gender'      => $data['gender'],
            'birth_date'  => $data['birth_date'],
            'category'    => $data['category'],
            'club'        => $data['club'],
            'nationality' => $data['nationality'],
        ]);
    }

    public static function delete(PDO $pdo, int $id): void
    {
        $stmt = $pdo->prepare("
            DELETE FROM participants
            WHERE id = :id
        ");
        $stmt->execute(['id' => $id]);
    }
}
