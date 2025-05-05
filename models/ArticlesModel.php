<?php

class ArticlesModel extends PdoModel
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = $this->setDb();
    }
    public function addArticleDb($title, $content)
    {

        $req = $this->pdo->prepare('INSERT INTO articles (title, content) VALUES (?, ?)');
        $result = $req->execute([$title, $content]);
        return $result;
    }
    public function updateArticleDb($title, $content, $id)
    {
        $req = $this->pdo->prepare('UPDATE articles SET title = ?, content = ? WHERE id= ?');
        $result = $req->execute([$title, $content, $id]);
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
