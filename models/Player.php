<?php

declare(strict_types=1);
require_once "connection.php";

class Player
{
    private int $id;
    private string $login;
    private string $password;
    private string $name;
    private array $scores;

    public function __construct(int | null $id = null, string $login = '', string $password = '', string $name = '', array $scores = [])
    {
        if ($id === null)
            $this->id = -1;
        else
            $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->scores = $scores;
    }

    public function create(string $login = '', string $password = '', string $name = ''): Player | bool
    {
        $conn = Connection::getConnection();
        $sql = "INSERT INTO players (login, password, name) VALUES (:login, :password, :name)";
        $stmt = $conn->prepare($sql);
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        echo ($pw_hash);
        echo (password_hash($password, PASSWORD_DEFAULT));
        try {
            $stmt->execute([
                ":login" => $login,
                ":password" => $pw_hash,
                ":name" => $name
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return new Player((int)$conn->lastInsertId(), $login, $pw_hash, $name, []);
    }

    public function submitScore(int $score, DateInterval $time, int $nb_pairs = 6): void
    {
        $conn = Connection::getConnection();
        $sql = "INSERT INTO scores (player_id, score, completion_time, number_of_pairs) VALUES (:player_id, :score, :game_time)";
        $stmt = $conn->prepare($sql);
        try {
            $stmt->execute([
                "player_id" => $this->id,
                "score" => $score,
                "game_time" => $time,
                "number_of_pairs" => $nb_pairs
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getHighScores(int $nb_cards): string
    {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM scores LIMIT 10 ORDER BY score DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();

        $table = "<table><thead><tr><th>Joueur</th><th>Actions</th><th>Temps</th><th>Nb Pairs</th></tr></thead><tbody>";
        foreach ($res as $score) {
            $table .= "<tr>" . $score['player'] . "</tr>";
            $table .= "<tr>" . $score['score'] . "</tr>";
            $table .= "<tr>" . $score['completion_time'] . "</tr>";
            $table .= "<tr>" . $score['number_of_pairs'] . "</tr>";
        }
        $table .= "</tbody></table>";
        return $table;
    }
}
