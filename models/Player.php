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

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static function create(string $login = '', string $password = '', string $name = ''): Player | bool
    {
        $conn = Connection::getConnection();
        $sql = "INSERT INTO players (login, password, name) VALUES (:login, :password, :name)";
        $stmt = $conn->prepare($sql);
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        //echo ($pw_hash);
        //echo (password_hash($password, PASSWORD_DEFAULT));
        try {
            $stmt->execute([
                ":login" => htmlentities($login),
                ":password" => $pw_hash,
                ":name" => htmlentities($name)
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return new Player((int)$conn->lastInsertId(), $login, $pw_hash, $name, []);
    }

    public static function connect(string $login = '', string $password = ''): Player | bool
    {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM players WHERE login=:login";
        $stmt = $conn->prepare($sql);
        try {
            $stmt->execute([
                ":login" => $login
            ]);
            $res = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        if (!$res)
            return false;

        if (password_verify($password, $res["password"]))
            return new Player($res['id'], $res['login'], '', $res['name'], []);
        return false;
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

    public static function getHighScores(int $nb_pairs): string
    {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM scores JOIN players ON scores.player_id = players.id WHERE number_of_pairs=:nb_pairs ORDER BY score, completion_time ASC LIMIT 10";
        $stmt = $conn->prepare($sql);
        try {
            $stmt->execute([":nb_pairs" => $nb_pairs]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return "";
        }
        $res = $stmt->fetchAll();

        if (count($res) === 0)
            return "<p>Aucun score enregistré dans cette categorie</p>";

        $table = "<table class=\"score-table\"><thead><tr><th>Joueur</th><th>Actions</th><th>Temps</th></tr></thead><tbody>";
        foreach ($res as $score) {
            //var_dump($score);
            $table .= "<tr>";
            $table .= "<td>" . $score['name'] . "</td>";
            $table .= "<td>" . $score['score'] . "</td>";
            $table .= "<td>" . $score['completion_time'] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</tbody></table>";
        //$table = htmlentities($table);
        return $table;
    }
}
