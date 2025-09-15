<?php

class BaseModel extends PdoModel
{
    protected $pdo;
    protected $table;

    public function __construct($table)
    {
        $this->pdo = $this->setDb();
        $this->table = $table;
    }

    // 🔹 Ajouter une entrée
    public function create(array $data)
    {
        // Exemple de $data reçu :
        // [
        //   "title" => "Mon titre",
        //   "content" => "Mon contenu",
        //   "image" => "image.png"
        // ]

        // 🔹 Récupère les clés du tableau associatif (les colonnes SQL)
        $columns = implode(", ", array_keys($data));
        // Résultat → "title, content, image"

        // 🔹 Crée autant de "?" que de valeurs à insérer
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        // array_fill(0, 3, "?") → ["?", "?", "?"]
        // implode → "? , ? , ?"

        // 🔹 On prépare la requête SQL dynamique
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        // Exemple final → INSERT INTO articles (title, content, image) VALUES (?, ?, ?)

        // 🔹 Prépare et exécute la requête avec les valeurs de $data
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
        // array_values($data) → ["Mon titre", "Mon contenu", "image.png"]
    }


    // 🔹 Mettre à jour une entrée
    public function update(array $data, $id)
    {


        $setPart = implode(", ", array_map(fn($col) => "$col = ?", array_keys($data)));

        $sql = "UPDATE {$this->table} SET $setPart WHERE id = ?";

        // 🔹 Prépare et exécute la requête
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([...array_values($data), $id]);
    }

    // 🔹 Supprimer une entrée
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    // 🔹 Récupérer tout
    public function getAll($orderBy = "id", $direction = "DESC")
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY $orderBy $direction";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Récupérer un seul enregistrement
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
