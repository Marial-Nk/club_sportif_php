<?php

declare(strict_types=1);

require_once __DIR__ . '/../../config/db.php';

class ParticipantController
{
    public static function getAll(PDO $pdo): array
    {
        return $pdo
            ->query("SELECT  participants.id as id , last_name, first_name, gender, birth_date, 
                                   courses.label as category, club, nationality, uci_code, dossard
                    FROM participants inner join courses on courses.id = participants.course_id 
                    ORDER BY first_name, last_name")
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

    public static function create(PDO $pdo, array $participant)
    {
        $stmt = $pdo->prepare("
            INSERT INTO participants (
                last_name,
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
            'last_name'   => $participant['last_name'],
            'first_name'  => $participant['first_name'],
            'gender'      => $participant['gender'],
            'birth_date'  => $participant['birth_date'],
            'course_id'    => $participant['category'],
            'club'        => $participant['club'],
            'nationality' => $participant['nationality'],
            'uci_code'    => $participant['uci_code'],
            'dossard'     => $participant['dossard'],
        ]);
    }

    public static function update(PDO $pdo, int $id, array  $participant): void
    {
        $stmt = $pdo->prepare("
            UPDATE participants SET
                last_name   = :last_name,
                first_name  = :first_name,
                gender      = :gender,
                birth_date  = :birth_date,
                course_id    = :course_id,
                club        = :club,
                nationality = :nationality,
                uci_code    = :uci_code,
                dossard     = :dossard,
                is_paid     = :is_paid
            WHERE id = :id
        ");
        $stmt->execute([
            'id'           => $id,
            'last_name'   => $participant['last_name'],
            'first_name'  => $participant['first_name'],
            'gender'      => $participant['gender'],
            'birth_date'  => $participant['birth_date'],
            'course_id'    => $participant['category'],
            'club'        => $participant['club'],
            'nationality' => $participant['nationality'],
            'uci_code'    => $participant['uci_code'],
            'dossard'     => $participant['dossard'],
            'is_paid'     => $participant['is_paid'],
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

    public static function getAllLikeName(PDO $pdo, string $q){

        $stmt = $pdo->prepare("
            SELECT p.*, courses.label as course 
            FROM participants as p inner join courses on courses.id = p.course_id
            WHERE p.last_name LIKE :q
               OR p.first_name LIKE :q
            ORDER BY p.last_name ASC
            LIMIT 10
        ");

        $stmt->execute([
            ':q' => '%' . $q . '%'
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
