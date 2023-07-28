<?php
/**
 * Контроллер страниц пользователя
 */

class C_User extends C_Base
{
    public function action_auth(){

        if ($this->IsPost()) {
            if ($_POST && ($_POST['password'] && $_POST['login'])) {
                $login = htmlspecialchars(trim(strip_tags($_POST['login'])));
                $pass = htmlspecialchars(trim(strip_tags($_POST['password'])));
                $model = new M_User();
                if ($model->auth($login, $pass)) {
                    $id_user = $model->checkExistLogin($login)[0]['id_user']; // получаем id пользователя
                    if ($model->getUserRole($id_user)) {
                        $id_role = $model->getUserRole($id_user)[0]['id_role'];
                        if ($id_role == 1) {
                            header("Location: index.php?c=admin&act=account");
                        } else {
                            header("Location: index.php?c=user&act=account");
                        }
                    }

                } else {
                    $message = "Неправильно введены логин или пароль.";
                }
            }
        }
        $this->menu += ['Регистрация' => 'index.php?c=user&act=reg'];

        $this->view = 'auth';
        $this->title .= '::Авторизация';


        $this->content = [
            'menu' => $this->menu,
            'message' => $message ?? '',
            'login' => (!empty($_SESSION['login'])) ? $_SESSION['login'] : '',
            'password' => (!empty($_SESSION['password'])) ? $_SESSION['password'] : ''
        ];
    }

    public function action_reg()
    {
        if ($this->IsPost()){
            if ($_POST && ($_POST['name'] && $_POST['surname'] && $_POST['password'] && $_POST['login'])) {
                $name = htmlspecialchars(trim(strip_tags($_POST['name'])));
                $surname = htmlspecialchars(trim(strip_tags($_POST['surname'])));
                $login = htmlspecialchars(trim(strip_tags($_POST['login'])));
                $pass = htmlspecialchars(trim(strip_tags($_POST['password'])));
                $model = new M_User();

                if ($model->checkLogin($login)) {
                    if (!$model->checkExistLogin($login)) {
                        if ($model->reg($name, $surname, $login, $pass)) {
                            $id_user = $model->checkExistLogin($login)[0]['id_user']; // получаем id нового клиента
                            $model->addUserRole($id_user); // добавляем роль новому пользователю
                            $message = "Регистрация прошла успешно!";
                        }
                    } else {
                        $message = "Такой логин уже используется!";
                    }
                } else {
                    $message = "Неверно введен Email";
                }

            }
        }
        $this->menu += ['Авторизация' => 'index.php?c=user&act=auth'];

        $this->view = 'reg';
        $this->title .= '::Регистрация';

        $this->content = [
            'menu' => $this->menu,
            'message' => $message ?? '',
        ];

    }

    public function action_account () {
        $this->view = 'account';
        $this->title .= '::Личный кабинет';
        $this->menu += ['Мои заказы' => 'index.php?c=order&act=orders', "Выход" => 'index.php?c=user&act=exit'];

        $model = new M_User();

        if (!empty($_SESSION)) {
            $id_user = $_SESSION['id_user'];
            $user_name = $model->getUserData($id_user)[0]['name'];
        }
        $this->content = [
            'menu' => $this->menu,
            'name' => $user_name ?? ''
        ];

    }

    public function action_exit () {
        session_destroy();
        header("Location: index.php");
    }

}