<?php

class C_Admin extends C_Base
{


    protected function before()
    {
        parent::before();
        $this->menu = [
            'Главная' => 'index.php?c=admin&act=account',
            'Заказы' => 'index.php?c=admin&act=orders',
            'Товары' => 'index.php?c=admin&act=products',
            'Добавить товары' => 'index.php?c=admin&act=addProduct',
            'Выход' => 'index.php?c=user&act=exit'
        ];
    }

    public function action_account()
    {
        $this->view = 'admin';
        $this->title .= '::Консоль';


        $user = new M_User();

        if (!empty($_SESSION)) {
            $id_user = $_SESSION['id_user'];
            $user_name = $user->getUserData($id_user)[0]['name'];
        }
        $this->content = [
            'menu' => $this->menu,
            'name' => $user_name ?? ''
        ];

    }

    public function action_products()
    {
        $this->view = 'products';
        $this->title .= '::Консоль. Товары.';

        $catalog = new M_Catalog();
        $goods = $catalog->getAll();

        $this->content = [
            'menu' => $this->menu,
            'goods' => $goods
        ];
    }

    public function action_addProduct()
    {
        $this->view = 'add_product';
        $this->title .= '::Консоль. Добавить товар.';

        $catalog = new M_Catalog();
        $categories = $catalog->getCategories();


        if ($this->IsPost()) {
            if ($_POST && ($_POST['title'] && $_POST['description'] && $_POST['id_category'] && $_POST['price'])) {
                $title = htmlspecialchars(trim(strip_tags($_POST['title'])));
                $desc = htmlspecialchars(trim(strip_tags($_POST['description'])));
                $price = htmlspecialchars(trim(strip_tags($_POST['price'])));
                $id_category = htmlspecialchars(trim(strip_tags($_POST['id_category'])));
                $admin = new M_Admin();

                if (!$admin->checkTitle($title)) {
                    if ($admin->addProduct($title, $desc, $price, $id_category)) {
                        $message = "Товар успешно добавлен";
                    }
                } else {
                    $message = "Товар с таким наименованием уже существует";
                }

            } else {
                $message = "Заполните все поля";
            }
        }

        $this->content = [
            'menu' => $this->menu,
            'message' => $message ?? '',
            'categories' => $categories ?? []
        ];

    }

    public function action_single()
    {
        $this->view = 'edit_product';
        $this->title .= '::Консоль. Редактировать товар.';

        $catalog = new M_Catalog();
        $categories = $catalog->getCategories();

        if ($_GET['id']) {
            $id_good = htmlspecialchars(trim(strip_tags($_GET['id'])));
            $good = $catalog->getSingleGood($id_good);
        }

        $this->content = [
            'menu' => $this->menu,
            'message' => $message ?? '',
            'categories' => $categories ?? [],
            'good' => $good ?? []
        ];

    }

    public function action_order_details() {
        $this->title .= '::Консоль. Детали заказа';
        $this->view = 'admin_order_details';

        if ($_GET['id']) {
            $id_order = $_GET['id'];
            $order = new M_Order();
            $data = $order->getOrderDetails($id_order);

        }
        $this->content = [
            'menu' => $this->menu,
            'goods' => $data ?? [],
            'id_order' => $id_order ?? ''
        ];
    }

    public function action_edit()
    {
        $this->view = 'edit_product';
        $this->title .= '::Консоль. Редактировать товар.';

        if ($this->IsPost()) {
            if ($_POST && ($_POST['title'] && $_POST['description'] && $_POST['id_category'] && $_POST['price'])) {
                $id_good = htmlspecialchars(trim(strip_tags($_POST['id_good'])));
                $title = htmlspecialchars(trim(strip_tags($_POST['title'])));
                $desc = htmlspecialchars(trim(strip_tags($_POST['description'])));
                $price = htmlspecialchars(trim(strip_tags($_POST['price'])));
                $id_category = htmlspecialchars(trim(strip_tags($_POST['id_category'])));

                $admin = new M_Admin();

                if ($admin->editProduct($title, $desc, $price, $id_category, $id_good)) {
                    $message = "Изменения приняты";
                }
            } else {
                $message = "Заполните все поля";
            }
        }
        $this->content = [
            'menu' => $this->menu,
            'message' => $message ?? ''
        ];
    }

    public function action_orders()
    {
        $this->view = 'orders';
        $this->title .= '::Консоль. Заказы.';

        $admin = new M_Admin();
        $orders = $admin->getAllOrders();

        $this->content = [
            'menu' => $this->menu,
            'orders' => $orders ?? []
        ];
    }

    public function action_exit()
    {
        session_destroy();
        header("Location: index.php");
    }
}