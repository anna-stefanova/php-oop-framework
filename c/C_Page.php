<?php

class C_Page extends C_Base
{


	public function action_index(){

        unset($this->menu['Главная']);

        if ($_SESSION) {
            $this->menu += ['Личный кабинет' => 'index.php?c=user&act=account'];
            $this->menu += [ "Выход" => 'index.php?c=user&act=exit' ];
        } else {
            $this->menu += ['Авторизация' => 'index.php?c=user&act=auth', 'Регистрация' => 'index.php?c=user&act=reg'];
        }

        $this->view = 'main';
        $this->title .= '::Главная';
        $this->content = [
            'menu' => $this->menu,
            'text' => 'Это главная страница',
            'cart' => 'index.php?c=cart&act=cart'
        ];
    }
}
