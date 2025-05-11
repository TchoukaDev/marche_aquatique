<?php
class GalleryModel extends PdoModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->setDb();
    }

    public function addImageDb($file)
    {
        $req = $this->pdo->prepare('INSERT INTO gallery (image) VALUE (?)');
        $result = $req->execute([$file]);
        return $result;
    }

    public function deleteImageDb($image)
    {
        $req = $this->pdo->prepare("DELETE FROM gallery WHERE image= ?");
        $result = $req->execute([$image]);
        return $result;
    }

    public function getAllImages()
    {
        $req = $this->pdo->prepare('SELECT * FROM gallery ORDER BY creation_date DESC');
        $req->execute();
        $images = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $images;
    }
}
