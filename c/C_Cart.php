<?php

class C_Cart extends C_Base
{
    public function action_cart() {
        $this->view = 'cart';
        $this->title .= '::Корзина';
        $message = '';

        $cart = new M_Cart();

        if ($_SESSION && $_SESSION['id_user']) {
            $id_user = $_SESSION['id_user'];
            if (isset($_POST['id_good'])) {

                $id_good = htmlspecialchars(trim(strip_tags($_POST['id_good'])));
                if (isset($_POST['value'])) {
                    $value = htmlspecialchars(trim(strip_tags($_POST['value'])));

                    if ($value == 'plus') {
                        $cart->plusCount($id_user, $id_good);
                    }
                    if ($value == "minus") {
                        $cart->minusCount($id_user, $id_good);
                    }
                    if ($value == "delete") {
                        $cart->deleteGood($id_user, $id_good);
                    }
                } else {
                    // если товар не найден в корзине, то он добавляется в Корзину
                    if (!$cart->searchGood($id_good)) {
                        $cart->addProduct($id_user, $id_good);
                    }
                    $cart->plusCount($id_user, $id_good);
                }

            }
            // вывод товаров на страницу Корзина, если товары есть в корзине
            if ($cart->getAllGoods($id_user)) {
                $goods = $cart->getAllGoods($id_user);
                $amount = $cart->getAmount($id_user); // получение общей суммы заказа
                $amount = $amount[0]['amount'];

            } else {
                $message = "Корзина пуста";
            }
        } else {
            $message = "Чтобы сделать заказ нужно зарегистрироваться или войти в личный кабинет";
        }

        if ($_SESSION) {
            $this->menu += ['Личный кабинет' => 'index.php?c=user&act=account'];
            $this->menu += [ "Выход" => 'index.php?c=user&act=exit' ];
        } else {
            $this->menu += ['Авторизация' => 'index.php?c=user&act=auth', 'Регистрация' => 'index.php?c=user&act=reg'];
        }


        $this->content = [
            'menu' => $this->menu,
            'message' => $message,
            'goods' => $goods ?? '',
            'amount' => $amount ?? ''
        ];
    }

    public function action_checkout() {
        $this->view = 'checkout';
        $this->title .= '::Оформление заказа';
        $cart = new M_Cart();

        if ($_SESSION) {
            $id_user = $_SESSION['id_user'];
            $data = $cart->getAmount($id_user);
            $amount = $data[0]['amount'];
            if ($amount) {
                $message = 'Сумма вашего заказа ' . $amount . ' руб. Заказ подтвержден.';
                // перенос данных из корзины в таблицу Заказы
                $cart->addToOrder($id_user, $amount);
                // перенос данных из корзины в таблицу Детали Заказов
                $cart->addToOrdersDetails();
                // очистка корзины
                $cart->cleanCart($id_user);
            } else {
                $message = "Ваша корзина пуста. Перейти в магазин";
            }

        } else {
            $message = "Чтобы оформить заказ нужно зарегистрироваться или войти в личный кабинет";
        }

        if ($_SESSION) {
            $this->menu += ['Личный кабинет' => 'index.php?c=user&act=account', 'Мои заказы' => 'index.php?c=order&act=orders'];
            $this->menu += [ "Выход" => 'index.php?c=user&act=exit' ];
        } else {
            $this->menu += ['Авторизация' => 'index.php?c=user&act=auth', 'Регистрация' => 'index.php?c=user&act=reg'];
        }

        $this->content = [
            'menu' => $this->menu,
            'message' => $message ?? '',
        ];
    }

}