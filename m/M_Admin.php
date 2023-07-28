<?php

class M_Admin
{
    public function checkTitle($title): array
    {
        $sql = "SELECT * FROM goods WHERE title LIKE ?";
        return DB::Select($sql, [$title]);
    }

    public function addProduct($title, $desc, $price, $id_category): bool
    {
        $sql = "INSERT INTO goods(title, description, price, id_category) VALUES (?, ?, ?, ?)";
        return DB::Insert($sql, [$title, $desc, $price, $id_category]);
    }

    public function editProduct($title, $desc, $price, $id_category, $id_good): bool
    {
        $sql = "UPDATE goods SET title=?, description=?, price=?, id_category=? WHERE id_good=?";
        return DB::Update($sql, [$title, $desc, $price, $id_category, $id_good]);
    }

    public function checkData($data): string
    {
        return htmlspecialchars(trim(strip_tags($data)));
    }

    public function getAllOrders(): array
    {
        $sql = "SELECT id_order, orders.id_user, login AS user, order_date, order_status_name AS order_status, amount FROM orders JOIN order_status ON orders.id_order_status=order_status.id_order_status JOIN users ON orders.id_user=users.id_user";
        return DB::Select($sql);
    }

}