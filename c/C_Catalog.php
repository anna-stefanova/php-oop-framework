<?php

class C_Catalog extends C_Base
{
    public function action_catalog() {

        $this->view = 'catalog';
        $this->title .= '::Каталог товаров';
        $model = new M_Catalog();

        $categories = $model->getCategories();

        if ($_SESSION) {
            $this->menu += ['Личный кабинет' => 'index.php?c=user&act=account'];
            $this->menu += [ "Выход" => 'index.php?c=user&act=exit' ];
        } else {
            $this->menu += ['Авторизация' => 'index.php?c=user&act=auth', 'Регистрация' => 'index.php?c=user&act=reg'];
        }

        if (isset($_GET['category'])) {
            // вывод товаров определенной категории
            $goods = $model->getCategoryGood($_GET['category']);
        } else {
            // вывод всех товаров
            $goods = $model->getAll();
        }

        

        if ($goods) {
            $this->content = [
                'goods' => $goods,
                'menu' => $this->menu,
                'categories' => $categories
            ];
            //header("Location: index.php?c=good&act=catalog");
        }
    }

    public function action_single() {
        $this->view = 'single';
        $good = [];
        if ($_GET['id']) {
            $id_good =  htmlspecialchars(trim(strip_tags($_GET['id'])));
            $model = new M_Catalog();
            $good = $model->getSingleGood($id_good);
            $this->title .= '::' . $good[0]['title'];
        }
        $this->content = [
            'menu' => $this->menu,
            'product' => $good,
        ];
    }
}