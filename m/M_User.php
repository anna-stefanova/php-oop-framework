<?php

class M_User {
	public function auth($login,$pass): array
    {
        $sql = "SELECT * FROM users WHERE login LIKE ? AND password LIKE ?";
        $data = DB::Select($sql, [$login, $pass]);

        if ($data) {

            $_SESSION['login'] = $login;
            $_SESSION['password'] = $pass;
            $_SESSION['id_user'] = $data[0]['id_user'];
        }
        return $data;

    }

    public function reg($name, $surname, $login, $pass): bool
    {
        $sql = "INSERT INTO users(name, surname, login, password) VALUES (?, ?, ?, ?)";
        return DB::Insert($sql, [$name, $surname, $login, $pass]);
    }


    public function addUserRole($id_user, $id_role = 2): bool
    {
        $sql = "INSERT INTO user_role(id_user, id_role) VALUES (?, ?)";
        return DB::Insert($sql, [$id_user, $id_role]);
    }

    public function getUserRole($id_user): array
    {
        $sql = "SELECT * FROM user_role WHERE id_user LIKE ?";
        return DB::Select($sql, [$id_user]);
    }

    public function checkExistLogin($login): array
    {
        $sql = "SELECT * FROM users WHERE login LIKE ?";
        return DB::Select($sql, [$login]);
    }

    public function checkLogin($login): bool
    {
        $rule =  "/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9а-яА-Я]{2,5}/u";
        return (bool)preg_match($rule, $login);
    }

    public function getUserData($id_user): array
    {
        $sql = "SELECT * FROM users WHERE id_user LIKE ?";
        return DB::Select($sql, [$id_user]);
    }

}
