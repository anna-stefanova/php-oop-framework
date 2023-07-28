<?php

class C_Order extends C_Base
{
    public function action_orders() {
        $this->view = 'user_orders';
        $this->title .= '::Мои заказы';
        $order = new M_Order();
        if ($_SESSION) {
            $this->menu += ['Личный кабинет' => 'index.php?c=user&act=account'];
            $this->menu += [ "Выход" => 'index.php?c=user&act=exit' ];

            $id_user = $_SESSION['id_user'];
            if ($order->getUserOrders($id_user)) {
                $orders = $order->getUserOrders($id_user); // все заказы одного клиента
            } else {
                $message = 'У вас пока нет заказов. Вернитесь в каталог';
            }

        } else {
            $message = "Чтобы увидеть свои заказы ввойдите в личный кабинет или пройдите регистрацию";
        }

        $this->content = [
            'menu' => $this->menu,
            'message' => $message ?? '',
            'orders' => $orders ?? []

        ];

    }

    public function action_single() {
        $this->title .= '::Детали заказа';
        $this->view = 'order_details';
        $this->menu += ['Мои заказы' => 'index.php?c=order&act=orders', "Выход" => 'index.php?c=user&act=exit'];
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
}