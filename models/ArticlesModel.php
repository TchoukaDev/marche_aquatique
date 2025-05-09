<?php

class ArticlesModel extends PdoModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = $this->setDb();
    }
    public function addArticleDb($title, $content, $image)
    {

        $req = $this->pdo->prepare('INSERT INTO articles (title, content, image) VALUES (?, ?, ?)');
        $result = $req->execute([$title, $content, $image]);
        return $result;
    }
    public function updateArticleDb($title, $content, $image, $id)
    {
        $req = $this->pdo->prepare('UPDATE articles SET title = ?, content = ?, image = ? WHERE id= ?');
        $result = $req->execute([$title, $content, $image, $id]);
        return $result;
    }

    public function deleteArticleDb($id)
    {
        $req = $this->pdo->prepare('DELETE FROM articles WHERE id = ?');
        $result = $req->execute([$id]);
        return $result;
    }

    public function getAllArticles()
    {
        $req = $this->pdo->prepare('SELECT * FROM articles ORDER BY creation_date DESC');
        $req->execute();

        $articles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $articles;
    }
}
