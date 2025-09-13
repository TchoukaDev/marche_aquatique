<?php
require_once 'PdoModel.php';

class UsersModel extends PdoModel
{

    public function createUser($name, $firstname, $email, $telephone, $password, $cookie)
    {
        $db = $this->setDb();
        $req = $db->prepare('INSERT INTO users(name, firstname, email, telephone, password, cookie) VALUES(?,?,?,?,?,?)');
        $result = $req->execute([$name, $firstname, $email, $telephone, $password, $cookie]);
        return $result;
    }

    public function countEmail($email)
    {
        $db = $this->setDb();
        $req = $db->prepare('SELECT COUNT(*) as user FROM users WHERE email = ? ');
        $req->execute([$email]);
        $result = $req->fetchColumn();
        $req->closeCursor();
        return $result;
    }
    public function selectUserbyEmail($email)
    {
        $db = $this->setDb();
        $req = $db->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute([$email]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result;
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
