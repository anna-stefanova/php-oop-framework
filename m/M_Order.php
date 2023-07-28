<?php

class M_Order
{
    public function getOrderDetails($id_order): array
    {
        $sql = "SELECT id_order, title, od.price, count FROM orders_details od JOIN goods g ON od.id_good=g.id_good WHERE id_order=?";
        return DB::Select($sql, [$id_order]);
    }

    public function getUserOrders($id_user): array
    {
        $sql = "SELECT id_order, id_user, order_date, order_status_name AS order_status, amount FROM orders JOIN order_status ON orders.id_order_status=order_status.id_order_status WHERE orders.id_user=?";
        return DB::Select($sql, [$id_user]);
    }
}