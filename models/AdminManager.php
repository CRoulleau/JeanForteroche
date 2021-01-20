<?php


class AdminManager extends Bdd
{

    public function login($email, $password)
    {
        $req = $this->getDb()->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($email));
        $userInfo = $req->fetch(PDO::FETCH_OBJ);
        if ($userInfo == null) {
            return false;
        } else {
            if ($userInfo->passW == $password) {
                $_SESSION['user'] = $userInfo->id;
                return $userInfo;
            } else {
                return false;
            }
        }
    }
}//fin class