<?php


class UsersModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("users");
    }

    public function countEmail($email)

    {
        $db = $this->setDb();
        $stmt = $db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn();
    }

    public function selectUserbyEmail($email)
    {
        $db = $this->setDb();
        $stmt = $db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectUserbyCookie($cookie)
    {
        $db = $this->setDb();
        $req = $db->prepare('SELECT COUNT(*) as cookieNumber FROM users WHERE cookie = ?');
        $req->execute([$cookie]);

        $numberCookie = $req->fetchColumn();

        if ($numberCookie == 1) {

            $user = $db->prepare('SELECT* FROM users WHERE cookie = ?');
            $user->execute([$cookie]);
            $result = $user->fetch(PDO::FETCH_ASSOC);
            $user->closeCursor();
            return $result;
        }
    }
}
