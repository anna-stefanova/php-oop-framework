<?php

class M_Cart
{
    public function getAllGoods($id_user): array
    {
        $sql = "SELECT goods.id_good, title, price, count, price*count AS common_price FROM goods JOIN cart ON goods.id_good=cart.id_good WHERE cart.id_user=? AND cart.count>0";
        return DB::Select($sql, [$id_user]);
    }

    public function addProduct($id_user, $id_good, $count = 0): bool
    {
        $sql = "INSERT INTO cart(id_user, id_good, count) VALUES(?, ?, ?)";
        return DB::Insert($sql, [$id_user, $id_good, $count]);

    }

    public function plusCount($id_user, $id_good): int
    {
        $sql = "UPDATE cart SET count=count+1 WHERE id_user=? AND id_good=?";
        return DB::Update($sql, [$id_user, $id_good]);
    }

    public function minusCount($id_user, $id_good): int
    {
        $sql = "UPDATE cart SET count=count-1 WHERE id_user=? AND id_good=? AND count>0";
        return DB::Update($sql, [$id_user, $id_good]);
    }

    public function getAmount($id_user): array
    {
        $sql = "SELECT SUM(price*count) AS amount FROM goods JOIN cart ON goods.id_good=cart.id_good WHERE cart.id_user=? AND cart.count>0";
        return DB::Select($sql, [$id_user]);
    }

    public function deleteGood($id_user, $id_good): int
    {
        $sql = "DELETE FROM cart WHERE id_user=? AND id_good=?";
        return DB::Delete($sql, [$id_user, $id_good]);
    }

    public function searchGood($id_good): array
    {
        $sql = "SELECT * FROM cart WHERE id_good=?";
        return DB::Select($sql, [$id_good]);

    }

    public function addToOrder($id_user, $amount, $id_order_status = 6): bool
    {
        $sql = "INSERT INTO orders(id_user, order_date, amount, id_order_status) VALUES (?, NOW(), ?, ?)";
        return DB::Insert($sql, [$id_user, $amount, $id_order_status]);
    }

    public function addToOrdersDetails(): bool
    {
        $sql = 'INSERT INTO orders_details (id_order, id_good, price, count) SELECT id_order, c.id_good, price, count FROM orders o JOIN cart c ON o.id_user=c.id_user JOIN goods g ON c.id_good=g.id_good WHERE c.count>0';
        return DB::Insert($sql);
    }



    public function cleanCart($id_user): int
    {
        $sql = "DELETE FROM cart WHERE id_user=?";
        return DB::Delete($sql, [$id_user]);
    }


}